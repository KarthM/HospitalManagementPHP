<?php 
include('../include/db.php');

$sql="SELECT * FROM doctors where status='pending' ORDER BY date_reg ASC ";
$run= mysqli_query($connect,$sql);


$output="";


$output .="
<table class='table table-striped'>
<tr style='background-color:#ffc40c;'>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Country</th>
<th>Date_Reg</th>
<th>Actions</th>


";

if(mysqli_num_rows($run)<1){
    $output.="
    <tr><td colspan='8'>No job request yet</td></tr>
    ";
}else{
    while($row=mysqli_fetch_assoc($run))
    $output .="
     <tr class='table-secondary'>
     <td>".$row['id']." </td>
     <td>".$row['firstname']." </td>
     <td>".$row['lastname']." </td>
     <td>".$row['username']." </td>
     <td>".$row['email']." </td>
     <td>".$row['phonenumber']." </td>
     <td>".$row['gender']." </td>
     <td>".$row['country']." </td>
     <td>".$row['date_reg']." </td>
     <td>
      <div class='col-md-12'>
      <div class='row'>
      <div class='col-md-6'> <button id='".$row['id']."' class='btn btn-success approve'>Approve</button></div>
      <div class='col-md-6'> <button id='".$row['id']."' class='btn btn-danger reject'>Reject</button></div>
      </div>
      </div>
     
     
     </td>
     </tr>
    
    ";
}
$output .="

</tr>
</table>
";
echo $output;
?>