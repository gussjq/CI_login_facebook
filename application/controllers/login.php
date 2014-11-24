<?php

class login extends CI_Controller{
    
   public function __construct() {
       session_start();
       parent::__construct();
       
       $this->load->library('fb');
   }
   
   public function index(){
       $this->fb->initialize();
       $this->load->view('test/index_view');
   }
   
   public function cerrar_session() {
        unset($_SESSION['facebook']);
        redirect("login/index");
    }

}
