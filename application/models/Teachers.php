<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teachers extends CI_Model{
    public function is_teacher($email)
    {
        if($this->db->get_where('teachers', array('user_id' => $email))->num_row!==0){
            return true;
        }
        return false;
    }
    public function getTeacher($email){
        return $this->db->get_where('teachers', array('user_id' => $email));
    }
    public function getEmailId($id){
        $this->db->select('user_id');
        $query = $this->db->get_where('teachers', array('student_id'=>$id));
        $row=$query->row();
        return $row()->user_id;
    }
    public function viewTeacher($id){
        $this->db->select('teacher_id, highest_degree, college, university, stream, batch, past_experience, knowledge, joined_on');
        $query = $this->db->get_where('teachers', array('student_id'=>$id));
        $row=$query->row();
        return $row;
    }
    public function getPrincipalId(){
        return 'JNDE';
    }
    public function teacherEnrollments($teacher_id){
        $query=$this->db->query('SELECT te.subject_id, s.subject_name '
                . 'FROM teachers_enrollments as te, subjects as s '
                . 'WHERE te.subject_id=s.subject_id '
                . 'AND te.teacher_id=\''.$teacher_id.'\'');
        return $query->result();
    }
    public function listAll(){
        $query=$this->db->query('SELECT u.first_name, u.last_name, u.dp_present, u.user_id, t.teacher_id '
                . 'FROM users as u, teachers as t '
                . 'WHERE u.user_id=t.user_id');
        return $query->result();
    }
    public function listBySubject($subject)
    {
        $query=$this->db->query('SELECT u.user_id, t.teacher_id, u.first_name, u.last_name, u.dp_present '
                . 'FROM teachers as t '
                . 'LEFT JOIN users as u ON t.user_id = u.user_id '
                . 'LEFT JOIN departments as d ON t.teacher_id = d.hod '
                . 'LEFT JOIN teachers_enrollments as te ON t.teacher_id = te.teacher_id '
                . 'LEFT JOIN subjects as s ON te.subject_id = s.subject_id '
                . 'WHERE s.subject_id=\''.$subject.'\'');
        return $query->result();
    }
    public function listByDepartment($department){
        $query=$this->db->query('SELECT u.user_id, t.teacher_id, u.first_name, u.last_name, u.dp_present '
                . 'FROM teachers as t '
                . 'LEFT JOIN users as u ON t.user_id = u.user_id '
                . 'LEFT JOIN departments as d ON t.teacher_id = d.hod '
                . 'LEFT JOIN teachers_enrollments as te ON t.teacher_id = te.teacher_id '
                . 'LEFT JOIN subjects as s ON te.subject_id = s.subject_id '
                . 'WHERE s.department_id=\''.$department.'\'');
        return $query->result();
    }
    public function listByDepartmentSubject($department,$subject){
        $query=$this->db->query('SELECT u.user_id, t.teacher_id, u.first_name, u.last_name, u.dp_present '
                . 'FROM teachers as t '
                . 'LEFT JOIN users as u ON t.user_id = u.user_id '
                . 'LEFT JOIN departments as d ON t.teacher_id = d.hod '
                . 'LEFT JOIN teachers_enrollments as te ON t.teacher_id = te.teacher_id '
                . 'LEFT JOIN subjects as s ON te.subject_id = s.subject_id '
                . 'WHERE s.department_id=\''.$department.'\' '
                . 'AND s.subject_id=\''.$subject.'\'');
        return $query->result();
    }
}