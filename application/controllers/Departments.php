<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departments extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Departments');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $all_departments=$this->Departments->listAllDepartments();
        $this->load->view('department_lists',$all_departments);
    }
    public function myDepartment(){
        $my_departments=$this->Departments->listMyDepartments($_SESSION['userid'],$_SESSION['role']);
        $this->load->view('department_lists',$my_departments);
    }
    public function departmentPage($id=0){
        if($id==0){
            redirect(base_url().'index.php/departments');
        }
        else{
            $department_info=$this->Departments->getDepartmentInfo($id);
            $this->load->view('department_page',$department_info);
        }
    }
}