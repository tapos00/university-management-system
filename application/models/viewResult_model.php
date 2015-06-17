<?php

class ViewResult_model extends CI_Model {

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

    public function getAStudentView() {
        $this->db->select('course.code as code,course.courseName as name,great.letter as letter');
        $this->db->from('result');
        $this->db->join('course', 'result.courseID = course.courseID');
        $this->db->join('great', 'result.greadID = great.greadID');
        $this->db->where('result.studentID',  $this->studentID);
        $query = $this->db->get();
        return $query->result_array();
    }

}
