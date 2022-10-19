<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b347fe3e3c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <!-- navigation bar -->

    <nav>
        <div class="logo"><a href="index.php"><img src="logo.png" alt="West Bengal Institute of Technology"><span>West Bengal Institute of Technology</span></a></div>
        <input type="checkbox" id="click"> 
        <label for="click" class="menu-btn"><i class="fa-solid fa-bars"></i></label>
        <ul>
            <li class="current"><div><a href="index.php">Home</a></div></li>
            <li class="menuarea"><div><a href="#">Forms</a>
                <div class="dropdown-mnu">
                    <a href="register.php">New Registration Form</a>
                </div></div></li>
            <li class="menuarea"><div><a href="#">Account</a>
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
        
</body>
</html>