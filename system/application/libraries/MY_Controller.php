<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MY_Controller extends Controller{
    function  MY_Controller() {
        parent::Controller();
        $uri = $this->uri->uri_string();        
        echo strpos($uri, 'login');
        $username = $this->session->userdata('username');
        if(empty($username)&&!strpos($uri, 'login')){
            redirect('/login');
        }        
        $var = array('username'=>$username,'role'=>$this->session->userdata('role'));
        $this->load->vars($var);
    }
}
?>
