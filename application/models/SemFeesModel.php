<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SemFeesModel extends CI_Model{
    public function listAllSemFees($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('select * from sem_fees where student_id=\''.$student_id.'\'');
        return $query->result();
    }
}