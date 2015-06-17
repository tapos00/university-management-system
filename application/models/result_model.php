<?php

class Result_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $resultID;
    public $courseID;
    public $studentID;
    public $resultDate;
    public $code;
    public $studentName;
    public $studentEmail;
    public $studentContact;
    public $studentAdmitDate;
    public $studentAddress;
    public $departmentID;
    public $departmentCode;
    public $studentRegNO;
    public $greadID;
    public $letter;

    public function insertStudentResult() {
        $data = array(
            'studentID' => $this->studentID,
            'courseID' => $this->courseID,
            'greadID' => $this->greadID,
        );
        $this->db->insert('result', $data);
    }

    public function getAllStudentResult() {
        $this->db->select('result.*, great.letter, student.studentRegNO, student.studentName, student.studentEmail, department.departmentCode, course.code');
        $this->db->from('result');
        $this->db->join('great', 'great.greadID = result.greadID');
        $this->db->join('student', 'result.studentID = student.studentID');
        $this->db->join('department', 'student.departmentID = department.departmentID');
        $this->db->join('course', 'course.departmentID = department.departmentID');
        $this->db->order_by("result.resultID", "asc");
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function checkResult() {
        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('studentID', $this->studentID);
        $this->db->where('courseID', $this->courseID);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllLetter() {
        $this->db->select('*');
        $this->db->from('great');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function getAStudent() {
        $this->db->select('student.studentName as name, student.studentEmail as email, department.departmentCode as code');
        $this->db->from('student');
        $this->db->join('department', 'student.departmentId = department.departmentID');
        $this->db->where('student.studentID', $this->studentID);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getAEnrollCourse() {
        $this->db->select('course.courseID as id,course.code as code');
        $this->db->from('courseenroll');
        $this->db->join('course', 'courseenroll.courseID = course.courseID');
        $this->db->where('courseenroll.studentID',  $this->studentID);
        $query = $this->db->get();
        return $query->result_array();
    }

}
