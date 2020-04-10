<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        
        //load the Login Model
        $this->load->model('LoginModel', 'login');
        //load the Register Model
        $this->load->model('RegisterModel', 'register');
        //load the User Model
        $this->load->model('user/UserModel', 'user');
        //load the Post Model
        $this->load->model('post/PostModel', 'post');
    }

    public function index($offset = 0) {
        
        // load pagination library
        $this->load->library('pagination');

        $limit = 5; //limit per page view
        
        $result = $this->user->get_users($limit, $offset); //get data from database

        //pagination configuaration
        $data['users'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];        
        
        $config = array();
        
        $config['base_url'] = site_url("user/user/index");
        $config['total_rows'] = $data['num_results'];
        $config['per_page'] = $limit;
        
        //which uri segment indicates pagination number
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;
        
        //max links on a page will be shown
        $config['num_links'] = 5;
        
        //various pagination configuration
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'follow_link';
        
        $this->pagination->initialize($config); //pagination initialization
        $data['pagination'] = $this->pagination->create_links(); //pagination links creates
        
        //customize pagination view structure on bottom
        if($config["total_rows"]>5){
            if($this->pagination->cur_page==1)
                $start = $this->pagination->cur_page;
            else
                $start = (($this->pagination->cur_page-1) * $this->pagination->per_page)+1;
            if($this->pagination->cur_page * $this->pagination->per_page > $config["total_rows"])
                $end = $config["total_rows"];
            else
                $end = $this->pagination->cur_page * $this->pagination->per_page;
                $data['pagination_des'] = "Showing ".($start)." to ".($end)." from ". $config["total_rows"]." results";
        }
        else{
            $data['pagination_des'] = "Showing ".($this->pagination->cur_page+1)." to ".($config["total_rows"])." from ". $config["total_rows"]." results";
        }
        //load view page passing the data
        $this->load->view('user/header');
        $this->load->view('user/user', $data);
        $this->load->view('user/footer');
        
    }

    public function newUser() {
    	
        //load newuser page
        $this->load->view('user/header');
        $this->load->view('user/adduser');
        $this->load->view('user/footer');
    }

    //Create new user. data collect from view(adduser.php) and send to database through Model
    public function createUser() {
        //set the form validation here
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_message('is_unique', 'Email already exists.');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        //if the above validation fails, redirect to register page
        //with vaildation_errors();
        if ($this->form_validation->run() == FALSE) {
            //set the validation errors in flashdata (one time session)
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'user/user/newuser');
        } else {
            //if not get the input values
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $data = [
                'name' => $name, 'email' => $email, 'password' => $password, 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s') 
            ]; // we create two date type variable here for two field of table

            //pass the input values to the register model
            $insert_data = $this->register->add_user($data);

            //if data inserted then set the success message and redirect to user page
            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Insert User!');
                redirect(base_url() . 'user/user');
            }
        }
    }
    public function edit($id){
        
        //get user data of existing id from user model
        $data['edit'] = $this->user->get_single_user($id);
        //load edituser page passing the $data variable, where data collect from models
		$this->load->view('user/header');
		$this->load->view('user/edituser', $data);
		$this->load->view('user/footer');
	}

	public function update($id){

        //get input values
		$user['name'] = $this->input->post('name');
		$user['email'] = $this->input->post('email');
		// $user['password'] = sha1($this->input->post('password'));
		$user['modified'] = date('Y-m-d H:i:s');// create new date type

		//pass the input values to the user model to update current id data
		$query = $this->user->updateuser($user, $id);
 
		//if data updated then set the success message and redirect to user page
        if($query){
			$this->session->set_flashdata('msg', 'Successfully Edited User!');
            redirect(base_url() . 'user/user');
		}
	}

	public function view($id){
        
        //get single user data from user model through $id
		$data['view'] = $this->user->get_single_user($id);
        //load view page passing $data
		$this->load->view('user/header');
		$this->load->view('user/viewuser', $data);
		$this->load->view('user/footer');
	}

	public function delete($id){
        //pass the $id to the user model to delete entire row
		$query = $this->user->deleteuser($id);
 
		//if data deleted then set the success message and redirect to user page
        if($query){
			$this->session->set_flashdata('msg', 'Successfully Deleted User!');
            redirect(base_url() . 'user/user');
		}
	}


}
