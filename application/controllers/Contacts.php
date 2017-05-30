<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller{
    public function index(){
        $this->load->view('contact-page');
    }
    public function sendMessage(){
        $this->load->model('Contact');
        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['subject']=$this->input->post('subject');
        $data['message']=$this->input->post('message');
        $this->ContactUs->saveMyMessage($data);
        $this->load->view('message_successful_page');
    }
}