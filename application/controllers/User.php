<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('user_model');
			$this->load->model('session_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('loginPage.php');
		}

		public function loginUser(){
			$loginID = trim(html_escape($this->input->post('username')));
			$password = trim(html_escape($this->input->post('inputPassword')));

			if (empty($loginID)) {
				$this->session->set_flashdata('error_msg', 'User ID should not be empty!');
				redirect('user/index');
			}

			if (empty($password)) {
				$this->session->set_flashdata('error_msg', 'Password should not be empty!');
				redirect('user/index');
			}

			$data = $this->user_model->loginUser($loginID, $password);

			if($data){
				$this->session->set_userdata('userID', $data['userID']);
				$this->session->set_userdata('firstName', $data['firstName']);
				$this->session->set_userdata('middleName', $data['middleName']);
				$this->session->set_userdata('lastName', $data['lastName']);
				$this->session->set_userdata('userType', $data['userType']);
				$this->session->set_userdata('instructor', $data['instructor']);
				$this->session->set_userdata('course', $data['course']);
				$this->session->set_userdata('year', $data['year']);

				redirect('welcome/index');
			}else{
				$this->session->set_flashdata('error_msg', 'Error occured, Try again.');
				redirect('user/index');
			}
		}

		public function logoutUser(){

			$this->session->sess_destroy();
			redirect('welcome/index', 'refresh');
		}

		public function userProfile(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('userProfile.php');
			$this->load->view('fragments/footer.php');
		}
	}
?>