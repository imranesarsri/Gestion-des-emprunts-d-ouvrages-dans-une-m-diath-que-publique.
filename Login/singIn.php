<?php
session_start();

include("../connect.php");
// include("../creatTabls.php");
// INSERT database



$valueEmail = "";
$Emailexists = "";
$Passwexists = "";


if(isset($_POST['subBtn'])){
    
    $email = $_POST["email"];
    $passw = md5($_POST["password"]);

    $selectEmail = "SELECT * FROM `Members` WHERE `Email` = '$email'";
    $resultEmail = $db->query($selectEmail);

    $selectPassw = "SELECT * FROM `Members` WHERE `Email` = '$email' AND `Password` = '$passw' ";
    $resultPassw = $db->query($selectPassw);

    
    if ($resultEmail->rowCount() > 0){
        if($resultPassw->rowCount() > 0){
            
            $selectAdmin = "SELECT * FROM `Members` WHERE `Email` = '$email' AND `Admin` = 1";
            $resultAdmin = $db->query($selectAdmin);
            if($resultAdmin->rowCount() > 0){
                $_SESSION['Email'] = $email;
                header("Location:../admin/admin.php");
            }else {
                $_SESSION['Email'] = $email;
                header("Location:../Home/index.php");
            }

        }else {
            $Passwexists = "This password does not exist";
            $valueEmail = " $_POST[email]";
        }

    }else {
        $Emailexists ="This email does not exist";

    }





}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,400;1,700&family=Lato:wght@300;400&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index1.php"><img class="ms-5" src="../img/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end me-3" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="../Home/index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <section>
        <div class="partLogin w-50 container ">
            <div class="d-flex justify-content-between">
                <a href="signUp.php">SIGN UP</a>
                <a class="active" href="singIn.php">SIGN IN</a>
            </div>
            <div>
                <form action="" method="POST">
                    <div>
                        <i id="iconEmail" class="fa-solid icon"></i>
                        <input type="email" name="email" id="email" value="<?php echo $valueEmail?>" class="w-100 input" placeholder="EMAIL">
                        <div class="errorMessage" id="errorEmail"></div>
                        <div class="text-danger"><?php echo $Emailexists ?></div>
                    </div>  
                    <div>
                        <i id="iconPassword" class="fa-solid icon"></i>
                        <input type="password" name="password" id="password" class="w-100 input" placeholder="PASSWORD">
                        <div class="errorMessage" id="errorPassword"></div>
                        <div class="text-danger"><?php echo $Passwexists ?></div>

                    </div>




                    <button id="subBtn" name="subBtn" class="w-100 p-2 mt-5">SIGN UP</button>
                </form>
            </div>
        </div>
        <div class="partImg w-50" ></div>
    </section>








<script src="validSignIn.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>