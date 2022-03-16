<?php session_start(); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php 
    include('../include/header.php'); ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-114px;">
                    <?php include('sidenav.php') ?>
                </div>
                <div class="col-md-10">
             <div class="row">
             <h4>Doctor Dashboard</h4>
             <div class="col-md-3 bg-primary text-white" style="height:120px;margin-left:40px;">
              <div class="row">
            
                  <div class="col-md-5">
                      
                  <h5 class="p-1"><p class="text-center m-4">My Profile</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="doctorprofile.php" style="text-decoration: none;color:Red;"> <i class="fa fa-user-circle fa-2x m-4"></i></a>
                </div>
              </div>
             </div>
             <div class="col-md-3 bg-warning text-white" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query3="SELECT * FROM patients";
                       $result3=mysqli_query($connect,$query3);
                       $num3=mysqli_num_rows($result3);
                      
                      ?>
                  <div class="col-md-5">
                  <h5 class="p-1"> <p class="text-center m-4"><?php echo $num3 ;?><br>Total <br> Patients</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="alldoctor.php" style="text-decoration: none;color:Red;"> <i class="fa fa-bed fa-2x m-4"></i></a>
                </div>
              </div> 

             </div>
             <div class="col-md-3 bg-secondary text-white" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query4="SELECT * FROM appointments";
                       $result4=mysqli_query($connect,$query4);
                       $num4=mysqli_num_rows($result4);
                      
                      ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><p class="text-center m-3"><?php echo $num4 ;?><br>Total <br>Appointments</p></h5><br>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="appointment_view.php" style="text-decoration: none;color:Red;"> <i class="fa-solid fa-file-invoice fa-2x"></i></a>
                </div>
              </div>
           </div>
      </div>
 </div>
</div>
        </div>
    </div>
</body>
</html>