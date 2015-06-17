<?php

class Allocate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('department_model');
        $this->load->model('course_model');
        $this->load->model('allocate_model');
    }

    public function index() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['courseList'] = $this->course_model->getAllCourse();
        $data['roomList'] = $this->allocate_model->getAllRoom();
        $data['dayList'] = $this->allocate_model->getAllDay();
        $this->load->view('allocate_class', $data);
    }
    public function getMydata(){
        $startTime = $this->input->post('from');
        $endTime = $this->input->post('to');
        $this->allocate_model->startTime = date("H:i:s", strtotime($startTime));
        $this->allocate_model->EndTime = date("H:i:s", strtotime($endTime));
        $this->allocate_model->departmentID = $this->input->post('department');
        $this->allocate_model->courseID = $this->input->post('courseID');
        $this->allocate_model->dayID = $this->input->post('timeDay');
        $this->allocate_model->roomID = $this->input->post('roomNo');
        $msg = "";
        $error = FALSE;
        if($this->allocate_model->checkTwo()){
          $error = TRUE;
          $msg = $this->allocate_model->getAllMydata();
         
        }
         $result = array("error"=>$error,"msg"=>$msg);
          echo json_encode($result);
    }

    public function newAllocate() {
        $startTime = $this->input->post('from');
        $endTime = $this->input->post('to');
        $this->allocate_model->startTime = date("H:i:s", strtotime($startTime));
        $this->allocate_model->EndTime = date("H:i:s", strtotime($endTime));
        $this->allocate_model->departmentID = $this->input->post('department');
        $this->allocate_model->courseID = $this->input->post('courseID');
        $this->allocate_model->dayID = $this->input->post('timeDay');
        $this->allocate_model->roomID = $this->input->post('roomNo');
        
           
             $this->allocate_model->insertAllocate();
         $this->session->set_flashdata('insert', 'insert successfully');
         redirect('/allocate','refresh');
        
    }
    public function unassignclassroom(){
        $this->allocate_model->unassignclassroom();
        $msg = array("msg"=>"all class rooom unallocated");
        echo json_encode($msg);
        
    }

}
