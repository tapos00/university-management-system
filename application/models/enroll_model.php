<?php

class Enroll_model extends CI_Model {
    public function __construct() {
    parent::__construct();
    }
    public $enroll_ID;
    public $courseID;
    public $studentID;
    public $enrollDate;
    public $code;
    public $studentName;
    public $studentEmail;
    public $studentContact;
    public $studentAdmitDate;
    public $studentAddress;
    public $departmentID;
    public $departmentCode;
    public $studentRegNO;
    
    public function insertEnrollCourse(){
        $data = array(
            'studentID' => $this->studentID,
            'courseID' => $this->courseID
        );
        $this->db->insert('courseenroll', $data);
    }
    public function getAllEnrollCourer(){
        $this->db->select('courseenroll.*, student.studentRegNO, student.studentName, student.studentEmail, student.departmentID, department.departmentCode, course.code');
        $this->db->from('courseenroll');
        $this->db->join('student', 'courseenroll.studentID = student.studentID');
        $this->db->join('department', 'student.departmentID = department.departmentID'); 
        $this->db->join('course', 'courseenroll.courseID = course.courseID');
        $this->db->order_by('student.studentRegNO');
               
               
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        }
        return FALSE;
    }
    public function checkEnroll(){
        $this->db->select('*');
        $this->db->from('courseenroll');
        $this->db->where('studentID', $this->studentID);
        $this->db->where('courseID', $this->courseID);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return false;
        }else {
            return TRUE;
        }
    }

    public function getAStudentINFO(){
        $this->db->select('student.studentName as name, student.studentEmail as email, department.departmentCode as code');
        $this->db->from('student');
         $this->db->join('department', 'student.departmentId = department.departmentID');
        $this->db->where('student.studentID', $this->studentID);
        $query = $this->db->get();
        return $query->row_array();
    }
}
