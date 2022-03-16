<?php
session_start();
include('include/db.php');
if(isset($_POST['login'])){
    $username=$_POST['uname'];
    $password=$_POST['password'];
    $error=array();
    if(empty($username)){
        $error['Admin']="enter the username";
    }else if(empty($password)){
        $error['Admin']="enter the password";
    }
    if(count($error)==0)
    {
        $query="SELECT * from admin where username='$username' and password='$password'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)==1){
        if($result){
            echo"<script>alert('You login as admin')</script>";
            $_SESSION['admin']=$username;
            header('location:admin/index.php');
            exit();

        }else{
            echo"<script>alert('invalid username')</script>";

        }

    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login page</title>
</head>
<body style="background-image:url(public/back.jpg); background-repeat: no-repeat; background-size:cover;">
    <?php include('include/header.php')?>
    <div style="margin-top:50px;"></div>
   <div class="container">
       <div class="col-md-12">
           <div class="row">
               <div class="col-md-3"></div>
               
               <div class="col-md-6 jumbotron m-1 shadow">
                   <img src="./public/login.png" class="col-md-12" style="width:30%; margin-left:10rem;">
                 <form method="post">
                 <div>
                 <?php 
                 if(isset($error['Admin'])){
                 $show=$error['Admin'];
                     echo "<div class='alert alert-danger'>$show</div>";
                 }else{
                     $show='';
                 }
                 
                 ?>
                 </div>
                     <div class="form-group">
                         <label class="text-white">Username</label>
                         <input type="text" placeholder="Enter Username" class="form-control" name="uname">
                         <label class="text-white">Email</label>
                         <input type="password" placeholder="Password" class="form-control" name="password">
                          <button type="submit" class="btn btn-warning m-1" name="login" style="margin-left:40px ;">Login</button>
                     </div>
                    
                 </form>
               </div>
           </div>
       </div>
   </div>
    
</body>
</html>