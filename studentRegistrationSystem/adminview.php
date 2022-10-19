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
$rq='';
if(isset($_GET['request'])){
    $rq = $_GET['request'];
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style41.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
        #myTable_filter{
          display:none;
}
#myTablee_filter input::-webkit-input-placeholder::before {
  color:#666;
  content:"Line 1\A Line 2\A Line 3\A";
}
        .footer{
          <?php
          if($rq=='rejected'){
            echo "position: relative"; 
          }
          else{
            echo "position: fixed"; 
          }
          ?>
            /* margin-top:; */
        }
        .right-corner{
    /* right:0;
    margin-right: 30px;
    position:fixed; */
    float:right;
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
            <li><div><a href="admindash.php">Dashboard</a></div></li>
            <li class="current"><div><a href="">Review</a></div></li>
            <li><div><a href="adminlogout.php">Log out</a></div></li>
        </ul>
    </nav>
    <div class="mainbody">
      <div class="right-corner">
        <table>
          <form method="post">
          <tr>
            <td>
            <input type="text" class="inp1" placeholder="Search by roll" name="value">&emsp;
            </td>
            <td>
            <button type="submit" class="btn btn-primary" value= "Srearch" name="search"><i class="fa fa-search"></i></button>
            </td>
          </tr>
          </form>
        </table>
        </div>
          <?php
           $search=FALSE;
          if(isset($_POST['search'])){
            $value=$_POST['value'];
            $search=TRUE;
            echo"
            <table class='table modal9' id='myTable'><thead>
            <tr><th colspan='5' align='center'>";
            if($rq=='submitted'){
              echo "<label class='text-primary'>";
            }
            elseif($rq=='approved'){
              echo "<label class='text-success'>";
            }
            elseif($rq=='rejected'){
              echo "<label class='text-danger'>";
            }
              echo"<h4>".$rq." Forms<h4></label></th></tr>
              
          <tr>
            <th scope='col'>Reg No.</th>
            <th scope='col'>HS or Eq. Roll No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Submission Date</th>
            <th scope='col'>Action</th> 
          </tr>
      </thead>
      <tbody>
      ";
          $sql="SELECT * FROM main WHERE roll='$value' AND submit='$rq';";
          $result = mysqli_query($con, $sql);
          $count=mysqli_num_rows($result);
          if($count>0){
          while($row = mysqli_fetch_assoc($result)){ 
            //getting the actual primary id from the database
              $id=$row['serial_no'];
              echo"<tr><td scope='row'>WEBTECH2022C3ENC".$row['serial_no']."</td>
              <td >" . $row['roll'] . "</td>
              <td >" . $row['fname']." ".$row['mname']." ".$row['lname'] . "</td>
              <td>" . $row['time'] . "</td>
              <td>
      
      
              <form method='post' ><button class='btn btn-primary'><a href='formview.php?id=".$row['roll']."' class='text-decoration-none text-light'>View</a></button>
              </form>
              </td>
              </tr>";
          }
        }
        else{
          echo "<tr><td colspan='5' align='center'>No Records</td></tr>";
        }
      }
        ?>
        </tbody>
      </table>

        <table class="table modal9" id='myTable'>
        <thead>
          
      <!-- selecting -->
        <?php
        if(!$search){
        if($rq=='submitted'){
          $sql = "SELECT * FROM main WHERE submit='submitted'";
          echo "<tr><td colspan='5' align='center'><label class='text-primary'><h4>Submitted Forms<h4></label></td></tr>
          <tr>
            <th scope='col'>Reg No.</th>
            <th scope='col'>HS or Eq. Roll No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Submission Date</th>
            <th scope='col'>Action</th> 
          </tr>
          </thead>
          <tbody>
          ";
        }
        elseif($rq=='approved'){
            $sql = "SELECT * FROM main WHERE submit='approved'";
            echo "<tr><th colspan='5' align='center'><label class='text-success'><h4>Approved Forms<h4></label></th></tr>
          <tr>
            <th scope='col'>Reg No.</th>
            <th scope='col'>HS or Eq. Roll No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Submission Date</th>
            <th scope='col'>Action</th> 
          </tr>
      </thead>
      <tbody>
      ";
          }
          elseif($rq=='rejected'){
            $sql = "SELECT * FROM main WHERE submit='rejected'";
            echo "<tr><th colspan='5' align='center'><label class='text-danger'><h4>Rejected Forms<h4></label></th></tr>
          <tr>
            <th scope='col'>Reg No.</th>
            <th scope='col'>HS or Eq. Roll No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Submission Date</th>
            <th scope='col'>Action</th> 
          </tr>
      </thead>
      <tbody>
      ";
          }
          $result = mysqli_query($con, $sql);
          $count=mysqli_num_rows($result);
          if($count>0){
          while($row = mysqli_fetch_assoc($result)){ 
            //getting the actual primary id from the database
              $id=$row['serial_no'];
              echo"<tr><td scope='row'>WEBTECH2022C3ENC".$row['serial_no']."</td>
              <td >" . $row['roll'] . "</td>
              <td >" . $row['fname']." ".$row['mname']." ".$row['lname'] . "</td>
              <td>" . $row['time'] . "</td>
              <td>
      
      
              <form method='post' ><button class='btn btn-primary'><a href='formview.php?id=".$row['roll']."' class='text-decoration-none text-light'>View</a></button>
              </form>
              </td>
              </tr> ";
          }
        }
        else{
          echo "<tr><td colspan='5' align='center'>No Records</td></tr> </tbody>
          </table>";
        }
      }
      if($rq=='rejected'){
        $sql = "SELECT * FROM rejected ;";
            echo "<br><br><table class='table modal9' id='myTablee'><thead><tr><th colspan='5' align='center'><label class='text-danger'><h5>Rejected forms that are deleted by the users.</h5></label></th></tr>
          <tr>
            <th scope='col'>Reg No.</th>
            <th scope='col'>HS or Eq. Roll No.</th>
            <th scope='col'>Name</th>
            <th scope='col'>Action</th>
          </tr>
      </thead>
      <tbody>
      ";
          $result = mysqli_query($con, $sql);
          $count=mysqli_num_rows($result);
          if($count>0){
          while($row = mysqli_fetch_assoc($result)){ 
            //getting the actual primary id from the database
              echo"<tr><td scope='row'>WEBTECH2022C3ENC".$row['serial_no']."</td>
              <td >" . $row['roll'] . "</td>
              <td >" . $row['name'] . "</td>
              <td><button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#exampleModal'>Remove
              </button>
              
              <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLabel'></h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <label>&#x26A0; By removing this form from the rejected list, you are giving the applicant the right to re-register. </label>
                    </div>
                    <form method='post'>
                    <div class='modal-footer'>
                      <button type='button' class='btn text-secondary' data-bs-dismiss='modal'>Close</button>"; 
                      $roll=$row['roll'];
                      echo " 
                      <button type='button' class='btn text-primary' name='remove' value='Remove'><a class='text-decoration-none' href='remove.php?id=".$roll."'>Remove</a></button>
                      ";
              echo"
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              ";
              
            }
        }
      }
        ?>
      </td></tr></tbody></table>

    </div>



    <div class="footer">
        <spam class="ftxt1">This web page is created and maintained by ADMPS Group<br><small>Copyright &copy; 2022, ADMPS Group, All Rights Reserved <img src="justlogo.png" height=20px></small></spam>

        <div class="c_us"><ul><spam class="bigf">Contact Us</spam>
            <li><i class="fa-solid fa-phone"></i> +91 1800 3245 26 &emsp;| &emsp;<i class="fa-solid fa-envelope"></i> wbtech@gmail.com</li>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
$('#myTable').dataTable({
    "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    "iDisplayLength": 5
});
} );
</script> 
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<script>
  $(document).ready(function() {
$('#myTablee').dataTable({
  "aLengthMenu": [[2, 4, 8, -1], [2, 4, 8, "All"]],
  "iDisplayLength": 2
});
} );
</script> 
<script>
  $(document).ready(function () {
      $('#myTablee').DataTable();
  });
</script>
</body>
</html>