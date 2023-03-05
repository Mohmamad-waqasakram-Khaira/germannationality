<?php 

include('../includes/config.php');  
$qid= $_GET['id'];
$querget=mysqli_query($con, "select *, payments.id as pid from payments join users on users.id=payments.user_id where
    payments.id='$qid'");
?>
<table class="table table-striped table-hover p-10">
<tbody>
<?php $row = mysqli_fetch_array($querget);
if($row['amount']>15){
    $plan = 'Yearly';
}else{
    $plan = 'Monthly';
}?>

<tr><th>Payment Plan: <?php echo $plan; ?></th></tr>
<tr><th>Amount: <?php echo $row['amount']; ?></th></tr>
<tr><th>User Name: <?php echo $row['name']; ?></th></tr>
<tr><th>User Phone: <?php echo $row['phone']; ?></th></tr>
<tr><th>User Email: <?php echo $row['email']; ?></th></tr>
<tr><th>Referral Code: <?php echo $row['agent_id']; ?></th></tr>
<tr><th>Payer ID(PayPal): <?php echo $row['payer_id']; ?></th></tr>
<tr><th>Payment ID: <?php echo $row['payment_id']; ?></th></tr>
<tr><th>Date Time: <?php echo $row['create_time']; ?></th></tr>

<?php $payment_method= $row['payment_type'];
    if($payment_method=='Bank'){
        $payment_method= '<span class="badge badge-success">Bank</span>';
    }
    elseif($payment_method=='Agent'){
        $payment_method= '<span class="badge badge-warning">Agent</span>';
    }
elseif($payment_method=='admin'){
    $payment_method= '<span class="badge badge-info">Admin</span>';
}
    else{
        $payment_method= '<span class="badge badge-danger">PayPal</span>';
    } ?>
<tr><th>Payment Type: <?php echo $payment_method ?></th></tr>
<tr><th>Image:  <div class="d-flex">
    <div class="ms-5">
        <!--begin::Title-->
       <a href="#" class="symbol symbol-50px">
        <span class="symbol-label" style="background-image:url('../uploads/<?php echo $row['payment_image'] ?>');"></span>
    </a>
        <!--end::Title-->
        
    </div>
</div></th></tr>    
    </tbody>

</table>

