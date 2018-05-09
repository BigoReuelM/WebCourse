<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Instructor extends CI_Controller
{
	
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

	public function loadReports(){
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('instructorReports.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadRecords(){
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('instructorRecords.php');
		$this->load->view('fragments/footer.php');

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
		$data['topics'] = array(
				"servlets",
				"jsp",
				"php",
				"nodejs",
				"websecurity"		
		);	
		$data['contents'] = $this->user_model->getContents();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('lessons.php', $data);
		$this->load->view('process/ajax/addLessonAjax.php');
		$this->load->view('fragments/footer.php');		
	}
	
	public function addLesson(){

		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('topic', 'Topic', 'trim');
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

			$this->user_model->insertNewLesson($idNumber, $topic, $title, $heading, $body, $sample);
			
			$data['success'] = true;
		}else{
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
			if (!isset($_POST['topic'])) {
				$data['messages']['topic'] = "<p class='text-danger'>The Topic field is required.</p>";
			}
		}

		echo json_encode($data);
	}
}
?>