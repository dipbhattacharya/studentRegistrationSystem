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
if(isset($_POST['form3'])){
    $photo=rand(1000,10000).$id.$_FILES['pa']['name'];
    $tname=$_FILES['pa']['tmp_name'];
    move_uploaded_file($tname,"files/".$photo);

    $sign=rand(1000,10000).$id.$_FILES['sa']['name'];
    $tname=$_FILES['sa']['tmp_name'];
    move_uploaded_file($tname,"files/".$sign);

    $gphoto=rand(1000,10000).$id.$_FILES['ga']['name'];
    $tname=$_FILES['ga']['tmp_name'];
    move_uploaded_file($tname,"files/".$gphoto);

    $gsign=rand(1000,10000).$id.$_FILES['sg']['name'];
    $tname=$_FILES['sg']['tmp_name'];
    move_uploaded_file($tname,"files/".$gsign);

    $marksheet=rand(1000,10000).$id.$_FILES['pmark']['name'];
    $tname=$_FILES['pmark']['tmp_name'];
    move_uploaded_file($tname,"files/".$marksheet);

    $pob=rand(1000,10000).$id.$_FILES['pdob']['name'];
    $tname=$_FILES['pdob']['tmp_name'];
    move_uploaded_file($tname,"files/".$pob);

    $poa=rand(1000,10000).$id.$_FILES['aps']['name'];
    $tname=$_FILES['aps']['tmp_name'];
    move_uploaded_file($tname,"files/".$poa);

    $poag=rand(1000,10000).$id.$_FILES['apg']['name'];
    $tname=$_FILES['apg']['tmp_name'];
    move_uploaded_file($tname,"files/".$poag);

    $sql="UPDATE `main` SET `photo` = '$photo', `sign` = '$sign', `gphoto` = '$gphoto', `gsign` = '$gsign', `marksheet` = '$marksheet', `pob` = '$pob', `poa` = '$poa', `poag` = '$poag', `submit` = '3' WHERE `main`.`roll` = $id;";

    $result=mysqli_query($con,$sql);
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
    <title>Form 3</title>
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
            padding: 30px 30px;
        }
        /* student dash style */

        td, th{
            width:10%;
            height: 40px;
        }
        td label{
            font-size: larger;
            font-weight: 700;
        }
        input[type=radio] {
            width: 7%;
            height: .9em;
        }
        .mainbody bigger{
            font-size: x-large;
        }
        table {
            border-bottom: 1px solid black;
        }
        .btun{
            float: right;
            margin: 1%;
        }
        .inp1{
            font-size: medium;
            border: none;
        }
        .inp:hover{
            border: none;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo"><a href="studentdash.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class=""><div><a href="studentdash.php">Dashboard</a></div></li>
            <li class="current"><div><a href="form3.php">Forms</a></div></li>
        </ul>
    </nav>


    <div class="mainbody">
        <form method='post' enctype="multipart/form-data">
        <table>
            <tr>
                <td><img src="logo.png" alt="Girl in a jacket" height="50px"></td>
                <td><label><bigger>Upload Documents</bigger></label></td>
                <td><label> Form 3/3</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="pa">Photo of applicant</label></td>
                <td><label for="sa">Signature of applicant</label></td>
                <td><label for="ga">Photo of Guardian</label></td>
            </tr>
            <tr>
                <td><input name="pa" class="inp inp1"  type="file" required></td>
                <td><input name="sa" class="inp inp1" type="file" required></td>
                <td><input name="ga" class="inp inp1" type="file" required></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="sg">Signature of Guardian</label></td>
                <td><label for="pmark">Higher Secondary or its equivalent marksheet</label></td>
                <td><label for="pdob">Proof of birth</label></td>
            </tr>
            <tr>
                <td><input name="sg" class="inp inp1" type="file" required></td>
                <td><input name="pmark" class="inp inp1"  type="file" required></td>
                <td><input name="pdob" class="inp inp1" type="file" required></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="aps">Address proof of student</label></td>
                <td><label for="apg">Address proof of Guardian</label></td>
            </tr>
            <tr>
                <td><input name="aps" class="inp inp1" type="file" required></td>
                <td><input name="apg" class="inp inp1"  type="file" required></td>
            </tr>
            <tr class="lasst"><td>&emsp;</td></tr>
        </table><br><br>
        <input type="submit" name="form3" class="btn btn-primary btun" value="Save & Next">
        <button type='button' class='btn btn-secondary btun' data-bs-toggle='modal' data-bs-target='#exampleModal'>Previous Page
  </button>
  
  <!-- Modal -->
  <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'></h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <label>&#x26A0; If you go to the previous page, you might have to re-enter some data.</label>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn text-secondary' data-bs-dismiss='modal'>Close</button>
          <button type='button' class='btn text-primary'><a href='form2.php' class='text-decoration-none'>Go anyway</a></button>
        </div>
      </div>
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