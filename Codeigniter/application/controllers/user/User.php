<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    public function index($offset = 0) {
        
        
        //load view page passing the data
        $this->load->view('user/header');
        $this->load->view('user/user', $data);
        $this->load->view('user/footer');
        
    }
    

}



