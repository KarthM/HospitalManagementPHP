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
                <h5 class="text-center">Discharge</h5>
                       <div class="row">
                           <?php
                           if(isset($_GET['id'])){
                           $id=$_GET['id'];
                           $sql="SELECT * from appointments where id='$id' ";
                           $run=mysqli_query($connect,$sql);
                           $row=mysqli_fetch_array($run);
                          
                           }
                           
                           ?>
              <div class="col-md-6">
                               <h5>Appointment details</h5>
                           <table class="table table-striped">
                     <tr>
                         <td>Firstname</td>
                         <td><?php echo $row['firstname']?></td>
                     </tr>
                     <tr>
                         <td>Lastname</td>
                         <td><?php echo $row['lastname']?></td>
                     </tr>
                     <tr>
                         <td>Gender</td>
                         <td><?php echo $row['gender']?></td>
                     </tr>
                     <tr>
                         <td>Symptoms</td>
                         <td><?php echo $row['symptoms']?></td>
                     </tr>
                     <tr>
                         <td>Phone_No</td>
                         <td><?php echo $row['phone']?></td>
                     </tr>
                     <tr>
                         <td>Appointment Date</td>
                         <td><?php echo $row['appointment_date']?></td>
                     </tr>
                 </table>
                           </div>


                           <div class="col-md-6">
                               <h4>Invoice</h4>
                               <?php
                               if(isset($_POST['send'])){
                                   $fee=$_POST['fee'];
                                   $des=$_POST['des'];
                                   $firstname=$row['firstname'];
                                  
                                    $error=array();

                           if(empty($fee)){

                           }else if(empty($des)){

                           }else{
                               $doctor=$_SESSION['doctor'];
                               $q="INSERT INTO income (doctor,patient,amount_paid,date_discharge,description)
                               VALUES('$doctor','$firstname','$fee',Now(),'$des')";
                               $r=mysqli_query($connect,$q);
                               if($r){
                                   echo "<script>alert('Data inserted successfully')</script>";
                               }else{
                                echo "<script>alert('something went wrong')</script>";
                               }
                           }
                               }
                               ?>
                         <form method="post">
                        <div class="form-group">
                         <label class="text-white">Fee</label>
                         <input type="text" placeholder="eg.$ 400" class="form-control" name="fee">
                         </div>
                          <div class="form-group">
                         <label class="text-white">Description</label>
                         <input type="text" placeholder="Description" class="form-control" name="des">
                        </div> <br><br>
                         <button type="submit" class="btn btn-warning m-1 text-center form-control" name="send">send</button>
                   
                    
                    </form>
                           </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
