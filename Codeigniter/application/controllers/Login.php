<?php
// Place at the top of index.php (first file to load)
$t_start = microtime(true);

defined('BASEPATH') OR exit('No direct script access allowed');
// Place at the top of index.php (first file to load)
$t_start = microtime(true);

class Login extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        
        //load the Login Model
        $this->load->model('LoginModel', 'login');
    }

    public function index() {
        //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page
            redirect(base_url().'post/post');
        }
        //if not load the login page
        $this->load->view('header');
        $this->load->view('login_page');
        $this->load->view('footer');
    }

    public function doLogin() {
        //get the input fields from login form
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        
        //send the email pass to query if the user is present or not
        $check_login = $this->login->checkLogin($email, $password);

        //if the result is query result is 1 then valid user
        if ($check_login) {
            //if yes then set the session 'loggin_in' as true
            $this->session->set_userdata('logged_in', true);
            redirect(base_url().'post/post');
        } else {
            //if no then set the session 'logged_in' as false
            $this->session->set_userdata('logged_in', false);
            
            //and redirect to login page with flashdata invalid msg
            $this->session->set_flashdata('msg', 'Username / Password Invalid');
            redirect(base_url().'login');            
        }
    }

    public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
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
