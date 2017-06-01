<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TimetableModel extends CI_Model{
    public function listTimetable($user_id,$role){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $reg_year=$this->Students->getStudent($user_id)->row()->reg_year;
        $semester=$this->Students->getSem($reg_year);
        $department=$this->Departments->viewDepartment($student_id)->row()->department_id;
        if($role==='teacher'){
            $query=$this->db->query('SELECT tt.day,tt.start_time,s.subject_name, s.subject_id '
                . 'FROM timetable as tt, teachers_enrollments as te, subjects as s '
                . 'WHERE te.enroll_id=tt.enroll_id '
                . 'AND te.subject_id=s.subject_id '
                . 'AND te.teacher_id=\''.$teacher_id.'\'');
        return $query->result();
        }
        elseif($role==='student'){
            $query=$this->db->query('SELECT tt.day,tt.start_time,s.subject_name, s.subject_id '
                . 'FROM timetable as tt '
                . 'NATURAL JOIN teachers_enrollments as te '
                . 'NATURAL JOIN subjects as s '
                . 'WHERE semester=\''.$semester.'\' '
                . 'AND department_id=\''.$department.'\'');
            return $query->result();
        }
    }
}