<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Users
 *
 * @author hasan
 */
class Users extends CI_Model{
    public function getUser($userid) {
        return $this->db->get_where('users', array('user_id' => $userid));
    }
    public function removeUser($userid){
        $this->db->delete('users', array('user_id' => $userid));
    }
    public function registerUser($user){
        $this->db->insert('users', $user);
    }
    public function getEmailFromContact($contact){
        $query = $this->db->query("Select email from users where users.mobile='{$contact}'");
        $row = $query->row();
        return $row->email;
    }
    public function getContactFromEmail($email){
        $query = $this->db->query("Select mobile from users where users.user_id='{$email}'");
        $row = $query->row();
        return $row->mobile;
    }
    public function updateUser($data,$userid){
        $this->db->where('user_id', $userid);
        $this->db->update('users', $data);
    }
    public function viewUser($email){
        $this->db->select('first_name, last_name, user_id, contact, dob, gender, dp_present');
        $query = $this->db->get_where('users', array('user_id'=>$email));
        $row=$query->row();
        $data=array(
          'first_name'=>$row->first_name,
          'last_name'=>$row->last_name,
          'email'=>$row->user_id,
          'contact'=>$row->contact,
          'dob'=>$row->dob,
          'gender'=>$row->gender,
          'user_dp'=>$row->dp_present=='Y'?md5($_SESSION['userid']).'.jpg':'no-image.jpg'
        );
        return $data;
    }
}