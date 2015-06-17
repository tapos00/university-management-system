<?php

class Department_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public $departmentID;
    public $departmentCode;
    public $departmentName;
    public $departmentCreateDate;

    public function insertDepartmentModel() {
        $data = array(
            'departmentCode' => $this->departmentCode,
            'departmentName' => $this->departmentName,
        );
        $this->db->insert('department', $data);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    public function getAllDepartment(){
        $query = $this->db->get('department');
        if($query->num_rows > 0){
            return $query->result();
        }
    }
    public function hasDepartment(){
        $this->db->where('departmentCode', $this->departmentCode);
        $query = $this->db->get('department');
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
     public function hasDepartment1(){
        
        $this->db->where('departmentName', $this->departmentName);
        $query = $this->db->get('department');
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    public function getADepartment(){
        $this->db->where('departmentID', $this->departmentID);
        $query = $this->db->get('department');
        return $query->row();
        
    }

}
