<?php 
 session_start();
if(strlen($_SESSION['alogin'])==0)
	{	
	header('location:index.php');
	}
	else{
error_reporting(0);
include('../includes/config.php');	
$qid= $_GET['id'];
$querget=mysqli_query($con, "Select * from questions where questions.id='$qid'");
$qanswerget= mysqli_query($con, "select * from answers where answers.qid='$qid'");   
$quergetaud=mysqli_query($con, "Select audio_urdu from audiofiles where qid='$qid'");
$rowaudio = mysqli_fetch_array($quergetaud);
?>
<table class="table table-striped table-hover">
<tbody>
	<tr class="fw-semibold text-gray-600">
	<th>Categories Name: </th>
	<?php $catgoryquery = mysqli_query($con, "Select * from question_category join category on category.id=question_category.category_id where question_category.question_id='$qid';");
	while($rowcat = mysqli_fetch_array($catgoryquery)){
	 ?>
	<td><?php echo htmlentities($rowcat['c_name_german'])?></td>
<?php } ?>
	</tr>
<?php while($row = mysqli_fetch_array($querget)){ ?>
	<tr class="fw-semibold text-gray-600">
	<th>Questions: </th>
	<td>German: <?php echo htmlentities($row['q_german'])?><br><br>English:   <?php echo htmlentities($row['q_english'])?></td>
	</tr>
	<tr>
	<th>Video File: </th>
	<td><?php
$videoanswer= $row['answervideo'];
	if($videoanswer!=''){
		$videoanswer= '<span class="badge badge-success">Uploaded</span>';
	}
	else{
		$videoanswer= '<span class="badge badge-danger">Not Uploaded</span>';
	}
	
	 echo $videoanswer ?></td>
	</tr>
<tr>
	<th>Question Image: </th>
	<td><a href="#" class="symbol symbol-50px">
										<span class="symbol-label" style="background-image:url('uploads/<?php echo $row['question_image'] ?>');">&nbsp;&nbsp;&nbsp;</span>
									</a>
		<?php
$questionimg= $row['question_image'];
	if($questionimg=='' || $questionimg=='NULL'){
		$questionimg= '<span class="badge badge-danger">Not Uploaded</span>';
	}
	else{
		$questionimg= '<span class="badge badge-success">Uploaded</span>';

	}
	
	 echo $questionimg ?></td>
	</tr>
	<?php
 }
?>
	<tr class="fw-semibold text-gray-600">
	<th>Audio File (English): </th>

	<!-- <td>
		<audio controls autoplay muted>
		  <source src="uploads/Urdu_audio/<?php echo htmlentities($rowaudio['audio_urdu']) ?>" type="audio/mp3">
		</audio>
		
		
</td> -->
	</tr>
	
<?php while ($answerrow=mysqli_fetch_array($qanswerget)){
	$qanswer= $answerrow['answer'];
	if($qanswer=='1'){
		$qanswer= '<span class="badge badge-success">True</span>';
	}
	else{
		$qanswer= '<span class="badge badge-danger">False</span>';
	}

     ?>
     <?php
     $anvalue=$answerrow['answer_value'];
		if($anvalue=="" || $anvalue=="NULL"){
		echo $anvalue=="";
	}
     ?>
	<tr class="fw-semibold text-gray-600">
	<th>Answer:</th>	
	<td>German: <?php echo $answerrow['a_german']; ?><br><br>English:  <?php echo $answerrow['a_english']; ?></td>
	<td><?php echo  $anvalue ?> &nbsp;&nbsp; <?php echo $qanswer ?></td>
	</tr>
	<?php
	}
}
?>
	
	</tbody>

</table>

