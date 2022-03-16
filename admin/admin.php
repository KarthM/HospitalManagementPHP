<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php include('../include/header.php') ?>
    <div class="container-fluid">
        <div class="row">
              <div class="col-md-2" style="margin-left: -30px;">
              <?php include ('sidenav.php')?>
             </div>
             <div class="col-md-5">
                 <h5>All Admin</h5>
             
                 
                     <?php 
                     $ad=$_SESSION['admin'];
                     
                     $query="SELECT * from admin where username !='$ad'";
                     $result=mysqli_query($connect,$query);
                     $output="<table class='table table-striped'>
                     <thead>
                     <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Action</th>
                     </tr>
                     </thead> ";
                     if(mysqli_num_rows($result)<1)
                     {
                     $output .="<h5 class='text-center'> No new admin</h5>";
                     }
                     while($row=mysqli_fetch_array($result)){
                         $id=$row['id'];
                         $username=$row['username'];
                        $output .=" 
                        <tr>
                        <td>$id</td>
                        <td>$username</td>
                         <td><a href='admin.php?id=$id' class='btn btn-primary' id='$id'> Delete</a></td>
                        
                        
                        ";
                        
                        }
                        $output .="
                        </tr>
                 
                      
                      </table>  
                        ";
                        echo $output;


                        if(isset($_GET['id']))
                        {
                          $id=$_GET['id'];
                          $sql= "DELETE FROM admin where id=$id";
                        if(  mysqli_query($connect,$sql))
                        {
                        echo "record deleted successfully";
                        header("Refresh: 2; url=admin.php");

                        }
                        else{
                            echo "record not deleted" ;

                        }
                          
                        }
                        

                     ?>
                        
                     
                       
                 
             </div>
             <div class="col-md-5">

             <?php
             if(isset($_POST['addAdmin'])){
                 $username=$_POST['uname'];
                 $password=$_POST['pass'];
                 $image=$_FILES['image']['name'];

                 $error=array();
                 if(empty($username)){
                     $error['u']='Enter the username';

                 }else if(empty($password)){
                    $error['u']='Enter the password';

                }else if(empty($image)){
                    $error['u']='select the image';
                }

                if(count($error)==0)
                {
                    $q="INSERT INTO admin(username,password,profile)VALUES('$username','$password','$image')";
                    $result=mysqli_query($connect,$q);
                    if($result)
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'],"image/$image");
                        header("Refresh: 2; url=admin.php");
                    }
                    

                }
             }
             if(isset($error['u'])){
                 $err=$error['u'];
                 $show="<h6 class='alert alert-danger text-center'>$err</h6>";
             }else{
                 $show="";
             }
  
             ?>
              <h4> Add admin </h4>
                
             <form method="post" enctype="multipart/form-data" >
                 <div>
                     <?php  echo $show ;?>
                 </div>
                 <div class="form-group">
                 <label>Username</label>
                 <input type="text" name="uname" placeholder="Username" class="form-control">
                 </div>
                 <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="pass" placeholder="Password" class="form-control">
                 </div>
                 <div class="form-group">
                 <label>Image</label>
                 <input type="file" name="image"  class="form-control">
                 </div><br>
                 <div class="form-group">
                
                 <input type="submit" name="addAdmin"  class="form-control btn btn-primary">
                 </div>
                 
                 
             </form>



             </div>
        </div>
    </div>
</body>
</html>