<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clubs extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Clubs');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $all_clubs=$this->Clubs->listAllClubs();
        $this->load->view('club_lists',$all_clubs);
    }
    public function myClubs(){
        $my_clubs=$this->Clubs->listMyClubs($_SESSION['userid'],$_SESSION['role']);
        $this->load->view('club_lists',$my_clubs);
    }
    public function clubPages($id=0){
        if($id==0){
            redirect(base_url().'index.php/clubs');
        }
        else{
            $club_info=$this->Clubs->getClubInfo($id);
            $this->load->view('club_page',$club_info);
        }
    }
    public function listClubStudents($id=0){
        if($id==0){
            redirect(base_url().'index.php/clubs');
        }
        else{
            $club_students=$this->Clubs->getClubStudents($id);
            $this->load->view('club_page',$club_students);
        }
    }
}