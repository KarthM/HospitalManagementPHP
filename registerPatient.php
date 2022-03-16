<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
</head>
<body style="background-image:url('public/doctor7.jpg'); background-size:cover; background-repeat:no-repeat;">
    <?php include('include/header.php')?>
    <?php include('include/db.php')?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 jumbotron m-3 shadow">
                <div>
                    <h4 class="text-center m-5">Patient Register</h4>
                 <?php 
                 if(isset($_POST['register'])){
                     $fname=$_POST['fname'];
                     $lname=$_POST['lname'];
                     $uname=$_POST['uname'];
                     $email=$_POST['email'];
                     $gender=$_POST['gender'];
                     $country=$_POST['country'];
                     $phone=$_POST['phone'];
                     $password=$_POST['pass'];
                     $confirmpassport=$_POST['cpass'];

                     $error=array();
                     if(empty($fname)){
                         $error['apply']="Enter the firstname";
                     }else if(empty($lname)){
                        $error['apply']="Enter the lastname";
                    }else if(empty($uname)){
                        $error['apply']="Enter the username";
                    }else if(empty($email)){
                        $error['apply']="Enter the email";
                    }else if($gender==""){
                        $error['apply']="select the gender";
                    }else if($country==""){
                        $error['apply']="select the country";
                    }else if(empty($password)){
                        $error['apply']="Enter the password";
                    }else if(empty($phone)){
                        $error['apply']="Enter the phonenumber";
                    }else if($confirmpassport != $password){
                        $error['apply']="Password not match";
                    }
                    if(count($error)==0)
                    {
                        $sql="INSERT INTO patients
                        (firstname,lastname,username,email,gender,country,phonenumber,password,date_reg,profile) 
                        VALUES ('$fname','$lname','$uname','$email','$gender','$country','$phone','$password',NOW(),'patient1.jpg')";
                        $result=mysqli_query($connect,$sql);
                        if($result){
                            echo '<h5 class="alert alert-success">'.'Register successfully!!'.'</h5>';
                            header("Refresh: 2; url=patientlogin.php");
                        }else{
                            echo "<h5 class='btn btn-danger'>"."Whoops something went wrong"."</h5>";
                        }
                    }
                 }
                 
                 if(isset($error['apply'])){
                    $err=$error['apply'];
                    
                  echo '<h5 class="alert alert-danger">'.$err.'</h5>';
                }else{
                    
                }
            
                 ?>

                    <form method="post">
                    <div class="form-group">
                         <label class="text-white">Firstname</label>
                         <input type="text" placeholder="Enter Firstname" class="form-control" name="fname" value="<?php if(isset($fname)) echo $fname; ?>">
                    </div>
                    <div class="form-group">
                         <label class="text-white">Lastname</label>
                         <input type="text" placeholder="Enter Lastname" class="form-control" name="lname" value="<?php if(isset($lname)) echo $lname; ?>">
                    </div>
                    <div class="form-group">
                         <label class="text-white">Username</label>
                         <input type="text" placeholder="Enter username" class="form-control" name="uname" value="<?php if(isset($uname)) echo $uname; ?>">
                    </div>
                    <div class="form-group">
                         <label class="text-white">Email</label>
                         <input type="text" placeholder="Enter email address" class="form-control" name="email" value="<?php if(isset($email)) echo $email; ?>">
                    </div><br>
                    <div class="form-group">
                         <label class="text-white">Select Gender</label>
                         <select name="gender" class="form-control">
                             <option value="">Select gender</option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                         </select>
                    </div><br>

                    <div class="form-group">
                         <label class="text-white">Select Country</label>
                         <select name="country" class="form-control">
                             <option value="">Select country</option>
                             <option value="UK">UK</option>
                             <option value="India">India</option>
                         </select>
                    </div><br>

                    <div class="form-group">
                         <label class="text-white">Phone number</label>
                         <input type="number" placeholder="Enter Phonenumber" class="form-control" name="phone"value="<?php if(isset($phone)) echo $phone; ?>">
                    </div>
                    <div class="form-group">
                     <label class="text-white">New Password: </label>
                     <input type="password" name="pass" placeholder="password" class="form-control">
                    </div>
                    <div class="form-group">
                     <label class="text-white">Confrim Password:</label>
                     <input type="password" name="cpass" placeholder="confrim password" class="form-control">
                    </div><br>
                     

                    <button type="submit" class="btn btn-warning m-1 text-center" name="register">Register</button>
                    <p>I have an account?<a href="patientlogin.php" style="text-decoration:none; color:brown;">Login here!</a></p>
                    
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>