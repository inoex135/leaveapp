<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class Authcontroller extends Controller {
    function  __construct() {
        parent::Controller();
    }
    function login($username, $password) {
        $this->load->model('User');

        $user = $this->User->validate($username,$password);
        if($user) {
            $this->load->library('session');
            echo $this->Session;
            //$this->session->set_userdata('user',$user);
            //redirect('/home');
        }
    }

    function logout() {

    }

    function isLogin() {
        echo "<pre>";
        print_r($this->userdata('user'));
        echo "</pre>";
    }
}
?>
