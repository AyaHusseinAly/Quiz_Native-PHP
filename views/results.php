
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
                        <h2>you got <span> <?php echo  $exam->mark_exam();   ?>/ <?php echo  $exam->getNumberOf_autoEvaluatedQuestions(); ?></span> Marks</h2><p>correct answers are shown below</p><p><span>Note:</span>Essay Questions are not auto-evaluated</p>
                    </div>
                   <?php  
                   $c=0;$k=0;
                   $a=$exam->getUserAnswers();
                   //$keys = array_keys( $exam->getUserAnswers());
                   foreach($questions as $q) { ?>
                    <div class="container mt-sm-5 my-2 " style="background-color:#333;">
                        <div class="py-2 h5">
                        <?php if(array_key_exists('Q'.($k+1),$a)){ 
                            if($a['Q'.($k+1)]==($q->get_answer())){ ?>
                            <i class="fas fa-check-circle" style="color:#21bf73"></i>
                        <?php }else{ ?>
                            <i class="fas fa-times-circle" style="color:#E14D43"></i>
                        <?php }  } else{ ?>
                            <i class="fas fa-times-circle" style="color:#E14D43"></i>
                        <b><?php } echo $q->get_question();   ?> </b>
                        </div>
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <?php 
                            if(!empty($q->get_options())){
                            $i=0;    
                            foreach($q->get_options() as $option) {
                                $i++;?>
                            <label class="options"><?php echo $option;   ?> <input type="radio"  <?php if($q->get_answer()=="option".$i){?>checked="checked" <?php }else{?> disabled <?php } ?> value="option<?php echo $i;?>" name="Q<?php echo $k ?>" > <span class="checkmark"></span> </label>
                            <?php } } ?>   
                        </div>
                    <div>    
                        <?php  $k++;}  ?> 
                    
                </div>

                </div>    
        </div>    

    </body       
</html>

<?php
session_unset();
session_destroy();
?>

