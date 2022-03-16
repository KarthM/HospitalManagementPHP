<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
</head>
<body>

 <?php 
 include('../include/header.php');

 ?>
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-2" style="margin-left: -30px;">
             <?php include ('sidenav.php')?>
         </div>

         <div class="col-md-10">
             <div class="row">
             <h4>Admin Dashboard</h4>
             <div class="col-md-3 bg-success text-white" style="height:120px;margin-left:40px;">
              <div class="row">
              <?php  
                       $query="SELECT * FROM admin";
                       $result=mysqli_query($connect,$query);
                       $num=mysqli_num_rows($result);
                      
                      ?>
                  <div class="col-md-5">
                      
                  <h5 class="p-1"><?php echo $num;?><p>Total <br> Admin</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="admin.php" style="text-decoration: none;color:Red;"> <i class="fa-solid fa-user-group fa-2x"></i></a>
                </div>
              </div>
             </div>
             <div class="col-md-3 bg-warning text-white" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query1="SELECT * FROM doctors where status='APPROVED'";
                       $result1=mysqli_query($connect,$query1);
                       $num1=mysqli_num_rows($result1);
                      
                      ?>

                  <div class="col-md-5">
                  <h5 class="p-1"><?php echo $num1 ;?> <p>Total <br> Doctors</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="alldoctor.php" style="text-decoration: none;color:Red;"> <i class="fa fa-user-md fa-2x"></i></a>
                </div>
              </div> 

             </div>
             <div class="col-md-3 bg-secondary text-white" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query2="SELECT * FROM patients";
                       $result2=mysqli_query($connect,$query2);
                       $num2=mysqli_num_rows($result2);
                      
                      ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><?php echo $num2 ;?> <p>Total <br> Patients</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="patient.php" style="text-decoration: none;color:Red;">   <i class="fa-solid fa-bed-pulse fa-2x"></i></a>
                </div>
              </div>
           </div>
           <div class="col-md-3 bg-warning text-white my-1" style="height:120px;margin-left:40px;">
             <div class="row">
             <?php  
                       $query3="SELECT * FROM report";
                       $result3=mysqli_query($connect,$query3);
                       $num3=mysqli_num_rows($result3);
                      
                      ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><?php echo $num3 ;?> <p>Total <br>Reports</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="report.php" style="text-decoration: none;color:Red;">  <i class="fa-solid fa-flag fa-2x"></i></a>
                </div>
              </div>
           </div>

           <div class="col-md-3 bg-secondary text-white my-1" style="height:120px;margin-left:40px;">
             <div class="row">
               <?php 
               $sql="SELECT * from doctors where status='pending'";
                $q=mysqli_query($connect,$sql);
                $res=mysqli_num_rows($q);
                
                ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><?php echo $res ;?><p>Total jobRequest </p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="jobrequest.php" style="text-decoration: none;color:Red;">  <i class="fas fa-book fa-2x"></i></a>
                </div>
              </div>
           </div>
           <div class="col-md-3 bg-success text-white my-1" style="height:120px;margin-left:40px;">
             <div class="row">
               <?php 
               $q="SELECT sum(amount_paid)  as profit from income";
               $r=mysqli_query($connect,$q);
               $row=mysqli_fetch_array($r);
                $p=$row['profit'];
               
               
               ?>
                  <div class="col-md-5">
                  <h5 class="p-1"><?php echo "$".$p ;?> <p>Total <br> Income</p></h5>
                </div>
                <div class="col-md-5 p-1 m-3">
                <a href="income.php" style="text-decoration: none;color:Red;"><i class="fa-solid fa-money-check-dollar fa-2x"></i></a>
                </div>
              </div>
           </div>


             
             </div>
         </div>
     </div>
 </div>

</body>
</html>
