<?php include('db.php');?>

<html>
    <head>
        <title>Hospital Management</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         
    </head>

<body>
<nav class="navbar navbar-expand-lg navbar-info bg-warning">
  <h5 class="text-white">Hospital Management</h5>
  <div class="me-auto"></div>
  
    <div class="navbar-nav">
      <?php if(isset($_SESSION['admin'])){
        $user=$_SESSION['admin'];
        echo'<a class="nav-item nav-link  text-white active" href="#">'.$user.'</a>
        <a class="nav-item nav-link text-white" href="logout.php">Logout</a>';


      }else if(isset($_SESSION['doctor'])){
        $user=$_SESSION['doctor'];
        echo'<a class="nav-item nav-link  text-white active" href="#">'.$user.'</a>
        <a class="nav-item nav-link text-white" href="../admin/logout.php">Logout</a>';

      }else if(isset($_SESSION['patient'])){
        $user=$_SESSION['patient'];
        echo'<a class="nav-item nav-link  text-white active" href="#">'.$user.'</a>
        <a class="nav-item nav-link text-white" href="../admin/logout.php">Logout</a>';


      } else {
        echo '

      <a class="nav-item nav-link  text-white active" href="index.php">Home</a>
      <a class="nav-item nav-link text-white" href="login.php">Admin</a>
      <a class="nav-item nav-link text-white" href="doctorlogin.php">Doctor</a>
      <a class="nav-item nav-link text-white" href="patientlogin.php">Patient</a>';
      }
      ?>
    </div>
  </div>
  
</nav>
</body>
</html>
