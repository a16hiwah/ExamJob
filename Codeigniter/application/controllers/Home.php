<?php 
class Home extends CI_Controller {

public function index ()
	{
        $this->load->view('login');
        
    }
    public function hiwa ()
	{
        //$this->load->view('welcome_message');
        echo "this is my Home hiwa";
    }
}  
?>