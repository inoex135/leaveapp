<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Logout extends Controller{
    function index(){
        $this->session->sess_destroy();
        redirect('/login');
    }
}
?>
