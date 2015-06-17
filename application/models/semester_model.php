<?php

class Semester_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public $semesterID;
    public $semesterName;
    
    public function getAllSemester(){
        $query = $this->db->get('semester');
        if($query->num_rows > 0){
            return $query->result();
        }
    }
}
