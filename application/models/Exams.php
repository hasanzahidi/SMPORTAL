<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exams extends CI_Model{
    public function getMyExams($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $reg_year=$this->Students->getStudent($user_id)->row()->reg_year;
        $semester=$this->Students->getSem($reg_year);
        $department=$this->Departments->viewDepartment($student_id)->row()->department_id;
        $query=$this->db->query('e.exam_id, e.exam_name, e.subject_id, e.time, e.duration, e.full_marks, e.pass_marks, e.syllabus, s.subject_name '
                . 'FROM examinations as e, subjects as s '
                . 'WHERE e.subject_id=s.subject_id '
                . 'AND s.semester=\''.$semester.'\' '
                . 'AND s.department_id=\''.$department.'\'');
            return $query->result();
    }
    
}