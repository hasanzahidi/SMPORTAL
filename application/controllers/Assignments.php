<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assignments extends CI_Controller{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('AssignmentsModel');
        if(!isset($_SESSION['userid'])){
            redirect(base_url().'index.php/login');
        }
    }
    public function index()
    {
        if($_SESSION['role']=='teacher'){
            $data['all_assignments']=$this->AssignmentsModel->viewByTeacher($_SESSION['userid']);
            $this->load->view('all_assignments',$data);
        }
        elseif($_SESSION['role']=='student'){
            $data['all_assignments']=$this->AssignmentsModel->viewByStudent($_SESSION['userid']);
            $this->load->view('all_assignments',$data);
        }
    }
    public function assignmentPage($id=0)
    {
        if($id===0){
            redirect(base_url().'index.php/assignments');
        }
        else{
            $assignment=$this->AssignmentsModel->seeAssignmentPage($id,$_SESSION['userid'],$_SESSION['role']);
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
            $submission=$this->AssignmentsModel->seeMySubmission($id,$_SESSION['userid']);
            $this->load->view('see_your_submission',$submission);
        }
    }
    public function submitform($id=0){
        if($id===0 || $_SESSION['role']=='teacher'){
            redirect(base_url().'index.php/assignments');
        }
        else{
            $questions=$this->AssignmentsModel->seeAssignmentPage($id,$_SESSION['userid'],'student');
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
        $file='';
        $answer_data=array(
            'question_id'=>$qid,
            'student_id'=>$this->Students->getStudent($_SESSION['userid'])->row()->student_id,
            'answer'=>$answer,
            'file'=>$file
        );
        $this->AssignmentsModel->insertAnswers($answer_data);
        echo 1;
    }
    public function NewAssignmentForm(){
        $this->load->model('Teachers');
        if($_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $data['enrolled']=$this->Teachers->teacherEnrollments($this->Teachers->getTeacher($_SESSION['userid'])->row()->teacher_id);
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
            'notes'=>$this->input->post('note'), 
        );
        $data['id']=$this->AssignmentsModel->insertNewAssignment($assignment_data);
        $this->load->view('add_question',$data);
    }
    public function addNewQuestion(){
        if($_SESSION['role']=='students'){
            return -1;
        }
        $question_data=array(
            'assignment_id'=>$this->input->post('assignment-id'),
            'question'=>$this->input->post('question'),
            'diagrams'=>$this->input->post('diagrams'),
            'marks'=>$this->input->post('marks'),
        );
        $this->AssignmentsModel->insertQuestion($question_data);
        echo 1;
    }
    public function seeRepliesList($id=0){
        if($id===0 || $_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $data['reply_list']=$this->AssignmentsModel->listReplies($id);
        $data['id']=$id;
        $this->load->view('assignment_replies_list',$data);
    }
    public function seeStudentsSubmission($id=0,$student_id=0){
        if($student_id===0 || $_SESSION['role']=='students'){
            redirect(base_url().'index.php/assignments');
        }
        $submission=$this->AssignmentsModel->seeMySubmissionTeacher($id,$student_id);
        $this->load->view('see_your_submission',$submission);
    }
}