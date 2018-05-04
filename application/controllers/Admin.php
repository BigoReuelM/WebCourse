<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('session_model');
			$this->load->model('user_model');
			$this->load->helper('form');
			$this->load->library('form_validation');

		}

		public function loadActivitiesPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('activities.php');
			$this->load->view('fragments/footer.php');
		}

		public function loadLessonsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('lessons.php');
			$this->load->view('fragments/footer.php');		
		}

		public function loadInstructorsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$instructorData['instructors'] = $this->user_model->getInstructors();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php', $data);
			$this->load->view('adminInstructors.php', $instructorData);
			$this->load->view('fragments/footer.php');
		}

		public function loadStudentsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('adminStudents.php');
			$this->load->view('fragments/footer.php');
		}

		public function addInstructor(){

			$instructorIdNumber = trim(htmlspecialchars($this->input->post('instructorIdNumber')));
			$instructorFname = trim(htmlspecialchars($this->input->post('instructorFname')));
			$instructorMname = trim(htmlspecialchars($this->input->post('instructorMname')));
			$instructorLname = trim(htmlspecialchars($this->input->post('instructorLname')));
			$this->user_model->insertNewInstructor($instructorIdNumber, $instructorFname, $instructorMname, $instructorLname);
			redirect('admin/loadInstructorsPage');
		}
	}
?>