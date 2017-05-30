<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assignments extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Assignments');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        if($_SESSION['role']=='teacher'){
            $all_assignments=$this->Assignments->viewByTeacher($_SESSION['userid']);
            $this->load->view('all_assignments',$all_assignments);
        }
        elseif($_SESSION['role']=='student'){
            $all_assignments=$this->Assignments->viewByStudent($_SESSION['userid']);
            $this->load->view('all_assignments',$all_assignments);
        }
    }
    public function assignmentPage($id=0)
    {
        if($id===0){
            redirect(base_url().'index.php/assignments');
        }
        else{
            $assignment=$this->Assignments->seeAssignmentPage($id,$_SESSION['userid'],$_SESSION['role']);
            if($assignment==-1){
                redirect(base_url().'index.php/assignments');
            }
            $this->load->view('assignment_page',$assignment);
        }
    }
    public function seeYourSubmission($id=0)
    {
        if($id===0 || $_SESSION['role']=='teacher'){
            redirect(base_url().'index.php/assignments');
        }
        else{
            $submission=$this->Assignments->seeMySubmission($id,$_SESSION['userid']);
            $this->load->view('see_your_submission',$submission);
        }
    }
    public function submitform($id=0){
        if($id===0 || $_SESSION['role']=='teacher'){
            redirect(base_url().'index.php/assignments');
        }
        else{
            $questions=$this->Assignments->seeAssignmentPage($id,$_SESSION['userid'],'student');
            $this->load->view('submit_form',$questions);
        }
    }
    public function assignmentReplies(){
        if($_SESSION['role']=='teacher'){
            return -1;
        }
        $this->load->model('Students');
        $qid=$this->input->post('qid');
        $answer=$this->input->post('answer');
        $file=$this->input->post('file');
        $answer_data=array(
            'qid'=>$qid,
            'student_id'=>$this->Students->getStudent($_SESSION['user_id'])->row()->student_id,
            'answer'=>$answer,
            'file'=>$file
        );
        $this->Assignments->insertAnswers($answer_data);
        return 1;
    }
    public function NewAssignmentForm(){
        $this->load->model('Teachers');
        if($_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $data['enrolled']=$this->Teachers->teacherEnrollments($this->Teachers->getTeacher($_SESSION['user_id'])->row()->teacher_id);
        $this->load->view('new_assignment_form',$data);
    }
    public function createNewAssignment(){
        if($_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $assignment_data=array(
            'enroll_id'=>$this->input->post('enroll-id'),
            'due_date'=>$this->input->post('due-date'),
            'assignment_title'=>$this->input->post('assignment-title'),
            'note'=>$this->input->post('note'), 
        );
        $data['id']=$this->Assignments->insertNewAssignment($assignment_data);
        $this->load->view('add_question',$data);
    }
    public function addNewQuestion(){
        if($_SESSION['role']=='students'){
            return -1;
        }
        $question_data=array(
            'assignment_id'=>$this->input->post('assignment-id'),
            'question'=>$this->input->post('question'),
            'diagram'=>$this->input->post('diagram'),
            'marks'=>$this->input->post('marks'),
        );
        $this->Assignments->insertQuestion($question_data);
        return 1;
    }
    public function seeRepliesList($id=0){
        if($id===0 || $_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $reply_list=$this->Assignments->listReplies($id);
        $this->load->view('assignment_replies_list',$reply_list);
    }
    public function seeStudentsSubmission($id=0,$student_id=0){
        if($student_id===0 || $_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $submission=$this->Assignments->seeMySubmission($id,$student_id);
        $this->load->view('see_students_submission',$submission);
    }
}