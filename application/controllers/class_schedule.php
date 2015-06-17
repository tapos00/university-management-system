<?php

class Class_schedule  extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("department_model");
        $this->load->model('class_schedule_model');
    }
    
    public function index(){
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $this->load->view("class_schedule",$data);
    }
    public function getSchedule(){
        $departmentId = $this->input->post('id');
        $msg = $this->class_schedule_model->getall($departmentId);
        echo json_encode($msg);
    }
}
