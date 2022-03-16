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
             <div class="col-md-10">
                 <h5 class="text-center">All JOB Request</h5>
                 <div id="show"></div>
              </div>
        </div>
    </div>




    <script>
 $(document).ready(function(){
     show();
function show(){

    $.ajax({
        url:'showjob_request.php',
        method:'post',
        success:function(data){
           $('#show').html(data);
        }
    })

    }

    $(document).on('click','.approve',function(){

        var id=$(this).attr('id');
        
        $.ajax({
            url:"ajaxapprove.php",
            data:{id:id},
            method:"POST",
            success:function(data){
                alert('status changed');
               show();
            }
        })
    });

    $(document).on('click','.reject',function(){

var id=$(this).attr('id');


$.ajax({
    url:"ajaxreject.php",
    data:{id:id},
    method:"POST",
    success:function(data){
        alert('status changed');
       show();
    }
})
});

 });


    </script>

</body>

</html>