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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Register</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style2.css">
<style>
    .modal-header h5{
        padding-left: 15%;
        font-size: x-large;
    }
    .modal{
    --bs-modal-width: 60%;
}
.modal-footer{
    justify-content: normal;
}
</style>
</head>
<body>

<!-- navigation bar -->

    <nav>
        <div class="logo"><a href="index.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class=""><div><a href="index.php">Home</a></div></li>
            <li class="menuarea current"><div><a href="#">Forms</a>
                <div class="dropdown-mnu">
                    <a href="register.php">New Registration Form</a>
                </div></div></li>
            <li class="menuarea "><div><a href="#">Account</a>
                <div class="dropdown-mnu">
                    <a href="login.php">login</a>
                    <a href="admin.php">Admin login</a>
                </div></div></li>
            <li><div><a href="notice.php" target='blank'>Notice</a></div></li>
            <li><div><a href="aboutus.php" target='blank'>About us</a></div></li>
        </ul>
    </nav>

 <!-- MAin body -->

    <div class="mainbody">
        <div class="leftside">
            <div class="stulog"><a href="login.php"><i class="fa-solid fa-graduation-cap"></i>&emsp; Student Login</a></div>
            <div class="stureg"><a href="register.php"><i class="fa-solid fa-paperclip"></i>&emsp;New Registration Form</a></div>
            <div class="admin"><a href="admin.php"><i class="fa-solid fa-building-columns"></i>&emsp;Administration login</a></div>
        </div>

        <!-- Right side  -->

        <div class="rightside">

            <!-- image -->
            <div class="slideshow-container">

                <div class="mySlides slide">
                  <img src="https://media.istockphoto.com/photos/businesswoman-holding-a-speech-picture-id1254127323?k=20&m=1254127323&s=612x612&w=0&h=Y179XccJxpHGDweJCAZ1tnEy3fu5b4WuL0bCymofraA=" style="width:100%; height: 400px;">
                  <div class="text">The 378 faculty members in the WBTECH have won almost every major research and teaching award you can think of, they have a strong tradition of national service, and they are prolific inventors and originators of commercial enterprises.</div>
                </div>
                
                <div class="mySlides slide">
                  <img src="https://www.btc.edu.za/wp-content/uploads/2019/11/acadamic.jpg" style="width: 100%; height: 400px">
                  <div class="text">100% Merit Scholarship / Financial Aid (Number of Scholarships @ 5% of total intake) for the total duration of the program.</div>
                </div>
                
                <div class="mySlides slide">
                  <img src="https://media.istockphoto.com/photos/young-man-with-medical-mask-elearning-at-home-due-to-covid19-or-picture-id1220609085?k=20&m=1220609085&s=612x612&w=0&h=lM_mir7GgDgNonvvDVsSnI2lONng0PdKpUqQ3W7RZDA=" style="width:100%; height: 400px; ">
                  <div class="text">Learn online and earn valuable credentials from our top faculties and leading companies like Google and IBM.</div>
                </div>
            </div>
            <br>
                
            <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
            </div>
        </div>
        <div class="rule"><h5><i class="fa-solid fa-clipboard-check"></i> Who Can Register ?</h5>
            <ol>
                <li>The student must have passed at least Higher Secondary or its equivalent examination.</li>
                <li>The student must have secured at least 75 percent marks in the Higher Secondary or its equivalent examination.</li>
                <li>This registration portal is for now only for students who have been residing in West Bengal for the last 5 years.</li>
                <li>The ethnicity of the student should be Indian.</li>
                <li>If the student has not applied earlier or if his application has been returned, can register.</li>
                <li>Those whose applications were rejected will not be able to re-register through this portal.</li>
            </ol>
        </div>
    </div>
<!-- Footer -->
    <div class="footer">
        <spam class="ftxt1">This web page is created and maintained by ADMPS Group<br><small>Copyright &copy; 2022, ADMPS Group, All Rights Reserved <img src="justlogo.png" height=20px></small></spam>

        <div class="c_us"><ul><spam class="bigf">Contact Us</spam>
            <li><i class="fa-solid fa-phone"></i> +91 1800 3245 26 &emsp;| &emsp;<i class="fa-solid fa-envelope"></i> wbtech@gmail.com</li>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();
        
        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>



<!-- modal  -->
    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' id='ssubmit' hidden>
    </button>
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'><h5> New Registration Form</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <form method='POST' id="regform">
                    <div class='modal-body'>
                        <table>
                        <tr>
                            <th>
                                <lable for='fname'>Full Name<spam class="redstar">*</spam></lable>
                            </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        </tr>
                        <tr>
                            <td><input type="text"  name='fname' class='inp inp1 oita' placeholder="First Name" required=''><br>
                                <label for="fname" class="aita">First Name<spam class="redstar">*</spam></label></td>
                            <td><input type="text" name='mname' class='inp inp1 oita' placeholder="Middle Name"><br>
                                <label for="mname" class="aita">Middle Name</label>
                            </td>
                            <td><input type="text" name='lname' class='inp inp1 oita' placeholder="Last Name"><br>
                                <label for="lname" class="aita">Last Name</label></td>
                        </tr>
                        <tr><td>&emsp;</td></tr>
                        <tr>
                            <td><lable for='dob'>Date of Birth<spam class="redstar">*</spam></lable></td>
                            <td><lable for='mobno'>Mobile Number<spam class="redstar">*</spam></lable></td>
                            <td><lable for='email'>Email id<spam class="redstar">*</spam></lable></td>
                        </tr>
                        <tr>
                            <td><input type="date"  name='dob' class='inp inp1' required=''></td>
                            <td><input type="mobile" name='mobno' class='inp inp1' placeholder="+91" required=''></td>
                            <td><input type="mail" name='email' class='inp inp1' placeholder="example@domain.com" required=''></td>
                        </tr>
                        <tr><td>&emsp;</td></tr>
                        <tr>
                            <td><label for="board"><small>Higher Secondary or its equivalent board<spam class="redstar">*</spam></small></label></td>
                            <td><label for="roll"><small>Higher Secondary or its equivalent board Roll Number<spam class="redstar">*</spam></small></label></td>
                            <td><label for="pdate"><small>Higher Secondary or its equivalent board examination passing date<spam class="redstar">*</spam></small></label></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="board" class="inp inp1" required>
                                    <option value=''>-- select --</option>
                                    <option value="Central Board of Secondary Education">Central Board of Secondary Education</option>
                                    <optio value="Council for Indian School Certificate Examination">Council for Indian School Certificate Examination</option>
                                        <option value="Indian Certificate of Secondary Education">Indian Certificate of Secondary Education</option>
                                        <option value="West Bengal Council of Higher Secondary Education">West Bengal Council of Higher Secondary Education</option>
                                  </select>
                            </td>
                            <td><input type="text" name='roll' class='inp inp1' placeholder="This will be your user id" required=''></td>
                            <td><input type="date" name='pdate' class='inp inp1'required='' ></td>
                        </tr>
                        <tr><td>&emsp;</td></tr>
                        <td><label for="pass">Password<spam class="redstar">*</spam></label></td>
                        <td><label for="cpass">Confirm Password<spam class="redstar">*</spam></label></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="pass" class="inp inp1" required=''></td>
                            <td><input type="password" name="cpass" class="inp inp1" required=''></td>
                        </tr>
                        </table>
                        <br><br>
                    </div>
                    
                    
                    <div class='modal-footer'>
                        <span>Already have an account? <a href="login.php">Login</a></span>
                        <div class='kire'>
                            <input type='button' class='btn btn-secondary' data-bs-dismiss='modal' name='no' value='Cancel'>
                            <input type='submit' class='btn btn-primary' value='Sign up' name='yes'>
                        </div>
                    </div>
                </form>
                <?php
                        if (isset($_POST['yes'])){
                            $fname=$_POST['fname'];
                            $mname=$_POST['mname'];
                            $lname=$_POST['lname'];
                            $dob=$_POST['dob'];
                            $mobno=$_POST['mobno'];
                            $email=$_POST['email'];
                            $board=$_POST['board'];
                            $roll=$_POST['roll'];
                            $pdate=$_POST['pdate'];
                            $pass=$_POST['pass'];
                            $cpass=$_POST['cpass'];

                            if($fname!=NULL AND $dob!=NULL AND $mobno!=NULL AND $email!=NULL AND $board!=NULL AND $roll!=NULL AND $pass!=NULL AND $cpass!=NULL){
                                $checkNote="SELECT * FROM main WHERE roll= '$roll';";
                                $result=mysqli_query($con,$checkNote);
                                $count=mysqli_num_rows($result);
                                if($count>0){
                                    echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Can't register with this Roll No. (May be an existing one or a rejected one)</div>";
                                }
                                else{
                                $checkNote="SELECT * FROM rejected WHERE roll= '$roll';";
                                $result=mysqli_query($con,$checkNote);
                                $count=mysqli_num_rows($result);
                                if($count>0){
                                    echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Can't register with this Roll No. (May be an existing one or a rejected one)</div>";
                                }
                                else{
                                    $checkNote="SELECT * FROM main WHERE mob= '$mobno';";
                                $result=mysqli_query($con,$checkNote);
                                $count=mysqli_num_rows($result);
                                if($count>0){
                                    echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 This mobile number already exists.</div>";
                                }
                                else{
                                    $checkNote="SELECT * FROM main WHERE email= '$email';";
                                    $result=mysqli_query($con,$checkNote);
                                    $count=mysqli_num_rows($result);
                                    if($count>0){
                                        echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Email address already exists.</div>";
                                    }
                                    else{
                                    if($pass==$cpass){
                                        $sql="INSERT INTO `main` (`serial_no`, `fname`, `mname`, `lname`, `dob`, `mob`, `email`, `board`, `roll`, `pdate`, `pass`, `gen`, `reli`, `caste`, `addr`, `state`, `pin`, `city`, `padd`, `paddno`, `phch`, `dis`, `marks`, `fmarks`, `gname`, `gmname`, `glname`, `gdob`, `ggen`, `rel`, `gmob`, `gemail`, `occu`, `gadd`, `gstate`, `gpin`, `gcity`, `gpadd`, `gpaddno`, `photo`, `sign`, `gphoto`, `gsign`, `marksheet`, `pob`, `poa`, `poag`, `submit` ) VALUES (NULL, '$fname', '$mname', '$lname', '$dob', '$mobno', '$email', '$board', '$roll', '$pdate', '$pass', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');";
                                        $result = mysqli_query($con,$sql);
                                        echo"no";
                                        if($result){
                                            $msg="<spam class='text-success'>Account created successfully. Login to complete the registration process.</spam>";
                                            echo ('<script LANGUAGE="JavaScript">window.location.href="regSuccess.php?message='.$msg.'";
                                            </script>');
                                        }
                                        else{
                                            echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>Unknown error!!</div>";
                                        }
                                    }
                                    else{
                                        echo"<div class='alert alert-danger  alert-dismissible fade show' role='alert'>&#9888 Password and Confirm Password must be same!!</div>";
                                    }
                                }
                            }
                                }
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
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
        document.getElementById("ssubmit").click();
    </script>

</html>