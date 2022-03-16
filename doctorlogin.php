<?php
session_start();
include('include/db.php');
if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $error=array();

    $sql="SELECT * FROM doctors where username='$uname' AND password='$pass'";
    $res=mysqli_query($connect,$sql);
     $row =mysqli_fetch_array($res);
    $status=$row['status'];
    $password=$row['password'];
    
     if(empty($uname)){
        $error['login']="Please enter the username";
    }else if(empty($pass)){
        $error['login']="Please enter the password";
    }else if($status=="Pending"){
        $error['login']="Please wait admin to confirm";
    }else if($status=="Rejected"){
        $error['login']="Try again later...";
    }else if($password != $pass){
        $error['login']="Username or password not matched ";
    }

    if(count($error)==0){
        $query="SELECT * FROM doctors where username='$uname' AND password='$pass'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)){
            echo "<script>alert('succesfully login!!')</script>";
            $_SESSION['doctor']=$uname;
            header('Location: doctor/dashboard.php');
        }else{
            echo "<script>alert('whoops something wrong')</script>";
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
    <title>Doctor</title>
</head>
<body style="background-image:url('public/doctor7.jpg'); background-size:cover; background-repeat:no-repeat;">
    <?php include('include/header.php')?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 jumbotron m-3 shadow">
                <div>
                    <h4 class="text-center m-5">Doctor Login</h4>
                    <?php
                      if(isset($error['login'])){
                      $err=$error['login'];
                      echo '<h5 class="alert alert-danger">'.$err.'</h5>';
                 }else{}?>

                    <form method="post">
                    <div class="form-group">
                         <label class="text-white">Username</label>
                         <input type="text" placeholder="Enter Username" class="form-control" name="uname">
                    </div>
                    <div class="form-group">
                         <label class="text-white">Password</label>
                         <input type="password" placeholder="Password" class="form-control" name="pass">
                    </div> <br><br>
                    <button type="submit" class="btn btn-warning m-1 text-center" name="login">Login</button>
                    <p>I dont have an account?<a href="doctorapply.php" style="text-decoration:none; color:brown;">Apply now !!!</a></p>
                    
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>



</body>
</html>