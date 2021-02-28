
<link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="resources/main.css">
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<html>    
    <body>
        <div class="container mt-sm-5 my-1 ">
            <div class="d-flex flex-column">
                <div class=" pt-2  ">  
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <h2>you got <span> <?php echo  $exam->mark_exam();   ?>/ <?php echo  $exam->getNumberOfQuestions();   ?></span> Marks</h2>
                    </div>
                   <?php  
                   $c=0;
                   foreach($questions as $current_question) { ?>
                    <div class="container mt-sm-5 my-2 " style="background-color:#333;">
                        <div class="py-2 h5">
                        <?php if((($exam->getUserAnswers())['Q'.($c+1)])==($current_question->get_answer())){?>
                            <i class="fas fa-check-circle" style="color:#21bf73"></i>
                        <?php }else{ ?>
                            <i class="fas fa-times-circle" style="color:#E14D43"></i>
                        <?php } ?> 
                        <b><?php echo $current_question->get_question();   ?> ?</b>
                        </div>
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <?php 
                            if(!empty($current_question->get_options())){
                            $i=0;    
                            foreach($current_question->get_options() as $option) {
                                $i++;?>
                            <label class="options"><?php echo $option;   ?> <input type="radio" value="option<?php echo $i;?>" name="Q"> <span class="checkmark"></span> </label>
                            <?php } } ?>   
                        </div>
                    <div>    
                        <?php $c++; }  ?> 
                    
                </div>

                </div>    
        </div>    

    </body       
</html>

<?php
session_unset();
session_destroy();
?>

