<?php

class Assing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('department_model');
        $this->load->model('teacher_model');
        $this->load->model('course_model');
        $this->load->model('assing_Model');
    }

    public function index() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['teacherList'] = $this->assing_Model->getADepartmentAllTeacher();
        $data['courseList'] = $this->course_model->getAllCourse();
        $data['assignList'] = $this->assing_Model->getAllAssignModel();
        $this->load->view('course_Assing_Teacher', $data);
    }

    public function insertAssing() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $data['teacherList'] = $this->assing_Model->getADepartmentAllTeacher();
        $data['courseList'] = $this->course_model->getAllCourse();
        $this->load->library('form_validation', $data);

        $this->form_validation->set_rules('department', 'a deparemtn', 'required');
        $this->form_validation->set_rules('teacherID', 'a teacher', 'required');
        $this->form_validation->set_rules('courseID', 'a course', 'required|callback_checkAassignCoures');

        if ($this->form_validation->run() == FALSE) {
            $data['assignList'] = $this->assing_Model->getAllAssignModel();
            $this->load->view('course_Assing_Teacher', $data);
        } else {
            $remainCredit = $this->input->post('remainingCredit');
            $courseCredit = $this->input->post('courseCredit');
            if($courseCredit>$remainCredit){
                
                $this->assing_Model->teacherID = $this->input->post('teacherID');
                $teacheCredit = $courseCredit - $remainCredit;
                $this->assing_Model->updateTeacher($teacheCredit);
                
            }
            $this->assing_Model->departmentID = $this->input->post('department');
            $this->assing_Model->teacherID = $this->input->post('teacherID');
            $this->assing_Model->courseID = $this->input->post('courseID');
            $this->assing_Model->insertAssignModel();
            echo 'course Assign insert successfully';
            $this->load->view('course_Assing_Teacher', $data);
            redirect('assing', 'refresh');
        }
    }

    public function checkAassignCoures($course_ID) {
        $this->assing_Model->courseID = $course_ID;

        if (!$this->assing_Model->getAAssignCoutse()) {
            return true;
        } else {
            $this->form_validation->set_message('checkAassignCoures', 'This course already assigned');
            return false;
        }
    }

    public function getALLAssign() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        //$data['teacherList'] = $this->assing_Model->getADepartmentAllTeacher();
        //$data['courseList'] = $this->assing_Model->getADepartmentAllTeacher();
        $data['assignList'] = $this->assing_Model->getAllAssignModel();
        $this->load->view('course_Assing_Teacher', $data);
    }

    public function getTeacherInfo() {
        $this->teacher_model->teacherID = $this->input->post('id');
        if ($this->teacher_model->checkTeacherHasCourse()) {
            $info = $this->teacher_model->teacherCourseValue();
            if ($info['rcredit'] == '') {
                $info['rcredit'] = $info['credit'];
            }
        }else{
            $info = $this->teacher_model->getTeacherC();
            $info['rcredit'] = $info['credit'];
        }

        //  $result = array("credit"=>$info->credit,"rcredit"=>$info->rcredit);
        echo json_encode($info);
    }

    public function getCourseCredit() {
        $this->course_model->courseID = $this->input->post('id');
        $courseCreadit = $this->course_model->getCourseCreditInfo();
        echo json_encode($courseCreadit);
    }

    public function getTecherOFDepartment() {
        $this->assing_Model->departmentID = $this->input->post('id');
        $msg = $this->assing_Model->getADepartmentAllTeacher();
        echo json_encode($msg);
    }

}
