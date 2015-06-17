<?php

class Teacher extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('teacher_model');
        $this->load->model('designation_model');
        $this->load->model('department_model');
        
    }
    public function index(){
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['designationList'] = $this->designation_model->getAllDesignation();
        $data['teacherList'] = $this->teacher_model->getAllTeacher();
        $this->load->view('teacherEntry', $data);
    }
    public function insertTeacher() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['designationList'] = $this->designation_model->getAllDesignation();
        $this->load->library('form_validation', $data);
        
        $this->form_validation->set_rules('teacherName', 'Teacher Name', 'required');
        $this->form_validation->set_rules('teacherAddress', 'Teacher Address', 'required');
        $this->form_validation->set_rules('teacherEmail', 'Teacher Email', 'required|callback_checkTeacherEmail');
        $this->form_validation->set_rules('teacherContactNO', 'Teacher Contact NO', 'required');
        $this->form_validation->set_rules('teacherCredit', 'Teacher Credit', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            
            $data['teacherList'] = $this->teacher_model->getAllTeacher();
            $this->load->view('teacherEntry', $data);
        } else {
            $this->teacher_model->teacherName = $this->input->post('teacherName');
            $this->teacher_model->teacherAddress = $this->input->post('teacherAddress');
            $this->teacher_model->teacherEmail = $this->input->post('teacherEmail');
            $this->teacher_model->teacherContactNO = $this->input->post('teacherContactNO');
            $this->teacher_model->designationID = $this->input->post('designationID');
            $this->teacher_model->departmentID = $this->input->post('department');
            $this->teacher_model->teacherCredit = $this->input->post('teacherCredit');
            if($this->teacher_model->insertTeacherModel()){
                $this->session->set_flashdata('insert', 'Teacher Insert Successfully');
            }  else {
                $this->session->set_flashdata('insert', 'Teacher Insert not Successfully');
            }
           
            redirect('teacher', 'refresh');
        }
    }
    public function checkTeacherEmail($t_email){
        $this->teacher_model->teacherEmail = $t_email;        
        if (!$this->teacher_model->hasTeacherEmail()) {
            return true;
        } else {
            $this->form_validation->set_message('checkTeacherEmail',
                'This Teacher Email already in our system');
            return false;
        }
    }
    
}
