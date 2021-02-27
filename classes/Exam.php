<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exam
 *
 * @author memad
 */
class Exam implements Exam_interface {

    private $url;
   // private $page;
    private $questions;
    private $user_answers;
    private $question_number;
  
    
    
    public function __construct() {
        $this->url = Helper::get_current_Page_URL();
        $this->questions = $this->get_questions();
    }

    function getNumberOfQuestions() {
        return count($this->questions);
    }
     
    function getPage() {
        return $this->page;
    }

    public function load_exam_page($page) {
        if (isset($this->questions[$page])) {
            return $this->questions[$page];
        } else {

            throw new Exception("Question doesn't exist ");
        }
    }

    public function move_previous() {
       //$_SESSION['page']--; //Not working here :)
       if(strpos($this->url,"?")!==false){
            $url_parts = explode("?", $this->url);
            return ($url_parts[0])."?dec=true";
       }
       else{
            return ($this->url)."?dec=true";
       }

    }

    public function move_next() {
        //$_SESSION['page']++; //Not working here :)
       if(strpos($this->url,"?")!==false){
            $url_parts = explode("?", $this->url);
            return ($url_parts[0])."?inc=true";
       }
       else{
            return ($this->url)."?inc=true";
       }
        

    }

    public function store_answer($ans){
        $this->user_answers=$ans;
    }
    
    public function mark_exam(){
        $mark=0;
        $i=0;
        foreach($this->questions as $q){
            /*
            var_dump($q->get_answer());
            var_dump($this->user_answers[$i]);
            */
            if(($q->get_answer())==($this->user_answers[$i])){
                $mark++;    
            }
            $i++;
        }
        return $mark;
    }

    public function get_questions() {
        $lines = file(exam_file);
        $questions = array();
        foreach ($lines as $line) {

            if (substr($line, 0, 1) === "Q") {
                if (isset($new_mcquestion)) {
                    $questions[] = $new_mcquestion;
                }
                $new_mcquestion = new MCQuestion($line);
            } elseif (substr($line, 0, 2) === "*Q") {
                $new_tofquestion = new TrueOrFalseQuestion(str_replace("*", "", $line));
                $questions[] = $new_tofquestion;
            } elseif (substr($line, 0, 1) === "#") {
                $new_essayquestion = new EssayQuestion(str_replace("#", "", $line));
                $questions[] = $new_essayquestion;
            } elseif (substr($line, 0, 3) === "Ans") {
                //$Answer = str_replace("Ans: ", "", $line);
                //$new_mcquestion->Add_Answer($Answer);
                $new_mcquestion->Add_Answer(substr($line, 5, 7));
            } elseif (substr($line, 0, 4) === "*Ans") {
                //$Answer = str_replace("*Ans: ", "", $line);
                //$new_tofquestion->Add_Answer($Answer);
                $new_tofquestion->Add_Answer(substr($line, 6, 7));             
            } else {
                $new_mcquestion->Add_an_Option($line);
            }
        }
        return $questions;
    }

}
