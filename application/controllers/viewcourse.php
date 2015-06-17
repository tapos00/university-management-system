<?php

class Viewcourse extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('department_model');
        $this->load->model('view_model');
    }
    public function index(){
         $data['departmentList'] = $this->department_model->getAllDepartment();
         $this->load->view('viewcoursestatus', $data);
    }

    public function viewCourseStatusInfo() {
        $this->view_model->departmentID = $this->input->post('id');
        if($this->view_model->checkDepartmentHasCourse()){
           $statusCourseInfo = $this->view_model->showCourseInfo(); 
        }else{
            $statusCourseInfo = array('msg'=>true);
        }
        

        echo json_encode($statusCourseInfo);
    }

}
