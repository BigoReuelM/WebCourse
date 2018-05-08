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
		$data['servlets'] = $this->user_model->getTopicLessons("servlets");
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('servletsMainPage.php');
		$this->load->view('process/ajax/displayLessonAjax.php');
		$this->load->view('fragments/footer.php');
		
	}

	public function loadJSP()
	{
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('jspMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadNode()
	{
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('nodeMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadPHP()
	{
		$data['session'] = $this->session_model->sessionCheck();
		$this->load->view('fragments/head.php');
		$this->load->view('fragments/header.php',$data);
		$this->load->view('fragments/scripts.php');
		$this->load->view('phpMainPage.php');
		$this->load->view('fragments/footer.php');
	}

	public function loadWebSecurity()
	{
		$data['session'] = $this->session_model->sessionCheck();
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

	public function displayLesson(){
		$contentID = $this->input->post('topicContent');
		$data['contentData'] = $this->user_model->getLesson($contentID);
		echo json_encode($data);
	}

}
