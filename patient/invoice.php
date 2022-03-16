<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice </title>
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
                <h5 class="text-center">View Invoice</h5>
                       <div class="row">

                       <?php 
                       $q="select * from income ";
                       $res=mysqli_query($connect,$q);
                       
                       $output ="";
                       
                       $output .="<table class='table table-striped'>
                       <tr>
                       <th>ID</th>
                       <th>Doctor</th>
                       <th>Patient Name</th>
                       <th>Date_discharge</th>
                       <th>Amount_paid</th>
                       <th>Description</th>
                     
                       <th>Actions</th>

                       </tr>
                       
                         ";
                     if(mysqli_num_rows($res)<1){
                        $output .="
                        <tr> <td class='text-center' colspan='8'>No data found</td></tr>
                        ";

                     }
                     while($row=mysqli_fetch_assoc($res)){
                        $output .="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_discharge']."</td>
                        <td>".$row['amount_paid']."</td>
                        <td>".$row['description']."</td>
                        
                        
                        <td> <a href='viewinvoice.php?id=".$row['id']."'><button class='btn btn-primary'>view</button></a></td>
                       
                        </tr>
                        
                        ";

                     }
                     $output .="          
                     </tr>  
                          </table>";
                          echo $output;
                   
                          
                       
                       ?>


                </div>
            </div>
        </div>
    </div>
    </div>

