<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance extends CI_Model{
    public function viewAttendance($id){
        $query1=$this->db->query1('SELECT SUM(\'presence\') as presence '
                . 'FROM attendance '
                . 'WHERE student_id=\''.$id.'\'');
        $total_present= $query1->row()->presence;
        
        $query2 = $this->db->query('SELECT COUNT(\'presence\') as presence '
                . 'FROM attendance '
                . 'WHERE student_id=\''.$id.'\'');
        $total_classes= $query2->row()->presence;
        
        $percentage=$total_present/$total_classes*100;
        
        $query3=$this->db->query('SELECT semester, COUNT(\'presence\') as total '
                . 'FROM attendance '
                . 'JOIN teachers_enrollments ON attendance.enroll_id=teachers_enrollments.enroll_id '
                . 'JOIN subjects ON teachers_enrollments.subject_id=subjects.subject_id '
                . 'WHERE attendance.student_id=\''.$id.'\' '
                . 'GROUP BY semester '
                . 'ORDER BY semester DESC');
        
        $query4=$this->db->query('SELECT semester, SUM(\'presence\') as total '
                . 'FROM attendance '
                . 'JOIN teachers_enrollments ON attendance.enroll_id=teachers_enrollments.enroll_id '
                . 'JOIN subjects ON teachers_enrollments.subject_id=subjects.subject_id '
                . 'WHERE attendance.student_id=\''.$id.'\' '
                . 'GROUP BY semester '
                . 'ORDER BY semester DESC');
        
        $data['percentage']=$percentage;
        $data['semwise_total']=$query3->result();
        $data['semwise_present']=$query4->result();
        
        return $data;
    }
    
}