<?php
//connection
$servername="localhost";
$username="root";
$password="";
$database="stuRegSys";

$con = mysqli_connect($servername,$username,$password,$database);
if(!$con){
    echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Cannot connect to $database!!  Error Id:" . mysqli_connect_errno(). "'</strong> 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
//session
session_start(); 
if(!isset($_SESSION['id']) AND $_SESSION['id']!='admin'){
    header('Location: admin.php');
    exit();
}
$roll='';
if(isset($_GET['id'])){
    $roll = $_GET['id'];
}


$sql="DELETE FROM rejected WHERE roll='$roll';";
$result=mysqli_query($con,$sql);
echo ('<script LANGUAGE="JavaScript">window.location.href="admindash.php"; </script>');
?>