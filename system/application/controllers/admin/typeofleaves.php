<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/


class Typeofleaves extends MY_Controller {

    function index() {
        $this->load->model('Typeofleave');
        $data['query'] = $this->Typeofleave->get_all();

        $this->layout->view('admin/typeofleaves/index',$data);
    }
    function add() {
        $this->load->model('Typeofleave');
        $this->layout->view('admin/typeofleaves/add');

        if ($this->input->post('name')) {

            $type[]= $this->input->post('name');

            if($this->Typeofleave->simpanType($type)){
                redirect('admin/typeofleaves/index');
            }
            redirect('admin/typeofleaves/index');
        }
    }

        function edit($id = null) {
            $this->load->model('Typeofleave');
            $data['name'] = $this->Typeofleave->editType($id);
            //var_dump($data['name']->name);
            $this->layout->view('admin/typeofleaves/edit', $data);
            
            if($this->input->post('id')){
                $type[]= $this->input->post('name');
               // var_dump($type);exit;
            if($this->Typeofleave->updateType($this->input->post('id'), $type)){
                redirect('admin/typeofleaves/index');
            }
            redirect('admin/typeofleaves/index');
            }
        }
        
        function delete($id) {
            $this->db->delete('type_of_leave', array('id' => $id));
            redirect('admin/typeofleaves/index');

        }
    }


?>
