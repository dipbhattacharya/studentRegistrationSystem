<?php
include 'studentdash.php';
session_start();
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
                    <span>Are you sure you want to logout?</span>
                </div>
                <div class="modal-footer">
                    <form method='post'>
                        <input type='button' class='btn text-secondary' data-bs-dismiss='modal' name='no' value='Cancel'>
                        <input type='submit' class='btn text-primary' value='logout' name='yes'>
                    </form>
                    <?php
                    if(isset($_POST['yes'])){
                        session_unset();
                        session_destroy();
                        echo ('<script LANGUAGE="JavaScript">window.location.href="login.php";
                            </script>');
                    }
                    if(isset($_POST['no'])){
                        echo ('<script LANGUAGE="JavaScript">window.location.href="studentdash.php";
                            </script>');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("ssubmit").click();
    </script>
</body>
</html>