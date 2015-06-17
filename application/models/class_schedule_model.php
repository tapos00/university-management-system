<?php

class Class_schedule_model extends CI_Model {

    public function getall($id) {
        $this->db->select('courseID,course.code as code,course.courseName as name');
        $this->db->where('departmentID', $id);
        $query = $this->db->get('course');
        $mydata = array();
        foreach ($query->result() as $row) {
            if($this->getAllMydata($row->courseID)){
                $mm =$this->getAllMydata($row->courseID); 
                $sch= "";
                foreach ($mm as $rows) {
                    $stime  = date("g:i a", strtotime($rows->start));
                    $etime  = date("g:i a", strtotime($rows->end));
                    $sch .= "r no:".$rows->roomNumber.",".$rows->dayName." ".$stime."-".$etime."<br>";
                }
                
            }else{
                $sch = "unschedule";
            }
            $mydata[]= array("code"=>$row->code,"name"=>$row->name,"list"=>$sch);
            
        }
        return $mydata;
    }
    public function getAllMydata($cid) {
        $this->db->select("class_room.roomNumber,day.dayName,department.departmentName,course.code,allocate_class.startTime as start,allocate_class.EndTime as end");
        $this->db->from('allocate_class');
        $this->db->join('class_room', 'class_room.roomID = allocate_class.roomID');
        $this->db->join('day', 'day.dayID = allocate_class.dayID');
        $this->db->join('department', 'department.departmentID = allocate_class.departmentID');
        $this->db->join('course', 'course.courseID = allocate_class.courseID');
        $this->db->where('allocate_class.status', 1);
        $this->db->where('course.courseID',$cid);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }

}
