<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor

    </title>
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
                  <h5 class="text-center">Edit doctors</h5>
                  <?php 
                  
                  if(isset($_GET['id'])){
                      $id=$_GET['id'];

                      $sql="SELECT * FROM doctors where id='$id'";
                      $run=mysqli_query($connect,$sql);
                      $res=mysqli_fetch_array($run);
                      
                  }
                  
                  ?>
                  <div class="row">
                      <div class="col-md-8">
                          <h5>ID:<?php echo $res['id']?></h5>
                          <form method="post">
                          <h6> Firstname:<input type="text" value="<?php echo $res['firstname'];?>"></input></h6>
                          <h6> Lastname:<input type="text" value="<?php echo $res['lastname'];?>"></input></h6>
                          <h6> Username:<input type="text" value="<?php echo $res['username'];?>"></input></h6>
                          <h6> Email_id:<input type="text" value="<?php echo $res['email'];?>"></input></h6>
                          <h6> Gender: <input type="text" value="<?php echo $res['gender'];?>"></input></h6>
                          <h6> Country: <input type="text" value="<?php echo $res['country'];?>"></input></h6>
                          <h6> Date_Reg: <input type="text" value="<?php echo $res['date_reg'];?>"></input></h6>
                          <h6> Salary: <input type="text" value="<?php echo $res['salary'];?>"></input></h6>
                          </form>
                      </div>
                      <div class="col-md-3">
                      <form method="post">
                        <h5>Update Salary</h5>
                       <label> Salary: </label>
                       <input type="text" name="salary"value="<?php echo $res['salary'];?>"></input>
                       <br> <br>
                      <button type="submit" class="btn btn-primary text-center">Update</button>
                       </form>

                       <?php 
                       if(isset($_POST['salary'])){
                           $sal=$_POST['salary'];
                           $id= $res['id'];
                           $q="UPDATE doctors set salary='$sal' where id='$id'";
                           $r=mysqli_query($connect,$q);
                           if($r){
                               echo"<script>alert('salary updated')</script>";
                               
                           }else{
                               echo "error";
                           }
                       }
                       
                       
                       
                       ?>
                      </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>