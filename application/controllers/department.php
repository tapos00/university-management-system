<?php

class Department extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('department_model');
    }

    public function index() {
        $data['departmentList'] = $this->department_model->getAllDepartment();
        $this->load->view('departmentEntry', $data);
    }

    public function insert() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('departmentCode', 'Department Coad', 'required|min_length[2]|callback_departmentCode_check');
        $this->form_validation->set_rules('departmentName', 'Department Name', 'required|callback_departmentName_check');

        if ($this->form_validation->run() == FALSE) {
            
            $data['departmentList'] = $this->department_model->getAllDepartment();
            $this->load->view('departmentEntry', $data);
        } else {
            $this->department_model->departmentCode = $this->input->post('departmentCode');
            $this->department_model->departmentName = $this->input->post('departmentName');
            if($this->department_model->insertDepartmentModel()){
                $this->session->set_flashdata('insert', 'Department Insert Successfully');
            }else{
               $this->session->set_flashdata('insert', 'Department Insert not Successfully');

            }
            redirect('/department','refresh');
                
            
        }
    }
    public function departmentCode_check($d_Code)
    {
        $this->department_model->departmentCode = $d_Code;
        
        if (!$this->department_model->hasDepartment()) {
            return true;
        } else {
            $this->form_validation->set_message('departmentCode_check',
                'This Code already in our  system');
            return false;
        }
    }
    public function departmentName_check($d_Name)
    {
        
        $this->department_model->departmentName = $d_Name;
        if (!$this->department_model->hasDepartment1()) {
            return true;
        } else {
            $this->form_validation->set_message('departmentName_check',
                'This department name already in our system');
            return false;
        }
    }

}
