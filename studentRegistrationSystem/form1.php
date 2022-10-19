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
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
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
        }
        .redstar{
    font-weight:normal;
    color: red;
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
            <li class="current"><div><a href="form1.php">Forms</a></div></li>
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
                <td><img src="logo.png" alt="Girl in a jacket" height="50px"></td>
                <td><label><bigger>Student Details</bigger></label></td>
                <td><label> Form 1/3</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="fname">First Name<spam class="redstar">*</spam></label></td>
                <td><label for="mname">Middle Name</label></td>
                <td><label for="lsame">Last Name</label></td>
            </tr>
            <tr>
                <td><input name="fname" class="inp inpfixed" value="<?php echo $row['fname'] ?>"  disabled></td>
                <td><input name="mname" class="inp inpfixed" value="<?php echo $row['mname'] ?>" disabled></td>
                <td><input name="lsame" class="inp inpfixed" value="<?php echo $row['lname'] ?>" disabled></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="dob">Date of Birth<spam class="redstar">*</spam></label></td>
                <td><label for="gender">Gender<spam class="redstar">*</spam></label></td>
                <td><label for="religion">Religion<spam class="redstar">*</spam></label>
            </tr>
            <tr></tr>
                <td><input name="dob" class="inp inpfixed" type="date" value='<?php echo $row['dob'] ?>' disabled></td>
                <td>
                    <input name="gender" type="radio" value="Male" class="inp1" required='true'> Male
                    <input name="gender" type="radio" value="Female" class="inp1" required='true'> Female
                    <input name="gender" type="radio" value="Others" class="inp1" required='true'> Others
                </td>
                <td><select name="religion" class="inp inp1" required>
                    <option value="">-- select --</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="christian">Christian</option>
                    <option value="Islam">Islam</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Atheism">Atheism</option>
                </select>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="mobile">Mobile Number<spam class="redstar">*</spam></label></td>
                <td><label for="email">Email id<spam class="redstar">*</spam></label></td>
                <td> <label for="caste">Caste<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><input name="mob" class="inp inpfixed" disabled value='<?php echo $row['mob'] ?>'></td>
                <td><input name="email" class="inp inpfixed" disabled value='<?php echo $row['email'] ?>'></td>
                <td>
                    <select name="caste" class="inp inp1" required>
                        <option value="">-- select --</option>
                        <option value="GEN">GEN</option>
                        <option value="OBC">OBC</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="address">Permanent Address<spam class="redstar">*</spam></label></td>
                <td><label for="state">State<spam class="redstar">*</spam></label></td>
                <td><label for="pin">PIN<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><textarea name="address" class="inp inp1"  type="date" placeholder="Enter here" required><?php echo $row['addr'] ?></textarea></td>
                <td><input type="text" name="state" class="inp inpfixed" value="West Bengal" disabled></td>
                <td><input name="pin" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['pin'] ?>' required=''></td>
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
                    <td><input type="text" name="adpn" class="inp inp1" placeholder="Enter here" value='<?php echo $row['paddno'] ?>' required></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="phc">Physically Challenged?<spam class="redstar">*</spam></label></td>
                <td><label for="dphc">If yes, please describe the disability</label></td>
            </tr>
            <tr>
                <td>
                    <select name="phc" class="inp inp1" required>
                        <option>-- yes/no --</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
                    <td><textarea name="dphc" class="inp inp1" placeholder="Enter here"><?php echo $row['dis'] ?></textarea></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan="3" align="center"><bigger>Higher Secondary or its equivalent</bigger></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="hsboard">Board<spam class="redstar">*</spam></label></td>
                <td><label for="roll">Roll No<spam class="redstar">*</spam></label></td>
                <td><label for="pdate">Passing Date<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><input name="hsboard" class="inp inpfixed"  placeholder="HS BOard" disabled value='<?php echo $row['board'] ?>'></td>
                <td><input type="text" name='roll' class='inp inpfixed' placeholder="example : Roll No" disabled value='<?php echo $row['roll'] ?>'></td>
                <td><input type="date" name='pdate' class='inp inpfixed' disabled value='<?php echo $row['pdate'] ?>'></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label for="obtmr">Obtained Marks<spam class="redstar">*</spam></label></td>
                <td><label for="tmark">Out Of<spam class="redstar">*</spam></label></td>
            </tr>
            <tr>
                <td><input name="obtmr" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['marks'] ?>' required></td>
                <td><input name="tmark" class="inp inp1" placeholder="Enter here..." value='<?php echo $row['fmarks'] ?>' required></td>
            </tr>

            <tr class="lasst"><td>&emsp;</td></tr>
        </table><br><br>
        <input type="submit" name="form1" class="btn btn-primary btun" value="Save & Next">
        <?php
            if(isset($_POST['form1'])){
                $gen=$_POST['gender'];
                $reli=$_POST['religion'];
                $caste=$_POST['caste'];
                $add=$_POST['address'];
                $state='West Bengal';
                $pin=$_POST['pin'];
                $city=$_POST['city'];
                $padd=$_POST['adpt'];
                $paddno=$_POST['adpn'];
                $phch=$_POST['phc'];
                $dis=$_POST['dphc'];
                $marks=$_POST['obtmr'];
                $tmarks=$_POST['tmark'];
                $sql="UPDATE `main` SET `gen` = '$gen', `reli` = '$reli', `caste` = '$caste', `addr` = '$add', `state` = '$state', `pin` = '$pin', `city` = '$city', `padd` = '$padd', `paddno` = '$paddno', `phch` = '$phch', `dis` = '$dis', `marks` = '$marks', `fmarks` = '$tmarks', `submit` = '1' WHERE `main`.`roll` = $id;";
                $result=$result=mysqli_query($con,$sql);

                echo ('<script LANGUAGE="JavaScript">window.location.href="form2.php";
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