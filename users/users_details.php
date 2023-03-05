<?php 

include('../includes/config.php');  
$qid= $_GET['id'];
$querget=mysqli_query($con, "Select * from users where id='$qid'");
?>
<table class="table table-striped table-hover p-10">
<tbody>
<?php $row = mysqli_fetch_array($querget)?>

<tr><th>User Name: <?php echo $row['name']; ?></th></tr>
<tr><th>User Phone: <?php echo $row['phone']; ?></th></tr>
<tr><th>User Email: <?php echo $row['email']; ?></th></tr>
<tr><th>Gender: <?php echo $row['gender']; ?></th></tr>
<tr><th>Language: <?php echo $row['language']; ?></th></tr>
<tr><th>Plain Password: <?php echo $row['c_password']; ?></th></tr>
<tr>
<th>User's Status: <?php $status= $row['status'];
if($status==1){
$status= '<span class="badge badge-success">Active</span>';
}
else{
$status= '<span class="badge badge-danger">In Active</span>';
} 
echo $status?></th>
</tr>
<tr>
<th>Payment Status: <?php $payment_status= $row['payment_status'];
if($payment_status==1){
    $payment_status= '<span class="badge badge-success">Verified</span>';
}
else{
    $payment_status= '<span class="badge badge-danger">Not Verified</span>';
} 
echo $payment_status?></th>
</tr>
<th>Is Login: <?php $login= $row['is_login'];
if($login==1){
    $login= '<span class="badge badge-success">Yes</span>';
}
else{
    $login= '<span class="badge badge-danger">Not Yet</span>';
} 
echo $login?></th>
</tr>
<tr><th>Updated At: <?php echo $row['updated_at']?></th></tr>


    
    </tbody>

</table>

