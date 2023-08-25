<?php 

include('../includes/config.php');  
$qid= $_GET['id'];
$querget=mysqli_query($con, "Select * from users where agent_id='$qid'");
?>
<table class="table table-striped table-hover p-10">
<tbody>
<?php while ($row = mysqli_fetch_array($querget)) {?>

<tr><th>User Name: <?php echo $row['name']; ?></th>
    <th>User Phone: <?php echo $row['phone']; ?></th>
    <th>User Email: <?php echo $row['email']; ?></th></tr>

<?php }?>


    
    </tbody>

</table>

