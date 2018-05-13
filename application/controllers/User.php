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

			$userdata = $this->user_model->loginUser($loginID, $password);

			if($userdata){
			    if($userdata['userType'] !== 'student'){

                    if ($userdata['userType'] === 'instructor') {

                        $data = $this->user_model->getInstructorDetails($userdata['userID']);

                        $this->session->set_userdata('userID', $data['userID']);
                        $this->session->set_userdata('firstName', $data['firstName']);
                        $this->session->set_userdata('middleName', $data['middleName']);
                        $this->session->set_userdata('lastName', $data['lastName']);
                        $this->session->set_userdata('userType', $data['userType']);
                        $this->session->set_userdata('department', $data['department']);
                        $this->session->set_userdata('instructorID', $data['instructorID']);
                    }

                    if($userdata['userType'] === 'admin') {

                        $data = $this->user_model->getAdminDetails($userdata['userID']);
                        $this->session->set_userdata('userID', $data['userID']);
                        $this->session->set_userdata('firstName', $data['firstName']);
                        $this->session->set_userdata('middleName', $data['middleName']);
                        $this->session->set_userdata('lastName', $data['lastName']);
                        $this->session->set_userdata('userType', $data['userType']);
                    }
                        redirect('welcome/index');
                }else{
                    $host = $_SERVER['HTTP_HOST'];
                    redirect('http://'.$host.':3000/index/'.$userdata['userID']);
                }

            }else{
				$this->session->set_flashdata('error_msg', 'Error occured, Try again.');
				redirect('user/index');
			}
		}

		public function logoutUser(){

			$this->session->sess_destroy();
			redirect('welcome/index', 'refresh');
		}

		public function userSetting(){
			$data['session'] = $this->session_model->sessionCheck();
			$data['userDetails'] = $this->user_model->getUserDetails();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('userSetting.php');
			$this->load->view('process/ajax/changePassAjax.php');
			$this->load->view('fragments/footer.php');
		}

		public function passwordChange(){
			$userID = $this->session->userdata('userID');
			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('currentPassword', 'Current Password', 'trim|required|callback_password_matches[' . $userID . ']');
			$this->form_validation->set_rules('newPassword', 'New Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passwordConfirmation', 'Password Confirmation', 'trim|required|matches[newPassword]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {

				$newPassword = html_escape($this->input->post('newPassword'));
				$this->user_model->updateUserPassword($userID, $newPassword);
				$data['success'] = true;

			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}

		public function password_matches($pass, $userID){

			$password = $this->user_model->getPassword($userID);

			if (!password_verify($pass, $password->password)){
				$this->form_validation->set_message('password_matches', 'The password you supplied does not match your existing password. ');
				return FALSE;
			}

			return TRUE;
		}
	}
?>
