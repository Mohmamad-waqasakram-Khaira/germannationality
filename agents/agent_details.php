<?php 

include('../includes/config.php');  
$qid= $_GET['id'];
$querget=mysqli_query($con, "Select * from agents where id='$qid'");
?>
<table class="table table-striped table-hover p-10">
<tbody>
<?php $row = mysqli_fetch_array($querget)?>
<tr><th>Agent Code: <?php echo $row['agent_id']; ?></th></tr>
<tr><th>Agent Name: <?php echo $row['agent_name']; ?></th></tr>
<tr><th>Agent Phone: <?php echo $row['agent_phone']; ?></th></tr>
<tr><th>Agent Email: <?php echo $row['agent_email']; ?></th></tr>
<tr><th>Shop Name: <?php echo $row['agent_shop_name']; ?></th></tr>
<tr><th>Shop Address: <?php echo $row['agent_address']; ?></th></tr>
<tr><th>Business Type: <?php echo $row['agent_business_type']; ?></th></tr>
<tr><th>Number Of Accounts: <?php echo $row['no_of_acc']; ?></th></tr>

    
    </tbody>

</table>

