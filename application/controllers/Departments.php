<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departments extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('DepartmentsModel');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $data['all_departments']=$this->DepartmentsModel->listAllDepartments();
        $this->load->view('department_lists',$data);
    }
    public function myDepartment(){
        $data['all_departments']=$this->DepartmentsModel->listMyDepartments($_SESSION['userid'],$_SESSION['role']);
        $this->load->view('department_lists',$data);
    }
    public function departmentPage($id=0){
        if($id===0){
            redirect(base_url().'index.php/departments');
        }
        else{
            $data['department_info']=$this->DepartmentsModel->getDepartmentInfo($id);
            $this->load->view('department_page',$data);
        }
    }
}