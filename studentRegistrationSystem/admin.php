<?php
//connection
$servername="localhost";
$username="root";
$password="";
$database="stuRegSys";
session_start();

$con = mysqli_connect($servername,$username,$password,$database);
if(!$con){
    echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Cannot connect to $database!!  Error Id:" . mysqli_connect_errno(). "'</strong> 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>

<style>
    .abody{
    position:fixed;
    top: 40%;
    left: 50%;
    width:30em;
    height:auto;
    margin-top: -9em; 
    margin-left: -15em; 
    border: 1px solid rgb(255, 255, 255);
    background-color: white;
    padding: 30px 30px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0, 0.3);
    }
nav{
    background-color: rgba(67, 67, 67, 0.17);
    border: none;
}
ul{
    font-size: larger;
}
.footer{
    margin-top: 100%;
}
a{
    text-decoration:none;
    color: black;   
}
</style>
</head>
<body>
    <nav>
        <div class="logo"><a href="index.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <a href='admin.php'><i class="fa-solid fa-building-columns"></i>&emsp;Admin Panel</a>
        </ul>
    </nav>

        <div class="abody">
        <form method='post'>
            <div class='modal-body'>
                <h4 class='header'></h4>
                <div><h5 align="center"><i class="fa-solid fa-building-columns"></i>&emsp;Administration Login</h5><br>
                    <input type="text"  name='userid' class='inp inp1 oita' placeholder="Administration ID" required><br>
                    <lable class="aita" for='userid'>Administration ID<br></lable>
                </div>
                <br><br>
                <div>
                    <input type="password" name='password' class='inp inp1 oita' placeholder="Password" required><br>
                    <lable for='password' class='aita'>Password</lable>
                </div><br>
                <br>
                <?php
                if (isset($_POST['yes'])){
                    $id=$_POST['userid'];
                    $pass=$_POST['password'];

                    if($id!=NULL AND $pass!=NULL){
                        if($id=='admin'){
                            if($pass=='admin'){
                                $_SESSION['id']='admin';
                                echo ('<script LANGUAGE="JavaScript">window.location.href="admindash.php";
                                </script>');
                            }
                            else{
                                echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Incorrect password.</div>";
                            }
                        }
                        else{
                            echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Invalid username.</div>";
                        }
                    }
                    else{
                        echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 All fields must be given!</div>";
                    }
                }
                if(isset($_POST['no'])){
                    echo ('<script LANGUAGE="JavaScript">window.location.href="index.php";
                    </script>');
                }
            ?>
                <!-- <p align="center" class="text-danger">This is an Admin only login for.</p><br> -->
            </div>

            <div class='modal-footer'>
                <div class='kire'>
                    <span class='btn'><a class='text-decoration-none text-primary' href='index.php'>Home</a></span>
                    <input type='submit' class='btn btn-primary' value='Sign in' name='yes'>
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