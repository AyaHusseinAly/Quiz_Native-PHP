<?php


class EssayQuestion implements Question_interface {
    private $question;
    private $options;
    
    public function __construct($question){
        $this->question = $question;
        $this->options = array();
    }
    
    
    
    function get_question() {
        return $this->question;
    }

    function get_options() {
        return $this->options;
    }
  
    
 


   
}
