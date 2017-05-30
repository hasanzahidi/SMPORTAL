<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notices extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Notices');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index(){
        $all_notices=$this->Notices->listAllNotices();
        $this->load->view('notice_lists',$all_notices);
    }
    public function noticePage($id=0){
        if($id==0){
            redirect(base_url().'index.php/notices');
        }
        else{
            $notice_info=$this->Notices->getNoticeInfo($id);
            $this->load->view('notice_page',$notice_info);
        }
    }
    public function noticeForm(){
        if($_SESSION['role']=='student'){
            redirect(base_url().'index.php/notices');
        }
        $this->load->view('notice_form_page');
    }
    public function addNotice(){
        if($_SESSION['role']=='student'){
            redirect(base_url().'index.php/notices');
        }
        $data['notice_title']=$this->input->post('notice-title');
        $data['notice_content']=$this->input->post('notice-content');
        $this->Notice->insertNewNotice($data,$_SESSION['userid']);
        $this->load->view('notice_publish_successful');
    }
}