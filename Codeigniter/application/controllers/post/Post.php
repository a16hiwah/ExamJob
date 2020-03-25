<?php
// Place at the top of index.php (first file to load)
$t_start = microtime(true);

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

	public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
         
        //load the Login Model
        $this->load->model('LoginModel', 'login');
        //load the User Model
        $this->load->model('user/UserModel', 'user');
        //load the Post Model
        $this->load->model('post/PostModel', 'post');
    }

    public function index($offset = 0) {
        
        // load pagination library
        $this->load->library('pagination');

        $limit = 5; //limit per page view
		
        $result = $this->post->get_posts($limit, $offset); //get data from database

		//pagination configuaration
        $data['posts'] = $result['rows'];
        $data['num_results'] = $result['num_rows'];        
		
        $config = array();
		
        $config['base_url'] = site_url("post/post/index");
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
        $this->load->view('posts/header');
        $this->load->view('posts/post', $data);
        $this->load->view('posts/footer');
        
    }

    public function addPost() {
    	//get all user data from user model
    	$get_all_user['users'] = $this->user->get_all_user();

        //load addpost page with all user-id and user-name data passing variable $get_all_user
        $this->load->view('posts/header');
        $this->load->view('posts/addpost', $get_all_user);
        $this->load->view('posts/footer');
    }

    //Create new post. data collect from view(addpost.php) and send to database through Model
    public function createPost() {
        //set the form validation here
        $this->form_validation->set_rules('title', 'title', 'required|min_length[3]');
        $this->form_validation->set_rules('body', 'body', 'required|min_length[5]');

        //if the above validation fails, redirect to register page
        //with vaildation_errors();
        if ($this->form_validation->run() == FALSE) {
            //set the validation errors in flashdata (one time session)
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'post/post/addpost');
        } else {
            //if not get the input values
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $uid = $this->input->post('user_id');
            
            $data = [
                'title' => $title, 'body' => $body, 'user_id' => $uid, 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s') 
            ]; // we create two date type variable here for two field of table

            //pass the input values to the post model
            $insert_data = $this->post->add_new_post($data);

            //if data inserted then set the success message and redirect to post page
            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully created Post!');
                redirect(base_url() . 'post/post');
            }
        }
    }
    public function edit($id){
        
        //get all user data from user model
        $data['users'] = $this->user->get_all_user();
        //get single post data from post model through $id
		$data['edit'] = $this->post->get_single_post($id);
		//load editpost page passing the $data variable, where collect from models
		$this->load->view('posts/header');
		$this->load->view('posts/editpost', $data);
		$this->load->view('posts/footer');
	}

	public function update($id){
		//get the input values
		$post['title'] = $this->input->post('title');
		$post['body'] = $this->input->post('body');
		$post['user_id'] = $this->input->post('user_id');
		$post['modified'] = date('Y-m-d H:i:s'); // create new date type

		//pass the input values to the post model to update current id data
		$query = $this->post->updatepost($post, $id);
 
		//if data updated then set the success message and redirect to post page
		if($query){
			$this->session->set_flashdata('msg', 'Successfully Edited Post!');
            redirect(base_url() . 'post/post');
		}
	}

	public function view($id){
        
        //get single post data from post model through $id
		$data['view'] = $this->post->get_single_post($id);
		//load view page passing $data
		$this->load->view('posts/header');
		$this->load->view('posts/viewpost', $data);
		$this->load->view('posts/footer');
	}

	public function delete($id){
		//pass the $id to the post model to delete entire row
		$query = $this->post->deletepost($id);
 
		//if data deleted then set the success message and redirect to post page
		if($query){
			$this->session->set_flashdata('msg', 'Successfully Deleted Post!');
            redirect(base_url() . 'post/post');
		}
	}


}
// Place all the code below at the bottom of index.php (first file to load)
// except the PHP closing tag
$t_stop = microtime(true);

// Calculate execution time in milliseconds (round to 3 decimals)
$exec_time = round((($t_stop - $t_start) * 1000), 3);

// Path to csv file where the result should be saved (choose one)
$fileLocation = getenv('DOCUMENT_ROOT') . '/logs/codeigniter_measurements.csv';
// $fileLocation = getenv('DOCUMENT_ROOT') . '/logs/cakephp_measurements.csv';

// Save the result
$handle = fopen($fileLocation, 'a');
fputcsv($handle, [$exec_time]);
fclose($handle);