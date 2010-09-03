<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/


class Leave extends MY_Controller {
    function view($id) {
        $this->load->model('front/Leave_model');
        $this->load->library('table');

        $leave = $this->Leave_model->get($id);
        if(count($leave)==0) {
            redirect("front/leave/index");
        }
        $leave[0]['status_label'] = $this->Leave_model->getStatusString($leave[0]['status']);
        $data['leave'] = $leave[0];
        $data['id'] = $id;
        $data['recommendation'] = $leave[0]['recommendation'];
        $data['manager_note'] = $leave[0]['manager_note'];
        if($this->session->userdata('role') == SUPERVISOR) {
            $this->layout->view('front/leave/view_supervisor',$data);
        } else if ($this->session->userdata('role') == MANAGER) {
            $this->layout->view('front/leave/view_manager',$data);
        } else if($this->session->userdata('role') == HR) {
            $this->layout->view('front/leave/view_hr',$data);
        } else if ($this->session->userdata('role') == STAFF) {
            $this->layout->view('front/leave/view_staff',$data);
        }
    }

    function index($keyword_username=null,$ajax=0) {
        if($keyword_username=='1'){
            $ajax = 1;
            $keyword_username = null;
        }
        $role = $this->session->userdata('role');
        $userid = $this->session->userdata('id');
        $username = $this->session->userdata('username');

        $this->load->model('front/Leave_model');
        $this->load->library('table');
        $tmpl = array ( 'table_open'  => '<table cellpadding="0" cellspacing="0" class="list">' );
        $this->table->set_template($tmpl);

        if($role == STAFF) {
            $data['isStaff'] = TRUE;
            $leaves = $this->Leave_model->listStaff($userid,$username,null,null);
        } else if($role == SUPERVISOR) {
            $where = "where parent_id=$userid";
            if(strlen($keyword_username)>0) {
                $where .= " and username = '$keyword_username'";
            }
            $leaves = $this->Leave_model->listAll(null,null, $where);
        } else if($role == MANAGER) {
            $leaves = $this->Leave_model->listManager($userid,null,null);
        } else if($role == HR || $role == ADMIN) {
            $leaves = $this->Leave_model->listAll(null,null,strlen($keyword_username)>0?"WHERE 1 and username = '$keyword_username'":'');
        }
        $this->table->set_heading('Staff', 'Type', 'Duration', 'Purpose', 'Status',
                'Submit Time', 'Recommendation Time', 'Approve Time', 'Keep Time','Action');
        foreach($leaves as $leave) {
            $this->table->add_row($leave['username'],$leave['name'],$leave['start_date']." until ".$leave['end_date'],$leave['purpose'],
                    $this->Leave_model->getStatusString($leave['status']),$leave['submit_time'],$leave['recommend_time'],$leave['approve_time'],
                    $leave['keep_time'], ($role==HR)?anchor('front/leave/view/'.$leave['id'],"View").' '.anchor('front/leave/hredit/'.$leave['id'],"Update"):anchor('front/leave/view/'.$leave['id'],"View"));
        }
        $data['table'] =  $this->table->generate();

        if($ajax)
            echo $data['table'];
        else
            $this->layout->view('front/leave/index',$data);
    }

    function add() {
        $this->load->model('front/Leave_model');
        if($this->input->post('confirmAdd')) {
            $data['user_id'] = $this->input->post('user_id');
            $data['type_of_leave_id'] = $this->input->post('type_of_leave_id');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['purpose'] = $this->input->post('purpose');
            $data['status'] = SUBMITTED;
            $this->Leave_model->add($data);
            redirect("front/leave/index");
        }

        $this->load->model('Typeofleave');
        $this->load->helper('form');
        $this->load->library('table');

        $data['userid'] = $this->session->userdata('id');
        $options = $this->Typeofleave->get_all('array');
        foreach($options as $option) {
            $array[$option['id']] = $option['name'];
        }
        $data['array'] = $array;
        $this->layout->view('front/leave/edit',$data);
    }

    function recommend() {
        $this->load->model('front/Leave_model');

        if($this->input->post('confirmRecommendation') && $this->session->userdata('role') == SUPERVISOR) {
            $id = $this->input->post('id');
            $leave = $this->Leave_model->getObject($id);
            if($leave===FALSE) {
                redirect("front/leave/index");
            }
            $status = $leave->status;
            if($status == SUBMITTED) {
                $leave->recommendation = $this->input->post('recommendation');
                $this->Leave_model->recommend($leave);
            }
        }
        redirect("front/leave/view/$id");
    }

    function approve() {
        $this->load->model('front/Leave_model');

        if($this->input->post('confirmApprove') && $this->session->userdata('role') == MANAGER) {
            $id = $this->input->post('id');
            $leave = $this->Leave_model->getObject($id);
            if($leave===FALSE) {
                redirect("front/leave/index");
            }
            $status = $leave->status;
            if($status == SUBMITTED) {
                $leave->manager_note = $this->input->post('manager_note');
                $leave->status = $this->input->post('action');

                $this->load->model('User');
                $user = $this->User->get($leave->user_id);

                $this->load->library('email');
                $this->email->from(EMAIL_FROM, EMAIL_FROM_NAME);
                $this->email->to($user->email);
                $this->email->subject('Leave Request ('.$leave->submit_time.') notification');

                if($leave->status == APPROVED) {
                    $this->Leave_model->approve($leave);
                    $this->email->message('Your Leave Request has been approved.');
                } else if($leave->status == REJECTED) {
                    $this->Leave_model->reject($leave);
                    $this->email->message('Your Leave Request has been rejected.');
                }
                $this->email->send();
            }
        }
        redirect("front/leave/view/$id");
    }

    function keep($id = null) {
        $this->load->model('front/Leave_model');

        $leave = $this->Leave_model->getObject($id);
        if($leave===FALSE) {
            redirect("front/leave/index");
        }
        $status = $leave->status;
        if($status == APPROVED) {
            $this->Leave_model->keep($leave);
        }
        redirect("front/leave/view/$id");
    }

    function hredit($id=null) {
        $this->load->model('front/Leave_model');
        $this->load->model('Typeofleave');
        if(!empty($_POST)) {
            $this->Leave_model->update($_POST);
            //redirect('front/leave/view/'.$this->input->post('id'));
            redirect('front/leave/index/');
        }
        $options = $this->Typeofleave->get_all('array');
        foreach($options as $option) {
            $typeofleaves[$option['id']] = $option['name'];
        }

        $leave = $this->Leave_model->getObject($id);
        $data = array('leave'=>$leave,'typeofleaves'=>$typeofleaves,'statuses'=>$this->Typeofleave->listofstatus());

        $this->layout->view('front/leave/hredit',$data);
    }

    function ajax_listuser() {
        $this->load->model('User');
        $users = $this->User->get_all();
        if(!empty($users)) {
            foreach($users as $user) {
                echo $user->username." ";
            }
        }
    }
}
?>