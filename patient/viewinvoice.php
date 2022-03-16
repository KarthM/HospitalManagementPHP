<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
</head>
<body>
    <?php include('../include/header.php');
    include('../include/db.php');
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-2" style="margin-left:-30px;">
              <?php include ('sidenav.php')?>
             </div>
                <div class="col-md-10 my-4">
                <h5 class="text-center">Discharge Summary</h5>
                       <div class="row">
                           <?php
                           if(isset($_GET['id'])){
                           $id=$_GET['id'];
                           $sql="SELECT * from income where id='$id' ";
                           $run=mysqli_query($connect,$sql);
                           $row=mysqli_fetch_array($run);
                          
                           }
                           
                           ?>
                           <div class="col-md-4"></div>
              <div class="col-md-6">
                               <h5>Invoice</h5>
                           <table class="table table-striped">
                     <tr>
                         <td>Doctor name</td>
                         <td><?php echo $row['doctor']?></td>
                     </tr>
                     <tr>
                         <td>Patient name</td>
                         <td><?php echo $row['patient']?></td>
                     </tr>
                     <tr>
                         <td>Amount Paid</td>
                         <td><?php echo $row['amount_paid']?></td>
                     </tr>
                     <tr>
                         <td>Discharge_date</td>
                         <td><?php echo $row['date_discharge']?></td>
                     </tr>
                     <tr>
                         <td>Description</td>
                         <td><?php echo $row['description']?></td>
                     </tr>
                    
                 </table>
                           </div>


                         
                       </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>