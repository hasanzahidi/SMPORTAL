<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SemFees extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Semfees');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        if($_SESSION['role']=='teacher'){
            redirect(base_url().'index.php');
        }
        $all_sem_fees=$this->Semfees->listAllSemFees($_SESSION['userid']);
        $this->load->view('sem_fee_list',$all_sem_fees);
    }
}