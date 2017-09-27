<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class loginControl extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('loginModel');
		$this->load->library('form_validation','session');
		$this->load->helper('url','form','html');
	}

	public function index()
	{
		$this->load->view('front/header');
		$this->load->view('front/navbar');
		$this->load->view('front/loginForm');
	}
	public function prosesLogin(){
		$username= trim($this->input->post('usernameTxt'));
		$password= trim($this->input->post('passwordTxt'));

		$this->form_validation->set_rules('usernameTxt', 'Username', 'required');
		$this->form_validation->set_rules('passwordTxt', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan1', 'Username or password field still empty!<br>Please fill all the field required.');
			$this->form_validation->set_message('required', 'Incorrect username or password! Please login using valid username and password.');
			redirect(site_url().'/loginControl/index');
		}else{
			$data = array(
			'username' => $username,
			'password' => $password
			);
			$check = $this->loginModel->processLogin($data);
			// echo "<script>alert('".$check."');</script>";
			// echo "<script>alert('".$check['id_user']."');</script>";
			if($check){
				// foreach ($check as $loginData) {
				// 	$iduser = $loginData['id_user'];
				// 	$username = $loginData['username'];
				// 	$role = $loginData['nama_role'];
				// 	$nama = $loginData['nama'];
				// 	$email = $loginData['email'];
				// }

				// $userSessionData1 = array(
				// 	'iduser' => $check['id_user'],
				// 	'username' => $check['username'],
				// 	'role' => $check['nama_role'],
				// 	'nama'=> $check['nama'],
				// 	'email'=> $check['email']
				// );
				//this works
				$userSessionData = array(
					'iduser' => $check[0]->id_user,
					'username' => $check[0]->username,
					'role' => $check[0]->nama_role,
					'nama'=> $check[0]->nama,
					'email'=> $check[0]->email

				);
				// echo "<script>alert('".$userSessionData['role']."');</script>";
				// $this->session->set_userdata('loggedIn1',$userSessionData1);
				$this->session->set_userdata('loggedIn',$userSessionData);
				redirect(site_url().'/Home/index');
			}else{
				$this->session->set_flashdata('pesan2', 'You username or password is incorrect!');
				redirect(site_url().'/loginControl/index');
			}
		}

	}
	public function logout()
	{
		redirect('homeControl/logout');
	}
	public function isEmpty(){

	}
	// public function _checkUsernamePassword() {
	// 	$userName= trim($this->input->post('userName'));
	// 	$password= trim($this->input->post('password'));
	// 	$query = $this->user->processLogin($userName,$password);
 //        if ($this->form_validation->run() == FALSE) {
	// 		// $this->load->view('login');
			
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
	// 		}else{
	// 			$this->form_validation->set_message('required', 'Incorrect username or password! Please login using valid username and password.');
	// 			redirect()
	// 		}
	// 	}else{
	// 		$this->form_validation->set_message('required', 'Incorrect username or password! Please login using valid username and password.');

	// 		$this->load->view('front/header');
	// 		$this->load->view('front/navbar');
	// 		$this->load->view('front/login');
	// 	}  
	// }
}

 /** Custom Validation Method*/
	// public function hasmatch(){
		
	// 	$username = trim($this->input->post('userName'));
	// 	// $password = trim($this->input->post('userName'));
	// 	$query = $this->loginModel->usernameOnDB($username);
	// 	// $query = $this->loginModel->passwdOnDB($password);
	// 	// $query = $query->result();
	// 	$userexist = array('exist' => $query[0]->username);
	// 	if ( $userexist['exists'] == NULL){
	// 		$this->form_validation->set_message('hasmatch', 'Incorrect password!');
	// 		return FALSE;
	// 	}else{
	// 		return TRUE;
	// 	}
	// }
	// public function validate_user(){
	// 	$username = $this->input->post('username');
	//     $password = $this->input->post('password');

	//     $result = $this->user->login($username, $password);
	// }

