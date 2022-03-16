<?php 
include('../include/db.php');
$id=$_POST['id'];
$sql="DELETE FROM doctors where id='$id'";
$r=mysqli_query($connect,$sql);
if($r){
    echo "record deleted";
}


?>

