<?php

class Assing_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public $assingID;
    public $departmentID;
    public $teacherID;
    public $courseID;
    public $departmentCode;
    public $teacherName;
    public $teacherCredit;
    public $remainingCredit;
    public $code;
    public $courseName;
    public $credit;
    public $semesterName;


    public function updateTeacher($credit) {
       
        $this->db->set('teacherCredit', 'teacherCredit+'.$credit, FALSE);
$this->db->where('teacherID', $this->teacherID);
$this->db->update('teacher');
    }
    public function insertAssignModel(){
         $data = array(
            'departmentID' => $this->departmentID,
            'teacherID' => $this->teacherID,
            'courseID' => $this->courseID
        );
        $this->db->insert('assing_course', $data);
    }
    public function getAllAssignModel(){
        $this->db->select('assing_course.*, department.departmentCode, course.code, course.courseName, course.credit, teacher.teacherName, teacher.teacherCredit, teacher.remainingCredit');
        $this->db->from('assing_course');
        $this->db->join('department', 'assing_course.departmentID = department.departmentID', 'left');
        $this->db->join('course', 'assing_course.courseID = course.courseID', 'left');
        $this->db->join('teacher', 'assing_course.teacherID = teacher.teacherID', 'left');
        $this->db->where('assing_course.status',1);
        $query = $this->db->get();
        return $query->result();
    }
  public function getADepartmentAllTeacher(){
        $this->db->select('teacherId, teacherName');
        $this->db->from('teacher');
        $this->db->where('departmentID', $this->departmentID);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAAssignCoutse(){
        $this->db->where('courseID', $this->courseID);
        $this->db->where('status', 1);
        $query = $this->db->get('assing_course');
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    
}


//public function getADepartmentAllTeacher(){
//        $this->db->select('teacher.teacherId AS teacherID, teacher.teacherName AS teacherName, course.courseID AS courseID, course.code AS courseCode');
//        $this->db->from('department');
//        $this->db->join('teacher', 'teacher.departmentID = department.departmentID');
//        $this->db->join('course', 'course.departmentID = department.departmentID');
//        $this->db->where('department.departmentID', $this->departmentID);
//        $query = $this->db->get();
//        return $query->result_array();
//    }