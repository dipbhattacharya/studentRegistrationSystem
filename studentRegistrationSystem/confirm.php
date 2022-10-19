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
include 'formview.php';

session_start();
$id='';
$rq='';
if(isset($_GET['id']) AND $_SESSION['id']=='admin'){
    $id = $_GET['id'];
    $rq=$_GET['rq'];
}
    
$sql="SELECT * FROM main WHERE roll= '$id';";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging out...;</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style4.css">
<style>
    .inp1{
        border: 2px solid green;
    }
</style>
</head>
<body>
<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' id='ssubmit' hidden>
    </button>
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>  
                <div class="body">
                    <form method='post'>
                    <?php
                    if($rq=='reject'){
                        echo "<span><span class='text-danger'>&#9888;</span> Are you sure you want to reject this form?</span>";
                    }
                    elseif($rq=='approved'){
                        echo "<span><span class='text-danger'>&#9888;</span> Are you want to approve this registration request?</span>";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                        <input type='button' class='btn text-secondary' data-bs-dismiss='modal' name='no' value='Cancel'>
                        <input type='submit' class='btn text-primary' value='yes' name='yes'>
                        <?php
                    if(isset($_POST['yes']) AND $rq=='reject'){
                        $sql="UPDATE `main` SET `submit` = 'rejected', `time`=now() WHERE `main`.`roll` = $id;";
                        $result=mysqli_query($con,$sql);
                        $sql="INSERT INTO `statustable` (`roll`, `submit`, `remark`) VALUES ('$id', 'rejected', '');";
                        $result=mysqli_query($con,$sql);
                        echo ('<script LANGUAGE="JavaScript">window.location.href="adminview.php?request=rejected";
                            </script>');
                    }
                    if(isset($_POST['yes']) AND $rq=='approved'){
                        $sql="UPDATE `main` SET `submit` = 'approved', `time`=now() WHERE `main`.`roll` = $id;";
                        $result=mysqli_query($con,$sql);
                        $sql="INSERT INTO `statustable` (`roll`, `submit`, `remark`) VALUES ('$id', 'approved', '');";
                        $result=mysqli_query($con,$sql);
                        echo ('<script LANGUAGE="JavaScript">window.location.href="adminview.php?request=approved";
                            </script>');
                    }
                    if(isset($_POST['no'])){
                        echo ('<script LANGUAGE="JavaScript">window.location.href="studentdash.php";
                            </script>');
                    }
                    
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("ssubmit").click();
    </script>
</body>
</html>