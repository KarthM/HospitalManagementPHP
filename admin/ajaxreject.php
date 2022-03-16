<?php 


include('../include/db.php');

$id=$_POST['id'];
$query="UPDATE doctors SET status='Rejected' where id=$id";

$res=mysqli_query($connect,$query);
if($res){
    echo "<script>alert('status changed')</script>";
}else{
    echo "<script>alert('whoops error')</script>";
}

?>