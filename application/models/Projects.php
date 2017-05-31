<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projects extends CI_Model{
    public function viewProjects($id){
        $query=$this->db->query('SELECT p.project_title, p.project_description, p.start_date, p.end_date, p.organization, p.link '
                . 'FROM projects_done as p '
                . 'WHERE student_id=\''.$id.'\'');
        return $query->result();
    }
    public function listAllProjects($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('select * from projects_done where student_id=\''.$student_id.'\'');
        return $query->result();
    }
    public function insertNewProject($data,$user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $data['student_id']=$student_id;
        $this->db->insert('projects_done', $data);
    }
}