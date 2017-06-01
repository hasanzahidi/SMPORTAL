<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NoticesModel extends CI_Model{
    public function listAllNotices(){
        $query=$this->db->query('select * from notices');
        return $query->result();
    }
    public function getNoticeInfo($id){
        $query=$this->db->query('select * from notices where notice_id=\''.$id.'\'');
        return $query->result();
    }
    public function insertNewNotice($data,$user_id){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $data['teacher_id']=$teacher_id;
        $this->db->insert('notices', $data);
    }
}