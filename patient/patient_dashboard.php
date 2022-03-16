<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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
             <h4>Patient Dashboard</h4>
             <div class="col-md-3 bg-success text-white" style="height:120px;margin-left:40px;">
              <div class="row">
            
                  <div class="col-md-5">
                      
                  <h5 class="p-1"><p class="text-center m-4">My Profile</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="patientprofile.php" style="text-decoration: none;color:Red;"> <i class="fa fa-user-circle fa-2x m-4"></i></a>
                </div>
              </div>
             </div>
             <div class="col-md-3 bg-warning text-white" style="height:120px;margin-left:40px;">
             <div class="row">
                  <div class="col-md-5">
                  <h5 class="p-1"> <p class="text-center m-3">Book appointments</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="appointment.php" style="text-decoration: none;color:Red;"> <i class="fa fa-calendar fa-2x m-4"></i></a>
                </div>
              </div> 

             </div>
             <div class="col-md-3 bg-secondary text-white" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query4="SELECT * FROM income";
                       $result4=mysqli_query($connect,$query4);
                       $num4=mysqli_num_rows($result4);
                      
                      ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><p class="text-center m-3"><?php echo $num4 ; ?><br>Invoice</p></h5><br>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="invoice.php" style="text-decoration: none;color:Red;">  <i class="fa-solid fa-file-invoice fa-2x"></i></a>
                </div>
              </div>
           </div>
            <?php 
            if(isset($_POST['send'])){
                $title=$_POST['title'];
                $msg=$_POST['msg'];
                $error=array();
                if(empty($title)){
                    $error['report']="please enter the title";
                }else if(empty($msg)){
                    $error['report']="please enter the msg";
                }else{
                  $user=$_SESSION['patient'];
                
                $sql="INSERT INTO report(title,message,username,date_send)Values('$title','$msg','$user',Now())";
                $q=mysqli_query($connect,$sql);
                if($q){
                    echo "<script>alert('message sent')</script>";

                }else{
                    echo "<script>alert('message not sent')</script>";


                }

                }
            }
            
            
            
            ?>

           <div class="col-md-12">
              <div class="row">

                  <div class="col-md-6 jumbotron bg-info my-5" style="position:absolute ; left:300px ;">
                      <form method="post">
                          
                              <h5 class="text-center">Send a  Report</h5>
                              <?php
                      if(isset($error['report'])){
                      $err=$error['report'];
                      echo '<h5 class="alert alert-danger">'.$err.'</h5>';
                 }else{}?>

                              <label>Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Enter title">
                              <label>Message</label>
                              <input type="text" name="msg" class="form-control" placeholder="Enter message"><br>
                              <button class="btn btn-secondary" name="send" style="text-align:center">Send</button><br>
                      </form>
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