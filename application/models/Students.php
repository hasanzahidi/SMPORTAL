<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Students extends CI_Model{
    public function is_student($email)
    {
        if($this->db->get_where('students', array('user_id' => $email))->num_row!==0){
            return true;
        }
        return false;
    }
    public function getStudent($email){
        return $this->db->get_where('students', array('user_id' => $email));
    }
    public function viewByTeacher($id){
        $this->db->select('student_id, univ_roll, univ_reg, reg_year, batch, ten_school, ten_year, twelve_school, twelve_year, father_name, mother_name, father_contact, mother_contact');
        $query = $this->db->get_where('students', array('student_id'=>$id));
        $row=$query->row();
        $row->sem=$this->getSem($row->reg_year);
        return $row;
    }
    public function viewByStudent($id){
        $this->db->select('student_id, reg_year, batch, ten_school, ten_year, twelve_school, twelve_year');
        $query = $this->db->get_where('students', array('student_id'=>$id));
        $row=$query->row();
        $row->semester=$this->getSem($row->reg_year);
        return $row;
    }
    public function getEmailId($id){
        $this->db->select('user_id');
        $query = $this->db->get_where('students', array('student_id'=>$id));
        $row=$query->row();
        return $row()->user_id;
    }
    public function getSem($reg_year){
        $present_time=time();
        $registered_time=mktime(0, 0, 0, 7, 1, $reg_year);
        $year1 = date('Y', $present_time);
        $year2 = date('Y', $registered_time);

        $month1 = date('m', $present_time);
        $month2 = date('m', $registered_time);

        $diff = (($year1 - $year2) * 12) + ($month1 - $month2);
        $sem=(int)$diff/6+1;
        return $sem;
    }
    public function listAll(){
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.dp_present, u.user_id, s.student_id '
                . 'FROM users as u, students as s '
                . 'WHERE u.user_id=s.user_id');
        return $query->result();
    }
    public function listByBatch($batch) {
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.dp_present, u.user_id, s.student_id '
                . 'FROM users as u, students as s '
                . 'WHERE u.user_id=s.user_id '
                . 'AND s.batch=\''.$batch.'\'');
        return $query->result();
    }
    public function listByDepartment($department) {
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.dp_present, u.user_id, s.student_id '
                . 'FROM users as u, students as s, students_enrollments as se '
                . 'WHERE u.user_id=s.user_id '
                . 'AND s.student_id=se.student_id '
                . 'AND se.department_id=\''.$department.'\'');
        return $query->result();
    }
    public function listByDepartmentBatch($department,$batch) {
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.dp_present, u.user_id, s.student_id '
                . 'FROM users as u, students as s, students_enrollments as se '
                . 'WHERE u.user_id=s.user_id '
                . 'AND s.student_id=se.student_id '
                . 'AND s.department=\''.$department.'\' '
                . 'AND s.batch=\''.$batch.'\'');
        return $query->result();
    }
    
}