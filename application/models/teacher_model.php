<?php

class Teacher_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $teacherID;
    public $teacherName;
    public $teacherAddress;
    public $teacherEmail;
    public $teacherContactNO;
    public $designationID;
    public $departmentID;
    public $teacherCredit;
    public $departmentCode;
    public $designationName;

    public function insertTeacherModel() {
        $data = array(
            'teacherName' => $this->teacherName,
            'teacherAddress' => $this->teacherAddress,
            'teacherEmail' => $this->teacherEmail,
            'teacherContactNO' => $this->teacherContactNO,
            'designationID' => $this->designationID,
            'departmentID' => $this->departmentID,
            'teacherCredit' => $this->teacherCredit
        );
        $this->db->insert('teacher', $data);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
}

    }

    public function getAllTeacher() {
        $this->db->select('teacher.*, department.departmentCode,designation.designationName');
        $this->db->from('teacher');
        $this->db->join('department', 'teacher.departmentID = department.departmentID');
        $this->db->join('designation', 'teacher.designationID = designation.designationID');
        $this->db->order_by("teacher.teacherName", "asc");
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function hasTeacherEmail() {
        $this->db->where('teacherEmail', $this->teacherEmail);
        $query = $this->db->get('teacher');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function teacherCourseValue() {
        $this->db->select('teacher.teacherName as name ,teacher.teacherCredit as credit, (teacher.teacherCredit - sum(course.credit)) as rcredit');
        $this->db->from('teacher');
        $this->db->join('assing_course', 'teacher.teacherID = assing_course.teacherID', 'left');
        $this->db->join('course', 'assing_course.courseID = course.courseID', 'left');
        $this->db->where('teacher.teacherID', $this->teacherID);
        $this->db->where('assing_course.status', 1);
        $this->db->group_by("teacher.teacherName");
        $query = $this->db->get();
        return $query->row_array();
    }
    public function checkTeacherHasCourse(){
       
        $this->db->where('assing_course.teacherID', $this->teacherID);
        $this->db->where('assing_course.status', 1);
         $query = $this->db->get('assing_course');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getTeacherC(){
        $this->db->select('teacherCredit as credit');
        $this->db->where('teacher.teacherID', $this->teacherID);
        $query = $this->db->get('teacher');
        return $query->row_array();
    }

}
