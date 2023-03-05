<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{
include('../includes/config.php')
?>
    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Question Name (English)</th>
                                            <th>German</th>
                                            <th>Urdu</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                         <?php $query=mysqli_query($con,"select * from questions");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['catid']);?></td>
                                            <td><?php echo htmlentities($row['qenglish']);?></td>
                                            <td><?php echo htmlentities($row['qgerman']);?></td>
                                            <td><?php echo htmlentities($row['qurdu']);?></td>
                                           
                                            <td align="center">
                                               <a href="javascript:;" onClick="question_details('<?php echo $row['id']; ?>')" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>  
                                                <a href="javascript:;" onClick="edit_question('<?php echo $row['id']; ?>')" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                                
                                                <a href="javascript:;" onClick="delete_question('<?php echo $row['id']; ?>')" title="Delete"  class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a></td>
                                            
                                        </tr>
                                       <?php $cnt=$cnt+1; } ?>
                                    </tbody>
                                    
                                </table>
                                  
                            </div>
                            <?php } ?>