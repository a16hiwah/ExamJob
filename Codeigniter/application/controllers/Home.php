<?php 
class Home extends CI_Controller {

public function index ()
	{
        $this->load->view('login');
        
    }
    public function posts ()
	{
        $this->load->view('posts');
       
    }
    public function postadd ()
	{
        $this->load->view('postadd');
       
    }
}  
?>