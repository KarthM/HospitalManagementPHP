<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment </title>
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
                <h5 class="text-center">View Appointments</h5>
                       <div class="row">

                       <?php 
                       $q="select * from appointments where status='pending' ";
                       $res=mysqli_query($connect,$q);
                       
                       $output ="";
                       
                       $output .="<table class='table table-striped'>
                       <tr>
                       <th>ID</th>
                       <th>Firstname</th>
                       <th>Lastname</th>
                       <th>Gender</th>
                       <th>Phone</th>
                       <th>Appointment_date</th>
                     
                       <th>Date_booked</th>
                       <th>Actions</th>

                       </tr>
                       
                         ";
                     if(mysqli_num_rows($res)<1){
                        $output .="
                        <tr> <td class='text-center' colspan='8'>No Appointments found</td></tr>
                        ";

                     }
                     while($row=mysqli_fetch_assoc($res)){
                        $output .="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['lastname']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['appointment_date']."</td>
                        
                        <td>".$row['date_booked']."</td>
                        <td> <a href='discharge.php?id=".$row['id']."'><button class='btn btn-primary'>check</button></a></td>
                       
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

