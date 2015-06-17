<?php

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_Model');
        $this->load->model('department_model');
    }

    public function index() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['studentList'] = $this->student_Model->getAllStudent();
        $this->load->view('studentEntry', $data);
    }

    public function insertStuden() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $this->load->library('form_validation', $data);

        $this->form_validation->set_rules('studentName', 'Student Name', 'required');
        $this->form_validation->set_rules('studentEmail', 'Student Email', 'required|callback_checkStudentEmail');
        $this->form_validation->set_rules('studentContact', 'Student Contact NO', 'required');      
        $this->form_validation->set_rules('studentAddress', 'Student Address', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['studentList'] = $this->student_Model->getAllStudent();
            $this->load->view('studentEntry', $data);
        } else {
            $this->student_Model->studentName = $this->input->post('studentName');
            $this->student_Model->studentEmail = $this->input->post('studentEmail');
            $this->student_Model->studentContact = $this->input->post('studentContact');
            $this->student_Model->studentAddress = $this->input->post('studentAddress');
            $this->student_Model->departmentID = $this->input->post('department');

            $studentID = $this->student_Model->insertStudentModel();
            
            $this->department_model->departmentID = $this->input->post('department');
            $departmentCode = $this->department_model->getADepartment();
            $regNo = $departmentCode->departmentCode."-".date("Y")."-".$studentID;
            $this->student_Model->studentRegNO = $regNo;
            $this->student_Model->studentID = $studentID;
            $this->student_Model->updateStudentReg();
            $this->session->set_flashdata('reg', 'student Registration Successfully, your Registration No: '. $regNo);
            redirect('student', 'refresh');
        }
    }

    public function checkStudentEmail($s_email) {
        $this->student_Model->studentEmail = $s_email;
        if (!$this->student_Model->hasStudentEmail()) {
            return true;
        } else {
            $this->form_validation->set_message('checkStudentEmail', 'This student Email already in our system');
            return false;
        }
    }
    
}
