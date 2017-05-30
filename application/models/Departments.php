<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departments extends CI_Model{
    public function viewDepartment($id){
        $query=$this->db->query('SELECT d.stream, d.department_id,d.degree,se.class_roll,se.section '
                . 'FROM departments as d, students_enrollments as se '
                . 'WHERE d.department_id=se.department_id '
                . 'AND se.student_id=\''.$id.'\'');  
        return $query->result()->row();
    }
    public function listAllDepartments(){
        
    }
    public function listMyDepartments($user_id,$role){
        
    }
    public function getDeparmentInfo($id){
        
    }
}
