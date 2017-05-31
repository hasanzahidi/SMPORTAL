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
        $query=$this->db->query('select department_id, stream from departments');
        return $query->result();
    }
    public function listMyDepartments($user_id,$role){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        if($role==='teacher'){
            $query=$this->db->query('SELECT d.department_id, d.stream, te.teacher_id '
                . 'FROM departments as d '
                . 'LEFT JOIN subjects as s ON d.department_id = s.department_id '
                . 'LEFT JOIN teachers_enrollments as te ON s.subject_id = te.subject_id '
                . 'WHERE teacher_id=\''.$teacher_id.'\' '
                . 'GROUP BY d.department_id');
            return $query->result();
        }
        elseif($role==='student'){
            $query=$this->db->query('SELECT d.department_id, d.stream, se.student_id '
                . 'FROM departments as d '
                . 'LEFT JOIN students_enrollments as se ON d.department_id = se.department_id '
                . 'WHERE student_id=\''.$student_id.'\'');
            return $query->result();
        }
    }
    public function getDeparmentInfo($id){
        $query=$this->db->query('select * from departments where department_id=\''.$id.'\'');
        return $query->result();
    }
}
