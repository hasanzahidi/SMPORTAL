<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Timetable extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('TimetableModel');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        //$all_timetable=$this->TimetableModel->listTimetable($_SESSION['userid'],$_SESSION['role']);
        $this->load->view('timetable_page');
    }
}