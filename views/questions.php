
<div class="container mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b><?php echo $current_question->get_question();   ?> ?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <form action="<?php echo $exam->move_next(); ?>" method="post">
            <?php 
            if(!empty($current_question->get_options())){
            $i=0;    
            foreach($current_question->get_options() as $option) {
                $i++;?>
            <label class="options"><?php echo $option;   ?> <input type="radio" name="option<?php echo $i;?>"> <span class="checkmark"></span> </label>
            <?php } }else{?>
            <textarea style="border-radius:10px;border:2px solid #21bf73" rows="6" cols="47"></textarea>    
            <?php } ?>
        </div>
    </div>
	
    <div class="d-flex align-items-center pt-3">
        <div id="prev" > <a href='<?php echo $exam->move_previous();   ?>'  class="btn btn-primary">Previous</a> </div>
        <div class="ml-auto mr-sm-5"> <input type="submit" class="btn btn-success" value="Next "></div>
            </form>
      
    </div>
</div>
<script>


</script>