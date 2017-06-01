<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClubsModel extends CI_Model{
    public function viewClubs($id){
        $query=$this->db->query('SELECT c.club_id, c.club_name, c.logo '
                . 'FROM clubs as c,club_enrollment as ce '
                . 'WHERE c.club_id=ce.club_id '
                . 'AND ce.student_id=\''.$id.'\'');
        return $query->result();
    }
    public function listAllClubs(){
        $query=$this->db->query('select * from clubs');
        return $query->result();
    }
    public function listMyClubs($user_id,$role){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        if($role==='teacher'){
            $query=$this->db->query('SELECT c.club_id, c.club_name, c.logo, c.club_description, c.club_link, c.purpose, c.poc '
                . 'FROM clubs as c '
                . 'LEFT JOIN club_enrollment as ce ON c.club_id = ce.club_id '
                . 'WHERE tfc=\''.$teacher_id.'\'');
            return $query->result();
        }
        elseif($role==='student'){
            $query=$this->db->query('SELECT c.club_id, c.club_name, c.logo, c.club_description, c.club_link, c.purpose, c.poc, c.tfc, ce.club_id, ce.student_id '
                . 'FROM clubs as c '
                . 'LEFT JOIN club_enrollment as ce ON c.club_id = ce.club_id '
                . 'WHERE student_id=\''.$student_id.'\'');
            return $query->result();
        }
    }
    public function getClubInfo($id){
        $query=$this->db->query('select * from clubs where club_id=\''.$id.'\'');
        return $query->result();
    }
    public function getClubStudents($id){
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.user_id, u.dp_present, s.student_id '
                . 'FROM users as u '
                . 'LEFT JOIN students as s ON u.user_id = s.user_id '
                . 'LEFT JOIN club_enrollment as ce ON s.student_id = ce.student_id '
                . 'WHERE ce.club_id=\''.$id.'\'');
            return $query->result();
    }
}