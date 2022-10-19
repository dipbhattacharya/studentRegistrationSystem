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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style3.css">
    <style>
        .mainbody{
            display: block;
            /* position:relative; */
            /* margin-top: 6%; */
            margin-left: 7%;
            margin-right: 7%;
            border: 1px solid rgb(255, 255, 255);
            background-color: white;
            padding: 10px 30px;
        }
        .footer{
            position: fixed;
        }
         .headerdash span{
            font-size:xx-large;
            font-weight:600;
            font-family: Times;
        }
        td, th{
    width: 400px;
}
td label{
    font-size: larger;
    font-weight: 700;
}
.mainbody bigger{
    font-size: x-large;
}
.tr{
    border-bottom: 1px solid black;
}
.leftside{
    border:none;
    align-items:center;
}
.right-corner{
    right:0;
    margin-right: 6%;
    position:fixed;
}
        /* student dash style */
    </style>
</head>
<body>
    <nav>
        <div class="logo"><a href="admindash.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class="current"><div><a href="admindash.php">Dashboard</a></div></li>
            <li><div><a href="adminlogout.php">Log out</a></div></li>
        </ul>
    </nav>
    <div class="mainbody">
        <form>
            <span class='headerdash'>Welcome <span>Admin</span></admin>
            <span class="right-corner"><i class="fa-solid fa-building-columns"></i></span>
            <div class="leftside">
                <div class="stulog"><a href="adminview.php?request=submitted"><i class="fa-solid fa-paperclip"></i>&emsp; Pending Forms</a></div>
                <div class="stureg"><a href="adminview.php?request=approved"><i class="fa fa-check-circle"></i></i>&emsp;Approved Forms</a></div>
                <div class="admin"><a href="adminview.php?request=rejected"><i class="fa-solid fa-ban"></i></i>&emsp;Rejected Forms</a></div>
            </div>
        </div>

        </form>
    </div>



    <div class="footer">
        <spam class="ftxt1">This web page is created and maintained by ADMPS Group<br><small>Copyright &copy; 2022, ADMPS Group, All Rights Reserved <img src="justlogo.png" height=20px></small></spam>

        <div class="c_us"><ul><spam class="bigf">Contact Us</spam>
            <li><i class="fa-solid fa-phone"></i> +91 1800 3245 26 &emsp;| &emsp;<i class="fa-solid fa-envelope"></i> wbtech@gmail.com</li>
        </div>
    </div>

</body>
</html>