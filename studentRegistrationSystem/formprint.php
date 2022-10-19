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
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style3.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" ></script>
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


    <div class="mainbody" >
        <form method='post' enctype="multipart/form-data">
        <table id="whatToPrint">
        <?php
            $sql="SELECT * FROM main WHERE roll= '$id';";
            $result=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <td><img src="logo.png" alt="WEBTECH" height="50px"></td>
                <td colspan=2 align='center'><label><bigger>Student Registration Form</bigger></label></td>
                <td><label>Reg No:  WEBTECH2022C3ENC<?php echo $row['serial_no'] ?></label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan=4 align='center' class="break"><label>Applicant Personal Details</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label>Applicant Name:</label></td>
                <td><label><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></label></td>
                <td rowspan=2><?php 
                $link="files/".$row['photo'];
                echo"<img src='".$link."' alt='!' height='120px'>";
                ?></td>
                <td rowspan=2><?php 
                $link="files/".$row['sign'];
                echo"<img src='".$link."' alt='!' height='120px'>";
                ?></td>
            </tr>
            <tr>
                <td><label>Date of Birth:</label></td>
                <td><label><?php echo $row['dob']?></label></td>
            </tr>
            <tr>
                <td><label>Gender:</label></td>
                <td><label><?php echo $row['gen']?></label></td>
            </tr>
            <tr>
                <td><label>Religion:</label></td>
                <td><label><?php echo $row['reli']?></label></td>
            </tr>
            <tr>
                <td><label>Caste:</label></td>
                <td><label><?php echo $row['caste']?></label></td>
            </tr>
            <tr>
                <td><label>Mobile:</label></td>
                <td><label>+91&emsp;<?php echo $row['mob']?></label></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td colspan="3"><label><?php echo $row['email']?></label></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td colspan="3"><label><?php echo $row['add']." ".$row['city']." ".$row['state']." ".$row['pin'] ?></label></td>
            </tr>
            <tr>
                <td><label>Address Proof:</label></td>
                <td><label><?php echo $row['padd']?></label></td>
            </tr>
            <tr>
                <td><label>Address Proof Number:</label></td>
                <td colspan="3"><label><?php echo $row['paddno']?></label></td>
            </tr>
            <tr>
                <td><label>Physically Challenged:</label></td>
                <td><label><?php echo $row['phch']?></label></td>
                <td colspan="2"><label><?php echo $row['dis']?></label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan=4 align='center' class="break"><label>Applicant Educational Details</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan=4 align='center'><b>    <spam class="redstar">*</spam></label>Higher Secondary or its equivalent</b></td>
            </tr>
            <tr>
                <td><label>Board:</label></td>
                <td colspan="3"><label><?php echo $row['board']?></label></td>
            </tr>
            <tr>
                <td><label>Roll No:</label></td>
                <td><label><?php echo $row['roll']?></label></td>
            </tr>
            <tr>
                <td><label>Marks:</label></td>
                <td><label><?php
                    $result=$row['marks']/$row['fmarks'];
                    $result=$result*100;
                    echo round($result, 2)."%";
                    ?></label>
                </td>
            </tr>
            <tr>
                <td><label>Passing Date:</label></td>
                <td><label><?php echo $row['pdate']?></label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan=4 align='center' class="break"><label>Guardian Details</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td><label>Guardian Name:</label></td>
                <td><label><?php echo $row['gname']." ".$row['gmname']." ".$row['glname'] ?></label></td>
            </tr>
            <tr>
                <td><label>Date of Birth:</label></td>
                <td><label><?php echo $row['gdob']?></label></td>
            </tr>
            <tr>
                <td><label>Gender:</label></td>
                <td><label><?php echo $row['ggen']?></label></td>
            </tr>
            <tr>
                <td><label>Relationship:</label></td>
                <td><label><?php echo $row['rel']?></label></td>
            </tr>
            <tr>
                <td><label>Occupation:</label></td>
                <td><label><?php echo $row['occu']?></label></td>
            </tr>
            <tr>
                <td><label>Contact Details:</label></td>
                <td><label>+91&emsp;<?php echo $row['gmob']?></label></td>
                <td><label><?php echo $row['gemail']?></label></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td colspan="3"><label><?php echo $row['gadd']." ".$row['gcity']." ".$row['gstate']." ".$row['gpin'] ?></label></td>
            </tr>
            <tr>
                <td><label>Address Proof:</label></td>
                <td><label><?php echo $row['gpadd']?></label></td>
            </tr>
            <tr>
                <td><label>Address Proof Number:</label></td>
                <td><label><?php echo $row['gpaddno']?></label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <?php
            if($row['submit']=='submitted' OR $row['submit']=='approved'){
            echo"<tr>
                <td colspan=4 align='center' class='break'><label>Registration information</label></td>
            </tr>
            <tr><td>&emsp;</td></tr>
            <tr>
                <td colspan='2'><label>Registration Id:</label></td>
                <td><label>WEBTECH2022C3ENC".$row['serial_no']."</label></td>
            </tr>
            <tr>
                <td colspan='2'><label>Registration Submitted at:</label></td>
                <td><label>".$row['time']."</label></td>
            </tr>
            <tr>
                <td colspan='2'><label>Registration Status:</label></td>
                <td><label>";
                    if($row['submit']=='submitted'){
                        echo"<span class='text-primary'>Submitted</span>";
                    }
                    elseif($row['submit']=='approved'){
                        echo"<span class='text-success'>Approved</span>";
                    }
                    echo"</label></td>
                    </tr>";
                }
                ?>
                 <tr><td>&emsp;</td></tr>

            </table>

        <br>
        <table class="no">
            <?php
            echo"
            <tr>
            <td colspan='4' align='center'>
                    <button class='btn btn-success'><a href='javascript:generatePDF()' id='download' class='text-light text-decoration-none'>Download</a></button>
                </td>
            </tr>
        </table>
        </form>";
        ?>
    </div>



    <div class="footer">
        <spam class="ftxt1">This web page is created and maintained by ADMPS Group<br><small>Copyright &copy; 2022, ADMPS Group, All Rights Reserved <img src="justlogo.png" height=20px></small></spam>

        <div class="c_us"><ul><spam class="bigf">Contact Us</spam>
            <li><i class="fa-solid fa-phone"></i> +91 1800 3245 26 &emsp;| &emsp;<i class="fa-solid fa-envelope"></i> wbtech@gmail.com</li>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("download").click();
    </script>
    <script>
        async function generatePDF() {
            // document.getElementById("download").innerHTML = "Waiting";

            //Downloading
            var downloading = document.getElementById("whatToPrint");
            var doc = new jsPDF('p', 'pt');

            await html2canvas(downloading, {
                //allowTaint: true,
                //useCORS: true,
                width: 1650,
                height: 3650
            }).then((canvas) => {
                //Canvas (convert to PNG)
                doc.addImage(canvas.toDataURL("image/png"), 'PNG', 15, 15, 800, 1680);
            })

            doc.save("registrationform.pdf");

            //End of downloading        
            window.location.href="<?php echo'formview.php?id='.$id;?>";
        }
    </script>
</body>
</html>