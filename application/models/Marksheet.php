<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marksheet extends CI_Model{
    public function viewByTeacher($id) {
        $query=$this->db->query('SELECT sum(m.marks_obtained) as Obtained_Marks, sum(e.full_marks) as Full_Marks, s.semester '
                . 'FROM examinations as e '
                . 'LEFT JOIN subjects as s ON e.subject_id = s.subject_id '
                . 'LEFT JOIN marksheet as m ON e.exam_id = m.exam_id '
                . 'WHERE student_id=\''.$id.'\''
                . 'GROUP BY semester');
        return $query->result();
    }
    public function listAllMarks($user_id){
        
    }
    public function semMarks($user_id){
        
    }
}