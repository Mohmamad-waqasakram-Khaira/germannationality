<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
	include("../includes/config.php");
	$e_id= $_REQUEST['id'];
	$query=mysqli_query($con,"Select * from questions join topics on topics.id= questions.tid join chapters on chapters.id= topics.cid where questions.id='$e_id'");

	while($row1=mysqli_fetch_array($query))
	{
	$qanswerget= mysqli_query($con, "select * from answers where answers.qid='$e_id'");
	 	
	?>
	 <form class="user" id="questionform">
                                        <div class="row">
                                            <div class="col">
                                            	<input type="number" name="qid" value="<?php echo htmlentities($e_id) ?>" hidden>
                                                <div class="form-group">
                                                	 <select name="cid" id="cidq" class="form-control"  style="border-radius: 10rem;" onchange="get_topic()"> 
                                            <option value="<?php echo htmlentities($row1['cid']) ?>"><?php echo htmlentities($row1['cenglish']) ?></option>
                                            <?php $querychap= mysqli_query($con,"select id, cenglish from chapters");
                                                    while($getchap= mysqli_fetch_array($querychap))
                                                    {
                                                 ?> 
                                            <option value="<?php echo htmlentities($getchap['id'])?>"><?php echo htmlentities($getchap['cenglish'])?></option>
                                             <?php } ?>
                                        </select>
                                           
                                   
                                        </div>
                                            </div>
                                            <div class="col">
                                            	<div class="form-group">
                                                	 <select name="tid" id="tid" class="form-control"  style="border-radius: 10rem;" > 
                                            <option value="<?php echo htmlentities($row1['tid']) ?>"><?php echo htmlentities($row1['tenglish']) ?></option>
                                            <?php $chapterid=$row1['cid'];

                                             $querytopic= mysqli_query($con,"select id, tenglish from topics where cid='$chapterid'");
                                                    while($gettopic= mysqli_fetch_array($querytopic))
                                                    {
                                                 ?> 
                                            <option value="<?php echo htmlentities($gettopic['id'])?>"><?php echo htmlentities($gettopic['tenglish'])?></option>
                                             <?php } ?>
                                        </select>
                                           
                                   
                                        </div>
                                                <div id="checktopic"></div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                          
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="qgerman" id="qgerman" value="<?php echo htmlentities($row1['qgerman']) ?>" 
                                                placeholder="Enter Question ( German )">
                                        </div>        
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="qenglish" id="qenglish" value="<?php echo htmlentities($row1['qenglish']) ?>" 
                                                placeholder="Enter Question ( English )">
                                        </div>
                                            </div>
                                            <div class="col">
                                                 <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="qurdu" id="qurdu" value="<?php echo htmlentities($row1['qurdu']) ?>" 
                                                placeholder="Enter Question ( Urdu )">
                                        </div>
                                            </div>

                                        </div>
                                        <?php while ($answerrow=mysqli_fetch_array($qanswerget)){ ?> 
                                        <div class="row">
                                             
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" value="<?php echo htmlentities($answerrow['agerman']) ?>" name="agerman1" id="agerman1"
                                                placeholder="Enter Answer ( German )">
                                        </div>        
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" value="<?php echo htmlentities($answerrow['aenglish']) ?>" name="aenglish1" id="aenglish1"
                                                placeholder="Enter Answer ( English )">
                                        </div>
                                            </div>
                                            <div class="col">
                                                 <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" value="<?php echo htmlentities($answerrow['aurdu']) ?>" name="aurdu1" id="aurdu1"
                                                placeholder="Enter Answer ( Urdu )">
                                        </div>
                                            </div>
                                            <div class="col-sm-1">
                                            	<?php if($answerrow['answer']=='1'){ ?>
                                            		<label class="container pt-3">Correct
                                              <input type="checkbox" value="1" for="answer1" id="answer1" name="answer1" checked>
                                              <span class="checkmark"></span>
                                            </label>
                                        <?php } else{?>
                                        	<label class="container pt-3">Correct
                                              <input type="checkbox" value="1" for="answer1" id="answer1" name="answer1" >
                                              <span class="checkmark"></span>
                                            </label>
                                        <?php }?>

                                            </div>
                                            
                                        </div>
                                        <?php } ?>
                                        <!-- <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="agerman2" id="agerman2"
                                                placeholder="Enter Answer2 ( German )">
                                        </div>        
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="aenglish2" id="aenglish2"
                                                placeholder="Enter Answer2 ( English )">
                                        </div>
                                            </div>
                                            <div class="col">
                                                 <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="aurdu2" id="aurdu2"
                                                placeholder="Enter Answer2 ( Urdu )">
                                        </div>
                                            </div>
                                            <div class="col-sm-1"><label class="container pt-3">Correct
                                              <input type="checkbox" value="1" for="answer2" id="answer2" name="answer2">
                                              <span class="checkmark"></span>
                                            </label></div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="agerman3" id="agerman3"
                                                placeholder="Enter Answer3 ( German )">
                                        </div>        
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="aenglish3" id="aenglish3"
                                                placeholder="Enter Answer3 ( English )">
                                        </div>
                                            </div>
                                            <div class="col">
                                                 <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="aurdu3" id="aurdu3"
                                                placeholder="Enter Answer3 ( Urdu )">
                                        </div>
                                            </div>
                                            <div class="col-sm-1"><label class="container pt-3">Correct
                                              <input type="checkbox" value="1" for="answer3" id="answer3" name="answer3">
                                              <span class="checkmark"></span>
                                            </label></div>
                                        </div> -->
                                        <div class="row">

                                            <div class="col mx-3 my-3">
                                            	<?php if($row1['answeraudio']!=''){
                                            	 ?>
                                            	 <audio controls autoplay muted>
												  <source src="uploads/<?php echo htmlentities($row1['answeraudio']) ?>" type="audio/mp3">
												</audio>
                                            	 <?php 
                                            	} 
                                            	else{?>
                                            		<span class="label danger mb-2">Audio file Not Found</span>
                                            	<?php }?>
                                                <p class="mt-2">Select audio file</p>
                                                
                                                <input type="file" value="<?php echo htmlentities($row1['answeraudio']) ?>"  name="answeraudio" id="answeraudio" accept="audio/mp3">
                                            </div>
                                            <div class="col mx-3 my-3">
                                            	<?php if($row1['answervideo']!=''){
                                            	 ?>
                                            	<video width="`200" height="120" controls autoplay muted>
												  <source src="uploads/<?php echo htmlentities($row1['answervideo']) ?>" type="video/mp4">
												</video>
												<?php 
                                            	} 
                                            	else{?>
                                            		<span class="label danger mb-2">Video file Not Found</span>
                                            	<?php }?>
                                                <p class="mt-2">Select video file</p>
                                                <input type="file" value="<?php echo htmlentities($row1['answervideo']) ?>"  name="answervideo" id="answervideo" accept="video/*">
                                            </div>
                                        </div>

                                        
                                        
                                       
            <div class="modal-footer">
                 <button type="button" onclick="update_question()" class="btn btn-success btn-lg">
                                            Update
            </button>
        <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
      </div>
                                       
                                       
                                       
                                    </form>
	<div id="updatetopic"></div>
	<?php } } ?>