<?php
class Users extends MY_Controller {

    function index() {
        $this->load->model('User');
        $data['query'] = $this->User->get_all();

        $this->layout->view('admin/users/index',$data);
    }

    function add() {
        $this->load->model('User');
        $this->layout->view('admin/users/add');

        if ($this->input->post('username')) {            

            if($this->User->simpanUser($_POST)) {
                redirect('admin/users/index');
            }
            redirect('admin/users/index');
        }
    }

    function edit($id = null) {
        $this->load->model('User');

        if($this->input->post('id')) {
//            $user[]= $this->input->post('username');
//            $user[]= $this->input->post('password');
//            $user[]= $this->input->post('email');
//            $user[]= $this->input->post('role');
//            $user[]= $this->input->post('parent_id');
            // var_dump($type);exit;
            if($this->User->updateUser($this->input->post('id'), $_POST)) {
                redirect('admin/users/index');
            }
            redirect('admin/users/index');
        }
        $data['name'] = $this->User->get($id);
        switch($data['name']->role){
            case 'staff':
                $data['parent_label'] = 'Supervisor';
                break;
            case 'supervisor':
                $data['parent_label'] = 'Manager';
                break;
        }
        $data['parent_options'] = $this->getParentOptions($data['name']->role,$data['name']->parent_id,0);
        $this->layout->view('admin/users/edit', $data);
    }

    function delete($id) {
        $this->db->delete('users', array('id' => $id));
        redirect('admin/users/index');
    }

    function getParentOptions($role=null,$selected=0,$ajax=1) {
        $this->load->model('User');
        $options = '';
        if($role=='staff') {
            $options = form_dropdown('parent_id',$this->User->getParent('supervisor'),$selected);
        }
        elseif($role=='supervisor') {
            $options = form_dropdown('parent_id',$this->User->getParent('manager'),$selected);
        }

        if($ajax){
            echo $options;
        }
        else{
            return $options;
        }

    }
}
?>
