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
			$this->load->view('fragments/scripts.php');
			$this->load->view('activities.php');
			$this->load->view('fragments/footer.php');
		}

		public function loadLessonsPage(){
			$data['session'] = $this->session_model->sessionCheck();
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('lessons.php');
			$this->load->view('process/ajax/addLessonAjax.php');
			$this->load->view('fragments/footer.php');		
		}

		public function loadInstructorsPage(){
			$data['session'] = $this->session_model->sessionCheck();
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
			$this->load->view('fragments/head.php');
			$this->load->view('fragments/header.php',$data);
			$this->load->view('fragments/scripts.php');
			$this->load->view('adminStudents.php');
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
				//redirect('admin/loadInstructorsPage');
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}

		public function addLesson(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules('topic', 'Topic', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('heading', 'Heading', 'trim|required');
			$this->form_validation->set_rules('body', 'Body', 'trim|required');
			$this->form_validation->set_rules('sample', 'Sample', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

			if ($this->form_validation->run()) {
				$idNumber = $this->session->userdata('userID');
				$topic = htmlspecialchars($this->input->post('topic'));
				$title = htmlspecialchars($this->input->post('title'));
				$heading = htmlspecialchars($this->input->post('heading'));
				$body = htmlspecialchars($this->input->post('body'));
				$sample = htmlspecialchars($this->input->post('sample'));
				
				$data['success'] = true;
			}else{
				foreach ($_POST as $key => $value) {
					$data['messages'][$key] = form_error($key);
				}
			}

			echo json_encode($data);
		}
	}
?>