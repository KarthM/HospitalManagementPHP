<?php 
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patients </title>
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
                <h5 class="text-center">view Patient</h5>
                       <div class="row">
  <?php
                         if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                       $query="SELECT * FROM patients where id='$id'";
                     $res=mysqli_query($connect,$query);
                     while($row=mysqli_fetch_assoc($res))
              {
                $username=$row['username'];
                  $img=$row['profile'];
                 $firstname= $row['firstname'];
                $lastname= $row['lastname'];
                $email= $row['email'];
               $phone=   $row['phonenumber'];
              }
            }
?>
                 <div class="col-md-6">
                 <h4>Username:<?php echo $username ?></h4>
                
                  <img src="<?php echo '../image/'.$img ;?>" height="150px" width="200px" ><br><br>
               
                 <h4>DETAILS</h4>
                 <table class="table table-striped">
                     <tr>
                         <td>Firstname</td>
                         <td><?php echo $firstname;?></td>
                     </tr>
                     <tr>
                         <td>Lastname</td>
                         <td><?php echo $lastname;?></td>
                     </tr>
                     <tr>
                         <td>Email</td>
                         <td><?php echo $email;?></td>
                     </tr>
                     <tr>
                         <td>Phone_No</td>
                         <td><?php echo $phone;?></td>
                     </tr>
                 </table>
             </div>


                </div>
            </div>
        </div>
    </div>
    </div>

