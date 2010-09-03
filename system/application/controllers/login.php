<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends MY_Controller {

	function Login()
	{
		parent::Controller();
	}

	function index()
	{
            if(!empty($_POST)){
                $this->load->model('User');
                $user = $this->User->validate($_POST['username'],$_POST['password']);
                if($user){
                    $this->session->set_userdata($user);
                    redirect('/home');
                }
            }
            $this->load->view('login');
	}
}
?>
