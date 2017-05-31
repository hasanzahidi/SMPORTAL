<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trainings extends CI_Model{
    public function viewTrainings($id){
        $query=$this->db->query('SELECT t.training_id, t.training_name, t.description, t.organized_by '
                . 'FROM trainings as t, training_enrollment as te '
                . 'WHERE t.training_id=te.training_id and te.student_id=\''.$id.'\'');
        return $query->result();
    }
    public function listAllTrainings(){
        $query=$this->db->query('SELECT * FROM trainings');
        return $query->result();
    }
    public function getTrainingInfo($id, $user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT * FROM trainings WHERE training_id=\''.$id.'\'');
        $data['button']=$this->findEnrollmentStatus($id,$student_id);
        $data['training']=$query->result();
        return $data;
    }
    public function listAllCompletedTrainings($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT t.training_id, t.training_name, t.organized_by '
                . 'FROM trainings as t, training_enrollment as te '
                . 'WHERE te.training_id=t.training_id '
                . 'AND te.student_id=\''.$student_id.'\' '
                . 'AND te.status=\'completed\'');
        return $query->result();
    }
    public function listAllUpcomingTrainings($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT t.training_id, t.training_name, t.organized_by '
                . 'FROM trainings as t, training_enrollment as te '
                . 'WHERE te.training_id=t.training_id '
                . 'AND te.student_id=\''.$student_id.'\' '
                . 'AND te.status=\'registered\'');
        return $query->result();
    }
    public function registerStudent($data){
        $this->db->insert('training_enrollment', $data);
        return 1;
    }
    private function findEnrollmentStatus($id,$student_id){
        $check=$this->db->query('SELECT COUNT(*) as register FROM training_enrollment WHERE training_id=\''.$id.'\' AND student_id=\''.$student_id.'\'')->row()->register;
        if($check===0){
            return "REGISTER NOW";
        }
        else{
            return "REGISTERED";
        }
    }
}