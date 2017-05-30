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
        
    }
    public function getTrainingInfo($user_id){
        
    }
    public function listAllCompletedTrainings($user_id){
        
    }
    public function listAllUpcomingTrainings($user_id){
        
    }
    public function registerStudent($data){
        
    }
}