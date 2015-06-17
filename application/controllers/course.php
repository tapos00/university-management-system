<?php

class Course extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->model('semester_model');
        $this->load->model('department_model');
    }
    public function index(){
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['semesterList'] = $this->semester_model->getAllSemester();
        $data['courseList'] = $this->course_model->getallcourses();
        $this->load->view('courseEntry', $data);
    }
    public function insertCourse() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['semesterList'] = $this->semester_model->getAllSemester();
        $this->load->library('form_validation', $data);
        
        $this->form_validation->set_rules('code', 'Course Coad', 'required|callback_checkCourseCode');
        $this->form_validation->set_rules('credit', 'Course Credit', 'required');
        $this->form_validation->set_rules('courseName', 'Course Name', 'required|callback_checkCourseName');
        $this->form_validation->set_rules('courseDescription', 'Course Description', 'required');
        $this->form_validation->set_rules('department', 'Department Name', 'required');
        $this->form_validation->set_rules('semester', 'semester Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $data['courseList'] = $this->course_model->getallcourses();
            $this->load->view('courseEntry', $data);
        } else {
            $this->course_model->code = $this->input->post('code');
            $this->course_model->credit = $this->input->post('credit');
            $this->course_model->courseName = $this->input->post('courseName');
            $this->course_model->courseDescription = $this->input->post('courseDescription');
            $this->course_model->departmentID = $this->input->post('department');
            $this->course_model->semesterID = $this->input->post('semester');
            if($this->course_model->insertCourseModel()){
                $this->session->set_flashdata('insert', 'Course Insert Successfully');
            }else{
                $this->session->set_flashdata('insert', 'Course Insert not Successfully');
            }

           redirect('course', 'refresh');
        }
    }
    public function checkCourseCode($c_Code)
    {
        $this->course_model->code = $c_Code;
        
        if (!$this->course_model->hasCourseCode()) {
            return true;
        } else {
            $this->form_validation->set_message('checkCourseCode',
                'This Code already in our system');
            return false;
        }
    }
    public function checkCourseName($c_Name)
    {
        
        $this->course_model->courseName = $c_Name;
        if (!$this->course_model->hasCourseName()) {
            return true;
        } else {
            $this->form_validation->set_message('checkCourseName',
                'This course name already in our system');
            return false;
        }
    }
}
