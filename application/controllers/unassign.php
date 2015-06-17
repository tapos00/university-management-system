<?php

class Unassign  extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('unassign_model');
    }
    
    public function course() {
        $this->load->view('unassignCourse');
        
    }
    public function unassignCourse(){
        $this->unassign_model->unassignCourses();
        $msg = array("msg"=>"all course unallocated");
        echo json_encode($msg);
        
    }
}
