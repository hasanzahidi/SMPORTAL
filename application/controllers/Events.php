<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Events');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $all_events=$this->Events->listAllEvents();
        $this->load->view('event_lists',$all_events);
    }
    public function eventPage($id=0){
        if($id==0){
            redirect(base_url().'index.php/events');
        }
        else{
            $event_info=$this->Events->getEventInfo($id);
            $this->load->view('event_page',$event_info);
        }
    }
}