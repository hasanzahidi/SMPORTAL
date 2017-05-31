<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends CI_Model{
    public function listAllEvents(){
        $query=$this->db->query('select * from events');
        return $query->result();
    }
    public function getEventInfo($id){
        $query=$this->db->query('select * from events where event_id=\''.$id.'\'');
        return $query->result();
    }
}