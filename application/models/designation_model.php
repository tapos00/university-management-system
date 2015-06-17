<?php

class Designation_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public $designationID;
    public $designationName;
    
    public function getAllDesignation(){
        $query = $this->db->get('designation');
        if($query->num_rows > 0){
            return $query->result();
        }
    }
}
