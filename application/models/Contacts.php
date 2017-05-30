<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacts extends CI_Model{
    public function saveMyMessage($data){
        $this->db->insert('contacts', $data);
    }
}