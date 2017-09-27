<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class homeControl extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('form_validation','session');
		$this->load->helper('url','form','html');
	}

	public function index()
	{
		$this->load->view('front/header');
		$this->load->view('front/navbar');
		$this->load->view('front/homepage');
	}
	public function about(){
		$this->load->view('front/header');
		$this->load->view('front/navbar');
		$this->load->view('front/about');
	}
	public function services(){
		$this->load->view('front/header');
		$this->load->view('front/navbar');
		$this->load->view('front/services');
	}
	public function contact(){
		$this->load->view('front/header');
		$this->load->view('front/navbar');
		$this->load->view('front/contact');
	}
	public function login(){
		redirect('Login/index');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('homeControl/index','refresh');
	}
	// public function validateUser(){
	// 	// $this->form_validation->set_rules('usern', 'Username', 'trim|required');
	// 	// $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
	// 	// if($this->form_validation->run() === FALSE){
	// 	// 	echo "<script>alert('sukses!');</script>";
	// 	// }else{
	// 	// 	redirect('homepage/login');
	// 	// }
		

		

		

	// 	$this->form_validation->set_rules('userName', 'Username', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required|callback_hasmatch');
	// 	//
	// 	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	// 	$this->form_validation->set_message('required', 'Enter %s');

	// 	if ($this->form_validation->run() != FALSE) {
	// 		// $this->load->view('login');
	// 		$userName= trim($this->input->post('userName'));
	// 		$password= trim($this->input->post('password'));
	// 		$query = $this->user->processLogin($userName,$password);
	// 		if($query){
	// 			// $query = $query->result();
	// 			$user = array(
	// 			'id_user' => $query[0]->id_user,
	// 			'username' => $query[0]->username,
	// 			'role' => $query[0]->nama_role,
	// 			'nama' => $query[0]->nama,
	// 			'email' => $query[0]->email
	// 			);

	// 			$this->session->set_userdata($user);
	// 			redirect('index.php/successpage.php');
	// 		}
	// 	}else{
			
	// 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	// 		$this->form_validation->set_message('hasmatch', 'Invalid username or password!');
			
	// 		$this->load->view('front/header');
	// 		$this->load->view('front/navbar');
	// 		$this->load->view('front/login');
	// 	}
	// }

 // /** Custom Validation Method*/
	// public function hasmatch(){
		
	// 	$username = trim($this->input->post('userName'));
		
	// 	$query = $this->user->usernameOnDB($username);
	// 	// $query = $query->result();
	// 	if($query){
	// 		$userexist = array('exists' => $query[0]->username);
	// 	}else{
	// 		$userexist = NULL;
	// 	}
		
	// 	if ( $userexist['exists'] == NULL){
	// 		$this->form_validation->set_message('hasmatch', 'Invalid username or password!');
	// 		return FALSE;
	// 	}else{
	// 		// $this->form_validation->set_message('checkUserAvailability', 'Invalid %s or Password');
	// 		return TRUE;
	// 	}

	// }
	// // public function validate_user(){
	// // 	$username = $this->input->post('username');
	// //     $password = $this->input->post('password');

	// //     $result = $this->user->login($username, $password);
	// // }
}
