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
			
			if ($query = $this->db->get()) {
				$userData = $query->row_array();
				if (password_verify($password, $userData['password'])) {
					return $query->row_array();
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function getInstructors(){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('userType', 'instructor');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function insertNewInstructor($instructorID, $fname, $mname, $lname){
			$hashPass = password_hash("password", PASSWORD_BCRYPT);
			$data = array(
				'idNumber' => $instructorID,
				'firstName' => $fname,
				'middleName' => $mname,
				'lastName' => $lname,
				'userType' => 'instructor',
				'password' => $hashPass,
				'status' => 'active'
			);

			$this->db->insert('users', $data);

		}

		public function insertNewStudent($studentID, $fname, $mname, $lname, $course, $year){
			$hashPass = password_hash("password", PASSWORD_BCRYPT);
			$data = array(
				'idNumber' => $studentID,
				'firstName' => $fname,
				'middleName' => $mname,
				'lastName' => $lname,
				'userType' => 'student',
				'password' => $hashPass,
				'status' => 'active',
				'course' => $course,
				'year' => $year
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

		public function getContents(){
			$this->db->select('contentID, topic, title');
			$this->db->from('content');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getTopicLessons($topic){
			$this->db->select('*');
			$this->db->from('content');
			$this->db->where('topic', $topic);

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getLesson($contentID){
			$this->db->select('*');
			$this->db->from('content');
			$this->db->where('contentID', $contentID);

			$query = $this->db->get();

			return $query->row_array();
		}

		public function getUserDetails(){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('userID', $this->session->userData('userID'));

			$query = $this->db->get();

			return $query->row();
		}

		public function getPassword($userID){
			$this->db->select('password');
			$this->db->from('users');
			$this->db->where('userID', $userID);

			$query = $this->db->get();

			return $query->row();
		}

		public function updateUserPassword($userID, $newPass){
			$hashPass = password_hash($newPass, PASSWORD_BCRYPT);
			$data = array(
				'password' => $hashPass
			);

			$this->db->where('userID', $userID);
			$this->db->update('users', $data);
		}

		public function deleteLesson($lessonID){
			$this->db->where('contentID', $lessonID);
			$this->db->delete('content');
		}

	}

?>