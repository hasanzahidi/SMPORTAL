<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marksheet extends CI_Model{
    public function viewByTeacher($id) {
        $query=$this->db->query('SELECT sum(m.marks_obtained) as Obtained_Marks, sum(e.full_marks) as Full_Marks, s.semester '
                . 'FROM examinations as e '
                . 'LEFT JOIN subjects as s ON e.subject_id = s.subject_id '
                . 'LEFT JOIN marksheet as m ON e.exam_id = m.exam_id '
                . 'WHERE student_id=\''.$id.'\' '
                . 'GROUP BY semester');
        return $query->result();
    }
    public function listAllMarks($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT e.exam_name, e.subject_id, e.full_marks,e.pass_marks, m.marks_obtained '
                . 'FROM marksheet as m '
                . 'LEFT JOIN  examinations as e ON m.exam_id=e.exam_id '
                . 'WHERE m.student_id=\''.$student_id.'\'');
        return $query->result();
    }
    public function getMySemMarks($user_id,$sem){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT e.exam_name, e.subject_id, e.full_marks,e.pass_marks, m.marks_obtained '
                . 'FROM marksheet as m '
                . 'LEFT JOIN examinations as e ON m.exam_id=e.exam_id '
                . 'LEFT JOIN subjects as s on e.subject_id=s.subject_id '
                . 'WHERE m.student_id=\''.$student_id.'\' '
                . 'AND s.semester=\''.$sem.'\'');
        return $query->result();
    }
}