<?php
include "studentdash.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting</title>
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
        <label>Are you sure you want to delete this form?</label>
          <form method='post'>
        <div class="modal-footer">
            <button type="button" class="btn text-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn text-primary" value="Delete" name="delete">
        </div>
    </form>
    <?php
    if(isset($_POST['delete'])){
        $sql="SELECT * FROM main WHERE roll='$mid';";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row['submit']=='rejected'){
            $name=$row['fname']." ".$row['mname']." ".$row['lname'];
            $sn=$row['serial_no'];
            $roll=$row['roll'];
            $sql="INSERT INTO `rejected` (`serial_no`, `roll`, `name`) VALUES ('$sn', '$roll', '$name');";
            $result=mysqli_query($con,$sql);
        }
        $sql="DELETE FROM main WHERE `main`.`roll` = $mid";
        $result=mysqli_query($con,$sql);
        $sql="DELETE FROM statustable WHERE `statustable`.`roll` = $mid";
        $result=mysqli_query($con,$sql);
        echo ('<script LANGUAGE="JavaScript">window.alert("User Deleted!");window.location.href="login.php";
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