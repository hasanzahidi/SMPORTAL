<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileViewer extends CI_Controller{
    public $profile_data;
    public function __construct() 
    {
        parent::__construct();
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        redirect(base_url().'index.php/profile');
    }
    public function studentsProfile($id=0){
        if($id===0){
            redirect(base_url().'index.php/profile');
        }
        else{
            $this->load->model('Students');
            $this->load->model('Users');
            $this->load->model('Addresses');
            $this->load->model('Attendance');
            $this->load->model('Clubs');
            $this->load->model('Departments');
            $this->load->model('Marksheet');
            $this->load->model('Projects');
            $this->load->model('Trainings');
            if($_SESSION['role']=='teacher'){
                $user=$this->Users->viewUser($this->Student->getEmailId($id));
                $student=$this->Students->viewByTeacher($id);
                $address=$this->Addresses->getAddresses($this->Student->getEmailId($id));
                $attendance=$this->Attendance->viewAttendance($id);
                $club=$this->Clubs->viewClubs($id);
                $department=$this->Departments->viewDepartment($id);
                $marks=$this->Marksheet->viewByTeacher($id);
                $projects=$this->Projects->viewProjects($id);
                $trainings=$this->Trainings->viewTrainings($id);
                $this->profile_data=array_merge($user,$student,$address,$attendance,$club,$department,$marks,$projects,$trainings);
            }
            elseif($_SESSION['role']=='student' && $this->Student->getEmailId($id)!==$_SESSION['userid']){
                $user=$this->Users->viewUser($this->Student->getEmailId($id));
                $student=$this->Students->viewByStudent($id);
                $club=$this->Clubs->viewClubs($id);
                $department=$this->Departments->viewDepartment($id);
                $projects=$this->Projects->viewProjects($id);
                $trainings=$this->Trainings->viewTrainings($id);
                $this->profile_data=array_merge($user,$student,$club,$department,$projects,$trainings);
            }
            else{
                redirect(base_url().'index.php/profile');
            }
            $this->load->view('profile_viewer_page',$this->profile_data);
        }
    }
    public function teachersProfile($id=0)
    {
        if($id===0){
            redirect(base_url().'index.php/profile');
        }
        else{
            $this->load->model('Teachers');
            $this->load->model('Users');
            if($this->Teacher->getEmailId($id)!==$_SESSION['userid']){
                $user=$this->Users->viewUser($this->Teachers->getEmailId($id));
                $teacher=$this->Teachers->viewTeacher($id);
                $this->profile_data=array_merge($user,$teacher);
            }
            else{
                redirect(base_url().'index.php/profile');
            }
            $this->load->view('profile_viewer_page',$this->profile_data);
        }
    }
    public function studentsList($department=0,$batch=0){
        $this->load->model('Students');
        if($department===0 && $batch===0){
            $all_students=$this->Students->listAll();
            $this->load->view('students_list_page',$all_students);
        }
        elseif($department===0 && $batch!==0){
            $batch_students=$this->Students->listByBatch($batch);
            $this->load->view('students_list_page',$batch_students);
        }
        elseif($department!==0 && $batch===0){
            $department_students=$this->Students->listByDepartment($department);
            $this->load->view('students_list_page',$department_students);
        }
        elseif($department!==0 && $batch!==0){
            $department_batch_students=$this->Students->listByDepartmentBatch($department,$batch);
            $this->load->view('students_list_page',$department_batch_students);
        }
    }
    public function teachersList($department=0,$subject=0){
        $this->load->model('Teachers');
        if($department===0 && $subject===0){
            $all_teachers=$this->Teachers->listAll();
            $this->load->view('teachers_list_page',$all_teachers);
        }
        elseif($department===0 && $subject!==0){
            $subject_teachers=$this->Teachers->listBySubject($subject);
            $this->load->view('teachers_list_page',$subject_teachers);
        }
        elseif($department!==0 && $subject===0){
            $department_teachers=$this->Teachers->listByDepartment($department);
            $this->load->view('teachers_list_page',$department_teachers);
        }
        elseif($department!==0 && $subject!==0){
            $department_subject_teachers=$this->Teachers->listByDepartmentSubject($department,$subject);
            $this->load->view('teachers_list_page',$department_subject_teachers);
        }
    }
    public function principal(){
        $this->load->model('Teachers');
        $principal_id=$this->Teachers->getPrincipalId();
        redirect(base_url().'index.php/profileviewer/teachersprofile/'.$principal_id);
    }
}