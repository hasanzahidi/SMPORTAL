<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Attendance');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        if($_SESSION['role']==='teacher'){
            /*
            $this->load->model('Teachers');
            $subjects=$this->Teachers->getSubject($_SESSION['userid']);
            $this->load->view('attendance_subjects',$subjects);
             */
            redirect(base_url().'index.php');
        }
        elseif($_SESSION['role']==='student'){
            /*
            $this->load->model('Students');
            $subjects=$this->Students->getSubject($_SESSION['userid']);
            $attendance_record=$this->Attendance->getAttendanceRecord($subjects,$_SESSION['userid']);
            $this->load->view('attendance_subjects',$attendance_record);
             */
            $this->load->model('Students');
            $attendance_record=$this->Attendance->viewAttendance($this->Students->getStudent($_SESSION['user_id'])->row()->student_id);
            $this->load->view('attendance_subjects',$attendance_record);
        }
        
    }
    public function addAttendance($subject_id=0)
    {
        if($subject_id===0 || $_SESSION['role']==='student'){
            redirect(base_url().'index.php/attendance');
        }
        else {
            $this->load->model('Students');
            $students=$this->Students->listbySubject($subject_id);
            $this->load->view('attendance_form',$students);
        }
    }
    public function createAttendance(){
        if($_SESSION['role']==='student'){
            return -1;
        }
        $data['student_id']=$this->input->post('student-id');
        $data['enroll_id']=$this->input->post('enroll-id');
        $data['date']=$this->input->post('date');
        $data['slot']=$this->input->post('slot');
        $data['presence']=$this->input->post('presence');
        $this->Attendance->addAttendanceRecord($data);
        return 1;
    }
}