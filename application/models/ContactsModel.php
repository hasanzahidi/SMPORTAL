<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ContactsModel extends CI_Model{
    public function saveMyMessage($data){
        $this->db->insert('contacts', $data);
    }
}