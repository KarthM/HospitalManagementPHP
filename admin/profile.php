<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
    <?php 
    include('../include/db.php');
    
    $ad=$_SESSION['admin'];
              $query="SELECT * FROM admin where username='$ad'";
              $res=mysqli_query($connect,$query);
              while($row=mysqli_fetch_assoc($res))
              {
                $username=$row['username'];
                  $image=$row['profile'];
              }

              
    
    ?>

    <?php include('../include/header.php')
    
    ?>
    <div class="container-fluid">
        <div class="col-md-10">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
              <?php include ('sidenav.php')?>
             </div>
             <div class="col-md-6">
                 <h4>Username:<?php echo $username ?></h4>
                 <form method="post" enctype="multipart/form-data">
                     
                 <img src="<?php echo '../image/'.$image ;?>" height="300px" width="300px" ><br><br>
                 <div class="form-group">
                    
                 <label>Update profile</label> <input type="file" class="form-control" name="profile">
                 </div><br>
                 <div class="text-center">
                 <input type="submit" name="update" class="btn btn-success" value="update">
                 </div>
                 </form>
             </div>

             <?php 
             if(isset($_POST['update'])){
                 $image=$_FILES['profile']['name'];
                 if(empty($image)){

                 }else{
                     $sql="UPDATE admin SET profile='$image' WHERE username='$ad'";
                     $result=mysqli_query($connect,$sql);
                     if($result)
                     {
                         move_uploaded_file($_FILES['profile']['tmp_name'],"image/$image");
                         echo "profile updated successfully";
                         header("Refresh: 2");
                     }else{
                         echo "oops!! errror";
                     }
                 }
             }
             
             
             ?>

             <div class="col-md-4">
                 <form method="post">
                     <h5>Update username</h5>
                     <div class="form-group">
                     <label>username</label>
                     <input type="text" name="uname" placeholder="Username" class="form-control">
                    </div><br>
                     <button type="submit" name="updatename" class="btn btn-success text-center">UpdateName</button>
                 </form>
                 <?php 
                 if(isset($_POST['updatename'])){
                     $username=$_POST['uname'];
                     if(empty($username))
                     {

                     }else{
                     $sql="UPDATE admin SET username='$username' WHERE username='$ad'";
                     $result=mysqli_query($connect,$sql);
                     if($result){
                         $_SESSION['admin']=$username;
                         echo "profileName updated successfully";
                         header("Refresh: 2");
                     }
                     }
                     
                 }
                 
                 ?>
                  <form method="post">
                      
                     <h5 class="m-2">Change Password</h5>
                     <div>
                     <?php 
                 if(isset($_POST['updatepass']))

                   {
                       $old=mysqli_query($connect, "SELECT * FROM admin where username='$ad'");
                        $row=mysqli_fetch_assoc($old);
    
                          $oldpassword=$row['password'];


                        $oldpass=$_POST['opass'];
                         $newpass=$_POST['npass'];
                         $confirmpass=$_POST['cpass'];

                         $error=array();

                         if(empty($newpass)){
                             $error['u']='Enter the newpassword';
        
                         }else if(empty($oldpass)){
                            $error['u']='Enter the old password';
        
                        }else if(empty($confirmpass)){
                            $error['u']='confirm password';
                        }else if($oldpass != $oldpassword){
                            $error['u']="invalid password";
                        }else if($newpass != $confirmpass){
                            $error['u']="password not matched";
                        }
                     if(count($error)==0)
                     {
                        $sql1="UPDATE admin SET password='$newpass' WHERE username='$ad'";
                       $result1= mysqli_query($connect,$sql1);
                       if($result1)
                       {
                        echo '<h5 class="alert alert-success">'.'Password updated successfully!!'.'</h5>';
                           header("Refresh: 2; url=admin.php");
                       }
                     }
                     
                 }
                     
               
                 if(isset($error['u'])){
                    $err=$error['u'];
                    
                  echo '<h5 class="alert alert-danger">'.$err.'</h5>';
                }else{
                    
                }
            
                 
                 ?>



                     </div>
                     <div class="form-group"> 
                     <label>Old Password:</label>
                     <input type="password" name="opass" placeholder="old password" class="form-control">
                    </div><br>
                    <div class="form-group">
                     <label>New Password: </label>
                     <input type="password" name="npass" placeholder="New password" class="form-control">
                    </div><br>
                    <div class="form-group">
                     <label>Confrim Password:</label>
                     <input type="password" name="cpass" placeholder="confrim password" class="form-control">
                    </div><br>
                     <button type="submit" name="updatepass" class="btn btn-success text-center">Change Password</button>
                 </form>

                
             </div>
        </div>
        </div>
    </div>
</body>
</html>