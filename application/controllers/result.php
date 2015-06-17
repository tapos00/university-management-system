<?php

class Result extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->model('student_model');
        $this->load->model('result_model');
    }

    public function index() {
        $data['studentList'] = $this->student_model->getAllStudent();
        
        $data['greadList'] = $this->result_model->getAllLetter();
        $this->load->view('studentresult', $data);
    }

    public function insertResult() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('studentID', 'Student Name', 'required');
        $this->form_validation->set_rules('courseID', 'course Id', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['studentList'] = $this->student_model->getAllStudent();
            $data['courseList'] = $this->course_model->getAllCourse();
            $data['greadList'] = $this->result_model->getAllLetter();
            $this->load->view('studentresult', $data);
        } else {
            $this->result_model->studentID = $this->input->post('studentID');
            $this->result_model->courseID = $this->input->post('courseID');
            $this->result_model->greadID = $this->input->post('greatletter');
            
            if ($this->result_model->checkResult()== FALSE) {
                $this->result_model->insertStudentResult();
                $this->session->set_flashdata('reg', 'Result entry Successfully');
            } else {
                $this->session->set_flashdata('reg', 'Result already inserted');
            }
            
            redirect('result', 'refresh');
        }
    }

    public function getStudent() {
        $this->result_model->studentID = $this->input->post('id');
        $msg = array("basic"=>$this->result_model->getAStudent());
        $msg['courseInfo'] = $this->result_model->getAEnrollCourse();
        echo json_encode($msg);
    }

}
