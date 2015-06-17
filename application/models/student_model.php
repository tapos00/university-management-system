<?php

class Student_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public $studentID;
    public $studentName;
    public $studentEmail;
    public $studentContact;
    public $studentAdmitDate;
    public $studentAddress;
    public $departmentID;
    public $studentRegNO;
    
    public function insertStudentModel() {
        $data = array(
            'studentName' => $this->studentName,
            'studentEmail' => $this->studentEmail,
            'studentContact' => $this->studentContact,
            //'studentAdmitDate' => $this->studentAdmitDate,
            'studentAddress' => $this->studentAddress,
            'departmentID' => $this->departmentID
        );
        $this->db->insert('student', $data);
        return $this->db->insert_id();
    }

    public function getAllStudent() {
        $this->db->select('student . * , department.departmentCode');
        $this->db->from('student');
        $this->db->join('department', 'student.departmentId = department.departmentID');
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function hasStudentEmail() {
        $this->db->where('studentEmail', $this->studentEmail);
        $query = $this->db->get('student');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function updateStudentReg(){
        $data = array(
            'studentRegNO' => $this->studentRegNO
        );
        $this->db->where('studentID', $this->studentID);
        $this->db->update('student', $data);
    }
}
