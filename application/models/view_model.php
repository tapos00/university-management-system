<?php

class View_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $assingID;
    public $departmentID;
    public $teacherID;
    public $courseID;
    public $departmentCode;
    public $teacherName;
    public $code;
    public $courseName;
    public $semesterName;

    public function showCourseInfo() {
        $this->db->select('course.code as Code, course.courseName as Name, semester.semesterName as Semester, teacher.teacherName as Assign');
        $this->db->from('course');
        $this->db->join('semester', 'course.semesterID=semester.semesterID');
        $this->db->join('assing_course', 'course.courseID=assing_course.courseID', 'left');
        $this->db->join('teacher', 'assing_course.teacherID=teacher.teacherID', 'left');
        $this->db->where('course.departmentID', $this->departmentID);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkDepartmentHasCourse() {
        $this->db->where('departmentID', $this->departmentID);
        $this->db->where('status', 1); 
        $query = $this->db->get('assing_course');
        if($query->num_rows>0){
            return true;
        }
        else{
            return false;
        }
    }

}
