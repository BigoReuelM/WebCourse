<?php  
	/**
	* 
	*/
	class User_model extends CI_model
	{
		
		public function loginUser($loginID, $password){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('idNumber', $loginID);
			$this->db->where('password', $password);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function getInstructors(){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('userType', 'instructor');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function insertNewInstructor($instructorID, $fname, $mname, $lname){

			$data = array(
				'idNumber' => $instructorID,
				'firstName' => $fname,
				'middleName' => $mname,
				'lastName' => $lname,
				'userType' => 'instructor',
				'password' => 'password'
			);

			$this->db->insert('users', $data);

		}

		public function insertNewLesson($idNumber, $topic, $title, $heading, $body, $sample){

			$data = array(
				'instructor' => $idNumber,
				'topic' => $topic,
				'title' => $title,
				'heading' => $heading,
				'body' => $body,
				'sample' => $sample
			);

			$this->db->insert('content', $data);

		}
	}

?>