<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Doctors </title>
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
                <h5 class="text-center">All doctors</h5>
                <?php 


$sql="SELECT * FROM doctors where status='APPROVED' ORDER BY date_reg ASC ";
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
<th>Salary</th>
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
     <td>".$row['salary']." </td>
     <td>".$row['date_reg']." </td>
     <td>
      <div class='col-md-12'>
      <div class='row'>
      <div class='col-md-6'> <a href='editdoctor.php?id=".$row['id']."'><button class='btn btn-success edit'>Edit</button></a></div>
      <div class='col-md-6'> <button id='".$row['id']."' class='btn btn-danger delete'>Delete</button></div>
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
                   
                </div>
            </div>
        </div>
    </div>

    <script>
   $(document).ready(function()
    {
       
    $(document).on('click','.delete',function(){

       var id=$(this).attr('id');


    $.ajax({
    url:"deletedoctor.php",
    data:{id:id},
    method:"POST",
    success:function(data){
        alert('Record deleted successfully!!');
       show();
    }
})
});

    })
    </script>
</body>
</html>