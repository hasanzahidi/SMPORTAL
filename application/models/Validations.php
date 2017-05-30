<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validations
 *
 * @author hasan
 */
class Validations extends CI_Model{
    public function insertEmailMobileCodes($validation_codes){
        $this->db->insert('validations', $validation_codes);
    }
    public function getEmailCode($email,$purpose){
        return $this->db->get_where('validations', array('user_id' => $email,'purpose' => $purpose))->row()->email_code;
    }
    public function getMobileCode($email,$purpose){
        return $this->db->get_where('validations', array('user_id' => $email,'purpose' => $purpose))->row()->mobile_code;
    }
    public function removeCode($email,$purpose){
        $this->db->delete('validations', array('user_id' => $email, 'purpose' => $purpose));
    }
    public function updateCode($data,$userid){
        $this->db->where('user_id', $userid);
        $this->db->update('validations', $data);
    }
}
