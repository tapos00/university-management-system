<?php

class Course_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $courseID;
    public $code;
    public $credit;
    public $courseName;
    public $courseDescription;
    public $departmentID;
    public $semesterID;
    public $courseDate;
    public $departmentCode;
    public $semesterName;

    public function insertCourseModel() {
        $data = array(
            'code' => $this->code,
            'credit' => $this->credit,
            'courseName' => $this->courseName,
            'courseDescription' => $this->courseDescription,
            'departmentID' => $this->departmentID,
            'semesterID' => $this->semesterID
        );
        $this->db->insert('course', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCourse() {
        $query = $this->db->get('course');
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function getallcourses() {
        $this->db->select('course.code as code,course.courseName as name,course.credit,course.courseDescription as description,department.departmentName as dname,semester.semesterName as semester');
        $this->db->from('course');
        $this->db->join('department', 'department.departmentID = course.departmentID');
        $this->db->join('semester', 'semester.semesterID = course.semesterID');

        $query = $this->db->get();
        return $query->result();
    }

    public function hasCourseCode() {
        $this->db->where('code', $this->code);
        $query = $this->db->get('course');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hasCourseName() {

        $this->db->where('courseName', $this->courseName);
        $query = $this->db->get('course');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCourseCreditInfo() {
        $this->db->select('courseName, credit');
        $this->db->from('course');
        $this->db->where('courseID', $this->courseID);
        $query = $this->db->get();
        return $query->row_array();
    }

}
