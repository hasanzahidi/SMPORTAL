<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clubs extends CI_Model{
    public function viewClubs($id){
        $query=$this->db->query('SELECT c.club_id, c.club_name, c.logo '
                . 'FROM clubs as c,club_enrollment as ce '
                . 'WHERE c.club_id=ce.club_id '
                . 'AND ce.student_id=\''.$id.'\'');
        return $query->result();
    }
    public function listAllClubs(){
        
    }
    public function listMyClubs($user_id,$role){
        
    }
    public function getClubInfo($id){
        
    }
    public function getClubStudents($id){
        
    }
}