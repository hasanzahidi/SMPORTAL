<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subjects extends CI_Model{
    public function listAllSubjects(){
        $query=$this->db->query('select * from subjects');
        return $query->result();
    }
    public function listMySubjects($user_id,$role){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $reg_year=$this->Students->getStudent($user_id)->row()->reg_year;
        $semester=$this->Students->getSem($reg_year);
        $department=$this->Departments->viewDepartment($student_id)->row()->department_id;
        if($role==='teacher'){
            $query=$this->db->query('SELECT s.subject_id, s.subject_name, s.semester, s.department_id '
                . 'FROM subjects as s, teachers_enrollments as te '
                . 'WHERE te.enroll_id=tt.enroll_id '
                . 'AND te.subject_id=s.subject_id '
                . 'AND te.teacher_id=\''.$teacher_id.'\'');
        return $query->result();
        }
        elseif($role==='student'){
            $query=$this->db->query('SELECT s.subject_id, s.subject_name, s.semester, s.department_id  '
                . 'FROM subjects as s '
                . 'WHERE semester=\''.$semester.'\' '
                . 'AND department_id=\''.$department.'\'');
            return $query->result();
        }
    }
    public function getSubjectInfo($id){
        $query=$this->db->query('select * from subjects where subject_id=\''.$id.'\'');
        return $query->result();
    }
    public function listBySem($semester){
        $query=$this->db->query('select * from subjects where semester=\''.$semester.'\'');
        return $query->result();
    }
    public function listByDepartMent($department){
        $query=$this->db->query('select * from subjects where department_id=\''.$department.'\'');
        return $query->result();
    }
    public function listByDepartmentSem($department,$semester){
        $query=$this->db->query('select * from subjects where semester=\''.$semester.'\' and department_id=\''.$department.'\'');
        return $query->result();
    }
}