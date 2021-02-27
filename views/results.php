

<link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link rel="stylesheet" href="resources/main.css">
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<html>    
    <body>
        <div class="container mt-sm-5 my-1 " style="width:30%">
            <div class="d-flex flex-column">
                <div class="question pt-2">  
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <h2>you got <span> <?php echo  $exam->mark_exam();   ?>/ <?php echo  $exam->getNumberOfQuestions();   ?></span> Marks</h2>
                    </div>
                </div>

                </div>    
        </div>    

    </body       
</html>

<?php
session_unset();
session_destroy();
?>

