<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AssignmentsModel extends CI_Model {
    public function viewByTeacher($user_id){
        $this->load->model('Teachers');
        $teacher_id=$this->Teachers->getTeacher($user_id)->row()->teacher_id;
        $query=$this->db->query('SELECT a.assignment_id, a.issue_date, a.due_date, a.assignment_title, s.subject_name, s.subject_id '
                . 'FROM assignments as a '
                . 'INNER JOIN teachers_enrollments as te on te.enroll_id=a.enroll_id '
                . 'INNER JOIN subjects as s on te.subject_id=s.subject_id '
                . 'WHERE te.teacher_id=\''.$teacher_id.'\'');
        return $query->result();
    }
    public function viewByStudent($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $department=$this->db->query('SELECT department_id FROM students_enrollments WHERE student_id=\''.$student_id.'\'')->row()->department_id;
        $reg_year=$this->db->query('SELECT reg_year FROM students WHERE student_id\''.$student_id.'\'')->row()->reg_year;
        $semester=$this->Students->getSem($reg_year);
        $query=$this->db->query('SELECT a.assignment_id, a.issue_date, a.due_date, a.assignment_title, s.subject_name, s.subject_id '
                . 'FROM assignments as a '
                . 'NATURAL JOIN teachers_enrollments '
                . 'NATURAL JOIN subjects as s '
                . 'WHERE semester=\''.$semester.'\' '
                . 'AND department_id=\''.$department.'\'');
        return $query->result();
    }
    public function seeAssignmentPage($id,$user_id,$role){
        if($role==='student'){
            $assignments=$this->viewByStudent($user_id);
            if($this->findvalid($id,$assignments)){
                $data['assignment_info']=$this->getAssignmentInfo($id);
                $data['assignment_question']=$this->getAssignmentQuestions($id);
                $data['button']=$this->findStudentButton($id);
                return $data;
            }
            return -1;
        }
        elseif($role==='teacher'){
            $assignments=$this->viewByTeacher($user_id);
            if($this->findvalid($id,$assignments)){
                $data['assignment_info']=$this->getAssignmentInfo($id);
                $data['assignment_question']=$this->getAssignmentQuestions($id);
                $data['button']='See Submissions';
                return $data;
            }
            return -1;
        }
        return -1;
    }
    public function seeMySubmission($id,$user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $data['assignment_info']=$this->getAssignmentInfo($id);
        $query=$this->db->query('SELECT aq.question_id,aq.question,aq.diagrams,aq.marks,asb.answer,asb.file,asb.timestamp '
                . 'FROM assignment_submissions as asb '
                . 'NATURAL JOIN assignment_questions as aq'
                . 'WHERE student_id=\''.$student_id.'\' '
                . 'AND assignment_id=\''.$id.'\'');
        $data['assignment_answers']=$query->result();
        return $data;
    }
    public function insertAnswers($data){
        $this->db->insert('assignment_submissions', $data);
    }
    public function insertNewAssignment($data){
        $this->db->insert('assignments', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function insertQuestion($data){
        $this->db->insert('assignment_questions', $data);
    }
    public function seeRepliesList($id){
        $query=$this->db->query('SELECT student_id '
                . 'FROM students as s '
                . 'NATURAL JOIN assignment_submissions as asb '
                . 'NATURAL JOIN assignment_questions as aq '
                . 'WHERE aq.assignment_id=\''.$id.'\' ');
        return $query->result();
    }
    private function findvalid($id,$assignments){
        foreach($assignments as $assignment){
            if($id===$assignment->assignment_id){
                return TRUE;
            }
        }
        return FALSE;
    }
    public function getAssignmentInfo($id){
        $query=$this->db->query('SELECT a.assignment_id, a.issue_date, a.due_date, a.assignment_title, s.subject_name, s.subject_id '
                . 'FROM assignments as a '
                . 'NATURAL JOIN teachers_enrollments '
                . 'NATURAL JOIN subjects as a '
                . 'WHERE a.assignment_id=\''.$id.'\'');
        return $query->result();
    }
    public function getAssignmentQuestions($id){
        $query=$this->db->query('SELECT question_id,question,diagrams,marks '
                . 'FROM assignment_questions '
                . 'WHERE assignment_id=\''.$id.'\'');
        return $query->result();
    }
    public function findStudentButton($id,$user_id){
        $this->load->model('Students');
        $student_id=$this->Teachers->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT COUNT(*) as replies '
                . 'FROM assignment_submissions '
                . 'NATURAL JOIN assignment_questions '
                . 'WHERE student_id=\''.$student_id.'\' '
                . 'AND assignment_id=\''.$id.'\'');
        $c=$query->row()->replies;
        if($c===0){
            return 'SUMBIT REPLY';
        }
        else{
            return 'SEE SUBMISSION';
        }
    }
}