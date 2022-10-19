<?php
//connection
include 'formview.php';
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
$id='';
if(isset($_GET['id']) AND $_SESSION['id']=='admin'){
    $id = $_GET['id'];
}
if(!isset($_SESSION['id']) AND $_SESSION['id']!='admin'){
    header('Location: admin.php');
    exit();
}
$sql="SELECT * FROM main WHERE roll='$id';";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style41.css">
</head>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="ssubmit" hidden>Butt
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModal"></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
          <small>The form id is: WEBTECH2022C3ENC<?php echo $row['serial_no']?></small><br><br>
          <form method='post'>
            <label>	<span class="text-danger">&#9888;</span> By returning this form you are giving the applicant the right of editing and re-submitting it.</label><br><br>
            <textarea class="inp1 oita" name="cause" placeholder="What is the cause of this return?" rows="3" required></textarea><br>
            <label for="cause" class="aita">Suggest an adit to the applicant.</label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn text-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn text-primary" value="Return" name="return">
        </div>
    </form>
    <?php
    if(isset($_POST['return'])){
        $cause=$_POST['cause'];
        $sql="UPDATE `main` SET `submit` = 'return', `time`=now() WHERE `main`.`roll` = $id;";
        $result=mysqli_query($con,$sql);
        $sql="INSERT INTO `statustable` (`roll`, `submit`, `remark`) VALUES ('$id', 'return', '$cause');";
        $result=mysqli_query($con,$sql);
        echo ('<script LANGUAGE="JavaScript">window.location.href="admindash.php";
        </script>');
    }
    ?>
    </div>
  </div>
</div>
    <script type="text/javascript">
        document.getElementById("ssubmit").click();
    </script>
</body>
</html>