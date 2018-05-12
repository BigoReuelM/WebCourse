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

		public function loadInstructorsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->session_model->properAccessCheckAdmin();
			$instructorData['instructors'] = $this->user_model->getInstructors();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php', $data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('adminInstructors.php', $instructorData);
			$this->load->view('process/ajax/addInstructorAjax.php');
			$this->load->view('fragments/footer.php');
		}

		public function loadStudentsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->session_model->properAccessCheckAdmin();
			$studentData['students'] = $this->user_model->getStudents();
			$studentData['codes'] = $this->user_model->getClassCodes();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('adminStudents.php', $studentData);
			$this->load->view('process/ajax/addStudentAjax.php');
			$this->load->view('fragments/footer.php');
		}

		public function loadAnnouncementPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->session_model->properAccessCheckAdmin();
			$announcmentData['announcements'] = $this->user_model->getAnnouncements();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('adminAnnouncements.php', $announcmentData);
			$this->load->view('process/ajax/addAnnouncementAjax.php');
			$this->load->view('fragments/footer.php');
		}

		public function loadClassesPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->session_model->properAccessCheckAdmin();
			$classData['classes'] = $this->user_model->getClasses();
			$classData['instructors'] = $this->user_model->getInstructors();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('adminClasses.php', $classData);
			$this->load->view('process/ajax/addClassAjax.php');
			$this->load->view('fragments/footer.php');
		}

		public function addInstructor(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('instructorIdNumber', 'ID Number', 'trim|required|is_unique[users.idNumber]');
			$this->form_validation->set_message('is_unique', 'This ID number allready exist.');
			$this->form_validation->set_rules('instructorFname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('instructorMname', 'Middle Name', 'trim|required');
			$this->form_validation->set_rules('instructorLname', 'Last Name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$instructorIdNumber = htmlspecialchars($this->input->post('instructorIdNumber'));
				$instructorFname = ucwords( htmlspecialchars($this->input->post('instructorFname')));
				$instructorMname = ucwords(htmlspecialchars($this->input->post('instructorMname')));
				$instructorLname = ucwords(htmlspecialchars($this->input->post('instructorLname')));
				$this->user_model->insertNewInstructor($instructorIdNumber, $instructorFname, $instructorMname, $instructorLname);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}

		public function addStudent(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('idNumber', 'ID Number', 'trim|required|is_unique[users.idNumber]');
			$this->form_validation->set_message('is_unique', 'This ID number allready exist.');
			$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('middleName', 'Middle Name', 'trim|required');
			$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('course', 'Course', 'trim|required');
			$this->form_validation->set_rules('year', 'Year', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$idNumber = htmlspecialchars($this->input->post('idNumber'));
				$firstName = ucwords( htmlspecialchars($this->input->post('firstName')));
				$middleName = ucwords(htmlspecialchars($this->input->post('middleName')));
				$lastName = ucwords(htmlspecialchars($this->input->post('lastName')));
				$course = ucwords(htmlspecialchars($this->input->post('course')));
				$year = ucwords(htmlspecialchars($this->input->post('year')));
				$code = htmlspecialchars($this->input->post('classCode'));
				$this->user_model->insertNewStudent($idNumber, $firstName, $middleName, $lastName, $course, $year, $code);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
					if (!isset($_POST['classCode'])) {
						$data['messages']['classCode'] = '<p class="text-danger">The Class Code is Required!</p>';
					}
				}
			}

			echo json_encode($data);
		}

		public function addAnnouncement(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('announcementName', 'Announcement Name', 'trim|required');
			$this->form_validation->set_rules('announcement', 'Announcement', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$name = ucwords(htmlspecialchars($this->input->post('announcementName')));
				$announcement = ucwords(htmlspecialchars($this->input->post('announcement')));

				$this->user_model->insertNewAnnouncement($name, $announcement);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}

		public function addClass(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('classcode', 'Class Code', 'trim|required');
			$this->form_validation->set_rules('classInstructor', 'Class Instructor', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$classCode = $this->input->post('classcode');
				$instructor = $this->input->post('classInstructor');

				$this->user_model->insertNewClass($classCode, $instructor);
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
					if (!isset($_POST['classInstructor'])) {
						$data['messages']['classInstructor'] = '<p class="text-danger">The Instructor Field is Required!</p>';
					}
				}
			}

			echo json_encode($data);
		}

	}
?>