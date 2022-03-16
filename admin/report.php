<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports </title>
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
                <h5 class="text-center">Reports</h5>
                       <div class="row">

                       <div class="col-md-12">
                 
                 <h4>DETAILS</h4>
                 <table class="table table-striped">
                     <tr>
                         <th>Title</th>
                         <th>Message</th>
                         <th>Username</th>
                         <th>Date_send</th>
                         <th>Actions</th>
                  </tr>
         <?php
                    $output="";
                   $query="SELECT * FROM report";
                     $res=mysqli_query($connect,$query);
                     if(mysqli_num_rows($res)<1){
                       
                        $output .="<h5 class='text-center'> No Reports</h5>";
                     }
                     while($row=mysqli_fetch_assoc($res))
              {
                

               $output .="<tr>
               <td>".$row['id']."</td>         
               <td>".$row['title']."</td>
               <td>".$row['message']."</td>
               <td>".$row['username']."</td>
               <td>".$row['date_send']."</td>
               <td><button class='btn btn-primary'> Delete</button></td>
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
    </div>

