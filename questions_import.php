<?php
 session_start();
if(strlen($_SESSION['alogin'])==0)
    {   
    header('location:index.php');
    }
    else{

    require_once('assets/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require_once('assets/spreadsheet-reader-master/SpreadsheetReader.php');
    
    include('includes/config.php');
    
    if(isset($_POST['import'])){
         $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
          if(in_array($_FILES["file"]["type"],$allowedFileType)){
                $targetPath = 'assets/spreadsheet-reader-master/uploads/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = new SpreadsheetReader($targetPath);
                $sheetCount = count($Reader->sheets());
                for($i=0;$i<$sheetCount;$i++){
                    $Reader->ChangeSheet($i);
                    foreach ($Reader as $Row){
                        // echo '<pre>';
                        // print_r($Row);
                        // echo '</pre>';
                       
                        if(isset($Row[0])) {
                            // $acc_reg = mysqli_real_escape_string($conn,$Row[0]);
                            $id = $Row[0];
                        }
                        
                        if(isset($Row[1])) {
                            $a_english = $Row[1];
                        }
                        
                        


                        
                        if (!empty($id)) {
                            $query = mysqli_query($con, "UPDATE answers set a_english ='$a_english' where id=$id");
                           
                            if (! empty($query)) {
                                $type = "success";
                                echo $message = "Excel Data Imported into the Database".$id;
                            } else {
                                $type = "error";
                               echo $message = "Problem in Importing Excel Data";
                            }
                        }
                    }
                }
          }else{
                $type = "error";
                $message = "Invalid File Type. Upload Excel File.";
          }
    }

?>
<form action=""  method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <div>
        <h3>Choose Excel File</h3> 
            <input type="file" name="file" id="file" accept=".xls,.xlsx">
            <input type="hidden" name="type" value="getexport">
        <button type="submit" id="submit" name="import" class="btn-submit btn-primary" style="margin-top:15px;">Import</button>
    </div>
</form>
<?php } ?>