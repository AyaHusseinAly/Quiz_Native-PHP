
<html>    
    <?php include "views/header.php"; ?>
    <body>
        <div class="container mt-sm-5 my-1 " style="width:30%">
            <div class="d-flex flex-column">
                <div class="question pt-2">  
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <h2> Exam End! you got <?php echo $exam->mark_exam();   ?>/ <?php echo $exam->getNumberOfQuestions();   ?> Marks</h2>
                    </div>
                </div>
                
                <div class="d-flex flex-row pt-3">
                    <div > <a href='<?php echo $exam->move_previous();   ?>'  class="btn btn-primary">Back</a></div>
                    <div class="ml-auto"> <a href='<?php echo $exam->move_next();   ?>' class="btn btn-success">Submit and View Results</a> </div>

                </div>
                </div>    
        </div>    

    </body    
    
</html>

<?php
session_unset();
session_destroy();
?>

