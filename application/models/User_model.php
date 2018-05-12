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

		public function getInstructorDetails($id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('instructor', 'users.userID = instructor.userID');
			$this->db->where('users.userID', $id);

			$query = $this->db->get();

			return $query->row_array();
		}

		public function getAdminDetails($id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('userID', $id);

			$query = $this->db->get();

			return $query->row_array();
		} 

		public function getInstructors(){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('instructor', 'users.userID = instructor.userID');
			$this->db->where('userType', 'instructor');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getStudents(){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('students', 'users.userID = students.userID');
			$this->db->where('userType', 'student');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getClassStudents(){
			$classCode = $this->session->userData('classCode');
			$instructorID = $this->session->userData('instructorID');

			if ($classCode === "default") {
				$this->db->select('*');
				$this->db->from('users');
				$this->db->join('students', 'users.userID = students.userID');
				$this->db->join('class', 'students.classID = class.classID');
				$this->db->join('instructor', 'class.instructorID = instructor.instructorID');
				$this->db->where('instructor.instructorID', $instructorID);

				$query = $this->db->get();

				return $query->result_array();
			}else{
				$this->db->select('*');
				$this->db->from('users');
				$this->db->join('students', 'users.userID = students.userID');
				$this->db->join('class', 'students.classID = class.classID');
				$this->db->join('instructor', 'class.instructorID = instructor.instructorID');
				$this->db->where('class.classID', $classCode);
				$this->db->where('instructor.instructorID', $instructorID);

				$query = $this->db->get();

				return $query->result_array();
			}
		}

		public function getClasses(){
			$this->db->select('*');
			$this->db->from('class');
			$this->db->join('instructor', 'class.instructorID = instructor.instructorID');
			$this->db->join('users', 'instructor.userID = users.userID');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getClassCodes(){
			$this->db->select('*');
			$this->db->from('class');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getInstructorClass(){
			$id = $this->session->userData('instructorID');

			$this->db->select('*');
			$this->db->from('class');
			$this->db->where('instructorID', $id);

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getAnnouncements(){
			$this->db->select('*');
			$this->db->from('announcement');
			$this->db->join('instructor', 'announcement.instructorID = instructor.instructorID');
			$this->db->join('users', 'instructor.userID = users.userID');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function getActivities(){
			$this->db->select('*');
			$this->db->from('activity');

			$query = $this->db->get();

			return $query->result_array();
		}

		public function getActivityQuestions(){
			$actID = $this->session->userData('activityID');
			$this->db->select('*');
			$this->db->from('questions');
			$this->db->where('activityID', $actID);

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

			$newInstructorID = $this->db->insert_id();

			$secondData = array(
				'department' => 'IT Department',
				'userID' => $newInstructorID
			);

			$this->db->insert('instructor', $secondData);

		}

		public function insertNewStudent($studentID, $fname, $mname, $lname, $course, $year, $code){
			$hashPass = password_hash("password", PASSWORD_BCRYPT);
			$data = array(
				'idNumber' => $studentID,
				'firstName' => $fname,
				'middleName' => $mname,
				'lastName' => $lname,
				'userType' => 'student',
				'password' => $hashPass,
				'status' => 'active'
			);

			$this->db->insert('users', $data);

			$newStudentID = $this->db->insert_id();

			$secondData = array(
				'course' => $course,
				'year' => $year,
				'classID' => $code,
				'userID' => $newStudentID
			);

			$this->db->insert('students', $secondData);

		}

		public function insertNewLesson($idNumber, $topic, $title, $heading, $body, $sample){

			$data = array(
				'instructorID' => $idNumber,
				'topic' => $topic,
				'title' => $title,
				'heading' => $heading,
				'body' => $body,
				'sample' => $sample
			);

			$this->db->insert('content', $data);

		}

		public function insertNewAnnouncement($name, $announcement){
			$id = $this->session->userData('instructorID');
			$data = array(
				'announcementName' => $name,
				'announcementContent' => $announcement,
				'instructorID' => $id
			);

			$this->db->insert('announcement', $data);
		}

		public function insertNewClass($classCode, $instructorID){

			$data = array(
				'classCode' => $classCode,
				'instructorID' => $instructorID
			);

			$this->db->insert('class', $data);

		}

		public function insertNewActivity($topic, $desc){
			$id = $this->session->userData('instructorID');
			$data = array(
				'activityDescription' => $desc,
				'topic' => $topic,
				'instructorID' => $id
			);

			$this->db->insert('activity', $data);

			return $this->db->insert_id();
		}

		public function insertQuestionAnswer($question, $answer, $id){
			$data = array(
				'question' => $question,
				'answer' => $answer,
				'activityID' => $id
			);

			$this->db->insert('questions', $data);
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
