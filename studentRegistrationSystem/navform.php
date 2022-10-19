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
$id='';
if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit();
}
$id=$_SESSION['id'];

$sql="SELECT * FROM main WHERE roll=$id ;";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
if($row['submit']==NULL){
    echo ('<script LANGUAGE="JavaScript">window.location.href="form1.php";
    </script>');
}
elseif($row['submit']==1){
    echo ('<script LANGUAGE="JavaScript">window.location.href="form2.php";
    </script>');
}
elseif($row['submit']==2){
    echo ('<script LANGUAGE="JavaScript">window.location.href="form3.php";
    </script>');
}
elseif($row['submit']==3){
    echo ('<script LANGUAGE="JavaScript">window.location.href="formview.php";
    </script>');
}
elseif($row['submit']=='submitted'){
    echo ('<script LANGUAGE="JavaScript">window.location.href="formview.php";
    </script>');
}
elseif($row['submit']=='rejected'){
    echo ('<script LANGUAGE="JavaScript">window.location.href="formview.php";
    </script>');
}
elseif($row['submit']=='return'){
    echo ('<script LANGUAGE="JavaScript">window.location.href="form1.php";
    </script>');
}
elseif($row['submit']=='approved'){
    echo ('<script LANGUAGE="JavaScript">window.location.href="formview.php";
    </script>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking</title>
</head>
<body>
    
</body>
</html>