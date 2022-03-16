<?php 
include('../include/db.php');
$id=$_POST['id'];
$sql="DELETE FROM patients where id='$id'";
$r=mysqli_query($connect,$sql);
if($r){
    echo "record deleted";
}


?>