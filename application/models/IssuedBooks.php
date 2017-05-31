<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IssuedBooks extends CI_Model{
    public function getIssuedBooks($user_id){
        $this->load->model('Students');
        $student_id=$this->Students->getStudent($user_id)->row()->student_id;
        $query=$this->db->query('SELECT ib.book_id, ib.issued_on, ib.return_date, ib.late_fine, ib.fine_paid, ib.status, b.name, b.authors '
                . 'FROM issued_books as ib, books as b '
                . 'WHERE ib.book_id=b.book_id_isbn '
                . 'AND ib.student_id=\''.$student_id.'\'');
        return $query->result();
    }
}