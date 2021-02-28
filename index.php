<?php

require_once "autoload.php";
try {  
        
    $exam = new Exam();
    $current_page=$exam->getPage();
    $exam->store_answer();
      
        if ($current_page== $exam->getNumberOfQuestions()) {
            include_once("views/End.php");
            exit();
        } 
        else if ($current_page== $exam->getNumberOfQuestions()+1) {
        
            include_once("views/results.php");
            exit();
        }else {
            $questions=$exam->get_questions();
            $current_question = $questions[$current_page];
        }
  

} catch (Exception $ex) {
    if (mode === "production") {
        include("views/error.php");
        exit();
    } else {
        echo $ex->getMessage();
        echo $ex->getTraceAsString();
        exit();
    }
}
?>

<html>
    <?php include "views/header.php"; ?>
    <body >
        <?php include "views/questions.php";  ?>
        
    </body>
</html>