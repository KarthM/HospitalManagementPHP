<?php 
session_start();



if(isset($_SESSION['admin']))
{
    unset($_SESSION['admin']);
    header('location:../index.php');
}
if(isset($_SESSION['doctor']))
{
    unset($_SESSION['doctor']);
    header('location:../index.php');
}
if(isset($_SESSION['patient']))
{
    unset($_SESSION['patient']);
    header('location:../index.php');
}
?>