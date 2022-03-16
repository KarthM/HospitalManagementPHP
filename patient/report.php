<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report </title>
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
                <h5 class="text-center">View report</h5>
                       <div class="row">

                       <?php 
                       $q="select * from report ";
                       $res=mysqli_query($connect,$q);
                       
                       $output ="";
                       
                       $output .="<table class='table table-striped'>
                       <tr>
                       <th>ID</th>
                       <th>Title</th>
                       <th>Message</th>
                       <th>username</th>
                       <th>Date_send</th>
                       
                       <th>Actions</th>

                       </tr>
                       
                         ";
                     if(mysqli_num_rows($res)<1){
                        $output .="
                        <tr> <td class='text-center' colspan='8'>No report found</td></tr>
                        ";

                     }
                     while($row=mysqli_fetch_assoc($res)){
                        $output .="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['title']."</td>
                        <td>".$row['message']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['date_send']."</td>
                       
                        
                        <td> <a href='?id=".$row['id']."'><button class='btn btn-primary'>Delete</button></a></td>
                       
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

