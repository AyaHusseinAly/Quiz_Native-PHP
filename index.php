<?php

require_once "autoload.php";
try {  
    /*session_start();
    session_unset();
    session_destroy();   */ 
    session_start();
        
    $exam = new Exam();
    
    if(isset($_POST['option1'])){$_SESSION['answers'][]="option1";}
    if(isset($_POST['option2'])){$_SESSION['answers'][]="option2";}
    if(isset($_POST['option3'])){$_SESSION['answers'][]="option3";}
    if(isset($_POST['option4'])){$_SESSION['answers'][]="option4";}

    if(isset($_SESSION['answers'])){
        $exam->store_answer($_SESSION['answers']);
    }
    if(!array_key_exists('page', $_SESSION)){
        echo "not defined";
        $_SESSION['page']=0;
    }
    else{
        if (isset($_GET['inc'])==true) { 
            $_SESSION['page']++;
        }

        if (isset($_GET['dec'])==true) { 
            $_SESSION['page']--;
        }
    }
      
        if ($_SESSION['page'] == $exam->getNumberOfQuestions()) {
        
            include_once("views/End.php");
            exit();
        } 
        else if ($_SESSION['page']== $exam->getNumberOfQuestions()+1) {
        
            include_once("views/results.php");
            exit();
        }else {
            /*
            echo "<pre style='color:green'>";
            print_r($exam->get_questions());
            echo "<pre>";
            */
            $questions=$exam->get_questions();
            $current_question = $questions[$_SESSION['page']];

            //$current_question = $exam->load_exam_page($_SESSION['page']);
        }
        echo "<pre style='color:green'>";
        print_r($_SESSION);
        echo "<pre>";

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