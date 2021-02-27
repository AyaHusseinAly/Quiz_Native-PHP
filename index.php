<?php
require_once "autoload.php";
try {
    session_start();    
    $exam = new Exam();
    
    if(isset($_POST['option1'])){ $_SESSION['answers'][]="option1";}
    if(isset($_POST['option2'])){ $_SESSION['answers'][]="option2";}
    if(isset($_POST['option3'])){ $_SESSION['answers'][]="option3";}
    if(isset($_POST['option4'])){ $_SESSION['answers'][]="option4";}
    if(isset($_SESSION['answers'])){
        $exam->store_answer($_SESSION['answers']);
    }

    $current_page = $exam->getPage();
    if ($current_page == $exam->getQuestion_number()+1) {
        //$_SESSION['emaxObj']=$exam;
        include_once("views/End.php");
        exit();
    } 
    else if ($current_page == $exam->getQuestion_number()+2) {
        //$_SESSION['emaxObj']=$exam;
        include_once("views/results.php");
        exit();
    }else {

        $current_question = $exam->load_exam_page($current_page);
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