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
    public function register ()
	{
        $this->load->view('register');
       
    }
    public function users ()
	{
        $this->load->view('users');
       
    }
    public function usersadd ()
	{
        $this->load->view('usersadd');
       
    }
}  
?>