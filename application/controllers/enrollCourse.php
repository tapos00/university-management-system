<?php

class EnrollCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->model('student_Model');
        $this->load->model('enroll_model');
    }

    public function index() {
        $data['studentList'] = $this->student_Model->getAllStudent();
        $data['courseList'] = $this->course_model->getAllCourse();
        $data['enrollList'] = $this->enroll_model->getAllEnrollCourer();


        $this->load->view('course_Enroll', $data);
    }

    public function insertCourseEnroll() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('studentID', 'Student Name', 'required');
        $this->form_validation->set_rules('courseID', 'course Id', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['studentList'] = $this->student_Model->getAllStudent();
            $data['courseList'] = $this->course_model->getAllCourse();

            $data['enrollList'] = $this->enroll_model->getAllEnrollCourer();
            $this->load->view('course_Enroll', $data);
        } else {
            $this->enroll_model->studentID = $this->input->post('studentID');
            $this->enroll_model->courseID = $this->input->post('courseID');
            if ($this->enroll_model->checkEnroll() == TRUE) {
                $this->enroll_model->insertEnrollCourse();
                $this->session->set_flashdata('reg', 'Course Enroll Successfully');
            } else {
                $this->session->set_flashdata('reg', 'Course already Enroll');
            }
            redirect('enrollCourse', 'refresh');
        }
    }

    public function getStudenInfo() {
        $this->enroll_model->studentID = $this->input->post('id');
        $msg = $this->enroll_model->getAStudentINFO();
        echo json_encode($msg);
    }

}
