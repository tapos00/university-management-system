<?php

class Allocate_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $assingID;
    public $departmentID;
    public $courseID;
    public $departmentCode;
    public $code;
    public $roomID;
    public $roomNumber;
    public $dayID;
    public $dayName;
    public $startTime;
    public $EndTime;

    public function getAllRoom() {
        $this->db->select('*');
        $this->db->from('class_room');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllDay() {
        $this->db->select('*');
        $this->db->from('day');
        $query = $this->db->get();
        return $query->result();
    }

    public function checkTwo() {
        $sql = 'SELECT * from allocate_class  WHERE ((startTime >= "' . $this->startTime . '" AND startTime < "' . $this->EndTime . '" OR "' . $this->startTime . '" >= startTime AND "' . $this->startTime . '" < EndTime) and roomID=' . $this->roomID . ' and dayID =' . $this->dayID . '  and status=1 )';
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllMydata() {
        $this->db->select('class_room.roomNumber as room,day.dayName as day,department.departmentName as dname,course.code as code,allocate_class.startTime as start,allocate_class.EndTime as end');
        $this->db->from('allocate_class');
        $this->db->join('class_room', 'class_room.roomID = allocate_class.roomID');
        $this->db->join('day', 'day.dayID = allocate_class.dayID');
        $this->db->join('department', 'department.departmentID = allocate_class.departmentID');
        $this->db->join('course', 'course.courseID = allocate_class.courseID');
        $this->db->where('allocate_class.roomID', $this->roomID);
        $this->db->where('allocate_class.dayID', $this->dayID);
        $this->db->where('allocate_class.status', 1);
        $this->db->where('(allocate_class.startTime >= "' . $this->startTime . '" AND allocate_class.startTime < "' . $this->EndTime . '" OR "' . $this->startTime . '" >= allocate_class.startTime AND "' . $this->startTime . '" < allocate_class.EndTime)');


        $query = $this->db->get();
        return $query->result_array();
    }

    public function unassignclassroom() {
        $data = array(
            'status' => 0
        );

        $this->db->where('status', 1);
        $this->db->update('allocate_class', $data);
    }

    public function insertAllocate() {
        $data = array(
            'departmentID' => $this->departmentID,
            'courseID' => $this->courseID,
            'roomID' => $this->roomID,
            'dayID' => $this->dayID,
            'startTime' => $this->startTime,
            'EndTime' => $this->EndTime
        );

        $this->db->insert('allocate_class', $data);
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