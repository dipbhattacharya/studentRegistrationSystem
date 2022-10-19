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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 2</title>
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
    </style>
</head>
<body>
<nav>
        <div class="logo"><a href="studentdash.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class=""><div><a href="studentdash.php">Dashboard</a></div></li>
            <li class="current"><div><a href="form2.php">Forms</a></div></li>
        </ul>
    </nav>


    <div class="mainbody">
        <form method='post'>
        <table>
        <?php
            $sql="SELECT * FROM main WHERE roll= '$id';";
            $result=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <td><img src="logo.png" alt="West Bengal Institute of Technology" height="50px"></td>
                <td><label><bigger>Guardian Details</bigger></label></td>
                <td><label> Form 2/3</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="fname">First Name<spam class="redstar">*</spam></label></td>
                <td><label for="mname">Middle Name</label></td>
                <td><label for="lname">Last Name</label></td>
            </tr>
            <tr>
                <td><input name="fname" class="inp inp1"  placeholder="Enter here..." value='<?php echo $row['gname'] ?>' required></td>
                <td><input name="mname" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['gmname'] ?>'></td>
                <td><input name="lname" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['glname'] ?>'></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="dob">Date of Birth<spam class="redstar">*</spam></label></td>
                <td><label for="gender">Gender<spam class="redstar">*</spam></label></td>
                <td><label for="rel">Relationship<spam class="redstar">*</spam></label>
            </tr>
            <tr></tr>
                <td><input name="dob" class="inp inp1"   type="date" value='<?php echo $row['gdob'] ?>'></td>
                <td>
                    <input name="gender" type="radio" value="Male" class="inp1" required> Male
                    <input name="gender" type="radio" value="Female" class="inp1" required> Female
                    <input name="gender" type="radio" value="Others" class="inp1" required> Others
                </td>
                <td><select name="rel" class="inp inp1" required>
                    <option value="">-- select --</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Aunt">Aunt</option>
                    <option value="Uncle">Uncle</option>
                    <option value="Brother">Brother</option>
                    <option value="Sister">Sister</option>
                    <option value="Grandmother">Grandmother </option>
                    <option value="Grandfather">Grandfather</option>
                    <option value="Others">Others</option>
                </select>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="mobile">Mobile Number<spam class="redstar">*</spam></label></td>
                <td><label for="email">Email id</label></td>
                <td> <label for="occu">Occupation</label></td>
            </tr>
            <tr>
                <td><input name="mob" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['gmob'] ?>' required></td>
                <td><input name="email" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['gemail'] ?>'></td>
                <td><input name="occu" type="text" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['occu'] ?>'></td>
            </td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="address">Permanent Address<spam class="redstar">*</spam></label></td>
                <td><label for="state">State<spam class="redstar">*</spam></label></td>
                <td><label for="pin">PIN<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><textarea name="address" class="inp inp1" placeholder="Enter here" required><?php echo $row['gadd'] ?></textarea></td>
                <td><input type="text" name="state" class="inp inpfixed" value="West Bengal" disabled value='<?php echo $row['gstate'] ?>' required></td>
                <td><input name="pin" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['gpin'] ?>' required></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="city">CITY<spam class="redstar">*</spam></label></td>
                <td><label for="adpt">Address Proof document Type<spam class="redstar">*</spam></label></td>
                <td><label for="adpn">Address Proof documnt Number<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><select name="CITY" class="inp inp1" required>
                    <option value="">-- select --</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Asansol">Asansol</option>
                    <option value="Siliguri">Siliguri</option>
                    <option value="Durgapur">Durgapur</option>
                    <option value="Bardhaman">Bardhaman</option>
                    <option value="Malda">Malda</option>
                    <option value="Baharampur">Baharampur</option>
                    <option value="Habra">Habra</option>
                    <option value="Kharagpur">Kharagpur</option>
                    <option value="Shantipur">Shantipur</option>
                    <option value="Dankuni">Dankuni</option>
                    <option value="Dhulian">Dhulian</option>
                    <option value="Ranaghat">Ranaghat</option>
                    <option value="Haldia">Haldia</option>
                    <option value="Raiganj">Raiganj</option>
                    <option value="Krishnanagar">Krishnanagar</option>
                    <option value="Nabadwip">Nabadwip</option>
                    <option value="Medinipur">Medinipur</option>
                    <option value="Jalpaiguri">Jalpaiguri</option>
                    <option value="Balurghat">Balurghat</option>
                    <option value="Basirhat">Basirhat</option>
                    <option value="Bankura">Bankura</option>
                    <option value="Chakdaha">Chakdaha</option>
                    <option value="Darjeeling">Darjeeling</option>
                    <option value="Alipurduar">Alipurduar</option>
                    <option value="Purulia">Purulia</option>
                    <option value="Jangipur">Jangipur</option>
                    <option value="Bolpur">Bolpur</option>
                    <option value="Bangaon">Bangaon</option>
                    <option value="Cooch Behar">Cooch Behar</option>
                </select></td>
                <td>
                <select name="adpt" class="inp inp1" required>
                    <option value="">-- select --</option>
                    <option value="Aadhaar card">Aadhaar card</option>
                    <option value="Pan Card">Pan Card</option>
                    <option value="Voter Card">Voter Card</option>
                    <option value="others">Others</option>
                </select>
                </td>
                <td><input type="text" name="adpn" class="inp inp1" placeholder="Enter here" value='<?php echo $row['gpaddno'] ?>' required></td>
            </tr>
            <tr class="lasst"><td>&emsp;</td></tr>
        </table><br><br>
        <input type="submit" name="form2" class="btn btn-primary btun" value="Save & Next">
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
          <button type='button' class='btn text-primary'><a href='form1.php' class='text-decoration-none'>Go anyway</a></button>
        </div>
      </div>
    </div>
  </div>

        <?php
            if(isset($_POST['form2'])){
                $gfname=$_POST['fname'];
                $gmname=$_POST['mname'];
                $glname=$_POST['lname'];
                $gdob=$_POST['dob'];
                $ggen=$_POST['gender'];
                $rel=$_POST['rel'];
                $gmob=$_POST['mob'];
                $gemail=$_POST['email'];
                $occu=$_POST['occu'];
                $gadd=$_POST['address'];
                $gstate='West Bengal';
                $gpin=$_POST['pin'];
                $gcity=$_POST['city'];
                $gpadd=$_POST['adpt'];
                $gpaddno=$_POST['adpn'];

                $sql="UPDATE `main` SET `gname` = '$gfname', `gmname` = '$gmname', `glname` = '$glname', `gdob` = '$gdob', `ggen` = '$ggen', `rel` = '$rel', `gmob` = '$gmob', `gemail` = '$gemail', `occu` = '$occu', `gadd` = '$gadd', `gstate` = '$gstate', `gpin` = '$gpin', `gcity` = '$gcity', `gpadd` = '$gpadd', `gpaddno` = '$gpaddno', `submit` = '2' WHERE `main`.`roll` = $id;";
                $result=mysqli_query($con,$sql);
                echo ('<script LANGUAGE="JavaScript">window.location.href="form3.php";
                </script>');
            }
        ?>
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