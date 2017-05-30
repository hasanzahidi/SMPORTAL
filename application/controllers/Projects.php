<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Projects');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $all_projects=$this->Project->listAllProjects($_SESSION['userid']);
        $this->load->view('project_lists',$all_projects);
    }
    public function projectForm(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $this->load->view('project_form_page');
    }
    public function addProject(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $data['project_title']=$this->input->post('project-title');
        $data['project_decription']=$this->input->post('project-description');
        $data['technologies']=$this->input->post('technologies');
        $data['start_date']=$this->input->post('start_date');
        $data['end_date']=$this->input->post('end_date');
        $data['mentor']=$this->input->post('mentor');
        $data['organization']=$this->input->post('organization');
        $data['link']=$this->input->post('link');
        $this->Projects->insertNewProject($data,$_SESSION['userid']);
        $this->load->view('project_publish_successful');
    }
}