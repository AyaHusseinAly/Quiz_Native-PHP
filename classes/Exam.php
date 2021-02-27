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
    private $page;
    private $questions;
    private $user_answers;
    private $question_number;
  
    
    
    public function __construct() {
        $this->url = Helper::get_current_Page_URL();
        $this->page = ($this->get_current_page_index() > 0) ? (int) $this->get_current_page_index() : 1;
        $this->questions = $this->get_questions();
    }
    function getQuestion_number() {
        return count($this->questions);
    }

    function getNumberOfQuestions() {
        return count($this->questions);
    }
        
    function getPage() {
        return $this->page;
    }

    public function load_exam_page($page) {
        if (isset($this->questions[$page - 1])) {
            return $this->questions[$page - 1];
        } else {

            throw new Exception("Question doesn't exist");
        }
    }

    public function move_previous() {
        $current_url = explode("?", $this->url)[0];
        $previous_page = (int) $this->page - 1;
        $previous_page = ($previous_page > 0) ? $previous_page : 1;
        return $current_url . "?" . "page=$previous_page";
    }

    public function move_next() {
        $current_url = explode("?", $this->url)[0];
        $next_page = (int) $this->page + 1;

        return $current_url . "?" . "page=$next_page";
    }

    public function store_answer($ans){
        $this->user_answers=$ans;
        /*
        echo "<pre style='color:white'>";
        print_r($this->user_answers);
        echo "<pre>";
        */
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

    private function get_current_page_index() {

        if(strpos($this->url,"?")!==false){
            $url_parts = explode("?", $this->url);
            $query_string = $url_parts[1];

            if (!empty($query_string) || !strstr("page", $query_string)) {

                $query_string_array = explode("=", $query_string);

                return (int) $query_string_array[1];
            } else
                return 1;
        }else
            return 1;

    }

    private function get_questions() {
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
