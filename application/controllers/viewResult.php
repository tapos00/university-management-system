<?php

class ViewResult extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('viewResult_model');
        $this->load->model('result_model');
    }
    public function index() {
        $data['studentList'] = $this->student_model->getAllStudent();
        $this->load->view('view_Result', $data);
    }
    
    public function getStudentView() {
        $this->viewResult_model->studentID = $this->input->post('id');
        $this->result_model->studentID = $this->input->post('id');
        $msg = array("basic"=>$this->result_model->getAStudent());
        $msg['result'] = $this->viewResult_model->getAStudentView();
        echo json_encode($msg);
    }
    
    public function viewCourseStatusInfo() {
        $this->view_model->departmentID = $this->input->post('id');
        $statusCourseInfo = $this->view_model->showCourseInfo();

        echo json_encode($statusCourseInfo);
    }
}
