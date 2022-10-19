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

session_start();
$mid='';
$id='';
if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit();
}
$id=$_SESSION['id'];
$mid=$_SESSION['id'];
$checkNote="SELECT * FROM main WHERE roll= '$id';";
$result=mysqli_query($con,$checkNote);
$row = mysqli_fetch_assoc($result);
$id=$row['fname']." ".$row['mname']." ".$row['lname'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style3.css">

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
        .footer{
            position: fixed;
        }
         .headerdash span{
            font-size:large;
            font-weight:600;
        }
        td, th{
    width: 400px;
}
td label{
    font-size: larger;
    font-weight: 700;
}
.mainbody .bigger{
    font-size: larger;
}
.tr{
    border-bottom: 1px solid black;
    height: 42px;
}
.right-corner{
    float:right;
}
        /* student dash style */
    </style>
</head>
<body>
    <nav>
        <div class="logo"><a href="studentdash.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class="current"><div><?php echo'<a href="studentdash.php">Dashboard</a>'?></div></li>
            <li class=""><div><a href="navform.php">Forms</a></div></li>
            <li class="menuarea"><div><a href="#">Account</a>
                <div class="dropdown-mnu">
                    <a href="stulogout.php">Log Out</a>
                    <a href="delete.php" class="text-danger">Delete Account</a>
                </div></div></li>
        </ul>
    </nav>
    <div class="mainbody">
        <form>
            <span class='headerdash'>Welcome <span class='bigger'><?php echo$id?></span>&emsp;
            <span class="right-corner">Reg No: WEBTECH2022C3ENC<?php echo $row['serial_no']?></span>
            <?php 
                $sql="SELECT * FROM main WHERE roll=$mid ;";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                if($row['submit']=='submitted'){
                    echo"<spam class='alert alert-primary  alert-dismissible fade show' role='alert'>Your registration  <a href='navform.php' class='text-primary'>form</a> has been submitted to the administration.</spam></span><br><br><br>";
                }
                elseif($row['submit']=='approved'){
                    echo"<spam class='alert alert-success  alert-dismissible fade show' role='alert'>Your registration  <a href='navform.php' class='text-success'>form</a> has been approved by the administration.</spam></span><br><br><br>";
                }
                elseif($row['submit']=='rejected'){
                    echo"<spam class='alert alert-danger  alert-dismissible fade show' role='alert'>Your registration  <a href='navform.php' class='text-danger'>form</a> has been rejected by the administration.</spam></span><br><br><br>";
                }
                elseif($row['submit']=='return'){
                    echo"<spam class='alert alert-danger  alert-dismissible fade show' role='alert'>your registration form is not submitted. Please <a href='navform.php' class='text-danger'>complete</a> and submit it.</spam></span><br><br><br>";
                }
                elseif($row['submit']==''){
                    echo"<spam class='alert alert-danger  alert-dismissible fade show' role='alert'>your registration form is not submitted. Please <a href='navform.php' class='text-danger'>complete</a> and submit it.</spam></span><br><br><br>";
                }
            ?>
            <div align="center">
            <table id="myTable" class="display">
                <thead>
                <tr class='tr'>
                    <th></th>
                    <th align="center">Status</th>
                    <th align="center">Time</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM statustable WHERE roll= $mid;";
                $result = mysqli_query($con, $sql);
                $sno=0;
                while($row = mysqli_fetch_assoc($result)){ 
                    //getting the actual primary id from the database
                    $sno=$sno+1;
                    echo"
                    <tr class='tr'><td scope='row'>".$sno."</td>"; 
                    if($row['submit']=='submitted'){
                        echo "<td><span class='text-primary'>Your form is submitted successfully.</span></td>";
                    }
                    elseif($row['submit']=='rejected'){
                        echo "<td><span class='text-danger'>Your form has been rejected.</span></td>
                        ";
                    }
                    elseif($row['submit']=='return'){
                        echo "<td><span class='bg-warning text-dark'>Your form has been returned.</span></td>
                        ";
                    }
                    elseif($row['submit']=='approved'){
                        echo "<td><span class='text-success'>Your form has been Approved.</span></td>
                        ";
                    }
                    echo "<td align='center'>" . $row['time'] . "</td>
                    <td>
                    ".$row['remark']."
                    </td>
                    </tr>
                    ";
                }
                ?>
                </tbody>

            </table>
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
</html>