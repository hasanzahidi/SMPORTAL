<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Address
 *
 * @author hasan
 */
class Addresses extends CI_Model {
    //put your code here
    public function getAddresses($user_id)
    {
        return $this->db->get_where('addresses', array('user_id' => $user_id))->result();
    }
    public function addAddress($address)
    {
        $this->db->insert('addresses', $address);
    }
    public function removeAddress($address_id)
    {
        $this->db->delete('addresses', array('address_id' => $address_id));
    }
    public function setDefault($user_id,$address_id)
    {
        $d_address='';
        $rv=0;
        $query=$this->db->query('SELECT address_id FROM addresses WHERE user_id="'.$user_id.'" and is_default="Y"');
        if($query->num_rows()!=0)
        {
            $d_address=$query->row()->address_id;
            $data['is_default']='N';
            $this->db->where('address_id', $d_address);
            $this->db->update('addresses',$data);
            $rv=$d_address;
        }
        $data['is_default']='Y';
        $this->db->where('address_id', $address_id);
        $this->db->update('addresses', $data);
        return $rv;
    }
}
