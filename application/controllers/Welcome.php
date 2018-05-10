<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('home.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadServlets()
	{
		$this->session_model->sessionTopicCheck();
		$data['session'] = $this->session_model->sessionCheck();
		$topicName = "servlets";
		$data['servlets'] = $this->user_model->getTopicLessons($topicName);
		
		
		if (isset($_SESSION['contentID'])) {
			if ($_SESSION['contentID'] === "default") {

				$data['lessonData'] = array();

			}else{

				$contentID = $this->session->userdata('contentID');	
				$data['lessonData'] = $this->user_model->getLesson($contentID);
			}
		}

		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('servletsMainPage.php');
		$this->load->view('fragments/footer.php');
		
	}

	public function loadJSP()
	{
		$this->session_model->sessionTopicCheck();
		$data['session'] = $this->session_model->sessionCheck();
		$topicName = "jsp";
		$data['jsps'] = $this->user_model->getTopicLessons($topicName);
		
		
		if (isset($_SESSION['contentID'])) {
			if ($_SESSION['contentID'] === "default") {

				$data['lessonData'] = array();

			}else{

				$contentID = $this->session->userdata('contentID');	
				$data['lessonData'] = $this->user_model->getLesson($contentID);
			}
		}
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('jspMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadNode()
	{
		$this->session_model->sessionTopicCheck();
		$data['session'] = $this->session_model->sessionCheck();
		$topicName = "nodejs";
		$data['nodes'] = $this->user_model->getTopicLessons($topicName);
		
		
		if (isset($_SESSION['contentID'])) {
			if ($_SESSION['contentID'] === "default") {

				$data['lessonData'] = array();

			}else{

				$contentID = $this->session->userdata('contentID');	
				$data['lessonData'] = $this->user_model->getLesson($contentID);
			}
		}
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('nodeMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadPHP()
	{
		$this->session_model->sessionTopicCheck();
		$data['session'] = $this->session_model->sessionCheck();
		$topicName = "php";
		$data['phps'] = $this->user_model->getTopicLessons($topicName);
		
		
		if (isset($_SESSION['contentID'])) {
			if ($_SESSION['contentID'] === "default") {

				$data['lessonData'] = array();

			}else{

				$contentID = $this->session->userdata('contentID');	
				$data['lessonData'] = $this->user_model->getLesson($contentID);
			}
		}
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('phpMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadWebSecurity()
	{
		$this->session_model->sessionTopicCheck();
		$data['session'] = $this->session_model->sessionCheck();
		$topicName = "websecurity";
		$data['waps'] = $this->user_model->getTopicLessons($topicName);
		
		
		if (isset($_SESSION['contentID'])) {
			if ($_SESSION['contentID'] === "default") {

				$data['lessonData'] = array();

			}else{

				$contentID = $this->session->userdata('contentID');	
				$data['lessonData'] = $this->user_model->getLesson($contentID);
			}
		}
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('webSecurityMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadSources()
	{
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('sources.php');
		$this->load->view('fragments/footer.php');
	}

	public function setServletLessonID(){

		if (isset($_POST['topicContent'])) {
			$contentID = $this->input->post('topicContent');
			$this->session->set_userdata('contentID', $contentID);
		}else{
			$this->session->set_userdata('contentID', "default");
		}

		redirect('welcome/loadServlets');

	}

	public function setJSPLessonID(){

		if (isset($_POST['topicContent'])) {
			$contentID = $this->input->post('topicContent');
			$this->session->set_userdata('contentID', $contentID);
		}else{
			$this->session->set_userdata('contentID', "default");
		}

		redirect('welcome/loadJSP');

	}

	public function setPHPLessonID(){

		if (isset($_POST['topicContent'])) {
			$contentID = $this->input->post('topicContent');
			$this->session->set_userdata('contentID', $contentID);
		}else{
			$this->session->set_userdata('contentID', "default");
		}

		redirect('welcome/loadPHP');

	}

	public function setNodejsLessonID(){

		if (isset($_POST['topicContent'])) {
			$contentID = $this->input->post('topicContent');
			$this->session->set_userdata('contentID', $contentID);
		}else{
			$this->session->set_userdata('contentID', "default");
		}

		redirect('welcome/loadNode');

	}

	public function setWebSecurityLessonID(){

		if (isset($_POST['topicContent'])) {
			$contentID = $this->input->post('topicContent');
			$this->session->set_userdata('contentID', $contentID);
		}else{
			$this->session->set_userdata('contentID', "default");
		}

		redirect('welcome/loadWebSecurity');

	}


}
