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
                <h5 class="text-center">Appointment Details</h5>
                       <div class="row">
                       <div class="col-md-3"></div>
                       <div class="col-md-6">

                       <?php
                       $pat=$_SESSION['patient'];
                       $sql="SELECT * from patients where username='$pat'";
                       $run=mysqli_query($connect,$sql);
                       $row=mysqli_fetch_array($run);
                       $firstname=$row['firstname'];
                       $lastname=$row['lastname'];
                       $gender=$row['gender'];
                       $phone=$row['phonenumber'];


                       if(isset($_POST['book'])){
                           $date=$_POST['date'];
                           $symptoms=$_POST['symptoms'];

                           if(empty($symptoms)){

                           }else{
                               $sql1="INSERT INTO appointments (firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked)
                                VALUES('$firstname','$lastname','$gender','$phone','$date','$symptoms','Pending',Now())";
                              $run1=mysqli_query($connect,$sql1);

                              if($run1){
                                  echo "<script>alert('Appointment has been sent')</script>";
                              }else{
                                echo "<script>alert('whoops!!')</script>";
                              }

                           }
                       }
                       ?>
                           <form method="post">
                               <label>Appointment date</label>
                               <input type="date" class="form-control" name="date">
                               <label>Symptoms</label>
                               <input type="text" class="form-control" name="symptoms" placeholder="eg.fever"><br><br>
                               <button class="btn btn-warning form-control" name="book"  >Book-Appointment</button>
                           </form>
                       </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
</body>
</html>

