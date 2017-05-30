<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IssuedBooks extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('IssuedBooks');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        if($_SESSION['role']==='teacher'){
            redirect(base_url().'index.php');
        }
        else{
            $issued_books_to_you=$this->IssuedBooks->getIssuedBooks($_SESSION['userid']);
            $this->load->view('issued_books',$issued_books_to_you);
        }
    }
}