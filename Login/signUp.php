<?php
session_start();

include('../connect.php');
// include('../creatTabls.php');


    // value input
    $valueFullName = "";
    $valueAddress = "";
    $valuePhone = "";
    $valueDate = "";
    $valueEmail = "";
    $valueCin = "";
    $valueNickname = "";
    $valuePassword = "";
    $valueType = "";

    // value message error
    $Nicknameexists = "";
    $Cinexists ="";
    $Emailexists ="";

if(isset($_POST['subBtn'])){

    $fullName = $_POST["fullName"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $email = $_POST["email"];
    $cin = $_POST["cin"];
    $nickname = $_POST["nickname"];
    $password = md5($_POST["password"]);
    $type = $_POST["type"];


    $valueFullName = $fullName;
    $valueAddress = $address;
    $valuePhone = $phone;
    $valueDate = $date;
    $valuePassword = $_POST["password"];
    $valueType = $type;





    $selectEmail = "SELECT * FROM `Members` WHERE `Email` = '$email'";
    $resultEmail = $db->query($selectEmail);
    $selectCin = "SELECT * FROM `Members` WHERE `CIN` = '$cin'";
    $resultCin = $db->query($selectCin);
    $selectNickname = "SELECT * FROM `Members` WHERE `Nickname` = '$nickname'";
    $resultNickname = $db->query($selectNickname);

    if($resultEmail->rowCount() <= 0 && $resultCin->rowCount() <= 0 && $resultNickname->rowCount() <= 0 ){
    echo "imrzneeee";
    $stmt = $db->prepare("INSERT INTO Members( `Nickname` ,`Full_Name` ,`Password` ,`Admin` ,`Address` ,`Email`,
                                    `Phone` ,`CIN` ,`Occupation` ,`Penalty_Count` ,`Birth_Date` ,`Creation_Date`,`image_profil`)
                        VALUES(:ncn,:nam,:pas,:adm,:adr,:eml,
                                :pho,:cin,:occ,:pnl,:bdt,:cdt,:img)");

    $stmt->execute([
    'ncn'  => $nickname,
    'nam'  => $fullName,
    'pas'  => $password,
    'adm'  => false,
    'adr'  => $address,
    'eml'  => $email,
    'pho'  => $phone,
    'cin'  => $cin,
    'occ'  => $type,
    'pnl'  => 0,
    'bdt'  => $date,
    'cdt'  =>date('Y-m-d'),
    'img'  => 'Item_Images/img_profil.png'
    ]);
    $_SESSION['Email'] = $email;
    header("location:../Home");


    }else if ($resultEmail->rowCount() <= 0 && $resultCin->rowCount() <= 0 && $resultNickname->rowCount() >= 1 ){
        $valueEmail = $email;
        $valueCin = $cin;
        $Nicknameexists = "The nickname has already been used";
    }else if ($resultEmail->rowCount() <= 0 && $resultCin->rowCount() >= 1 && $resultNickname->rowCount() <= 0 ){
        $valueNickname = $nickname;
        $valueEmail = $email;
        $Cinexists ="The CIN  has already been used";
    }else if ($resultEmail->rowCount() >= 1 && $resultCin->rowCount() <= 0 && $resultNickname->rowCount() <= 0 ){
        $valueNickname = $nickname;
        $valueCin = $cin;
        $Emailexists ="The email has already been used";
    }else if ($resultEmail->rowCount() <= 0 && $resultCin->rowCount() >= 1 && $resultNickname->rowCount() >= 1 ){
        $valueEmail = $email;
        $Nicknameexists = "The nickname  has already been used";
        $Cinexists ="The CIN has already been used";
    }else if ($resultEmail->rowCount() >= 1 && $resultCin->rowCount() >= 1 && $resultNickname->rowCount() <= 0 ){
        $valueNickname = $nickname;
        $Cinexists ="The CIN has already been used";
        $Emailexists ="The email has already been used";
    }else if ($resultEmail->rowCount() >= 1 && $resultCin->rowCount() <= 0 && $resultNickname->rowCount() >= 1 ){
        $valueCin = $cin;
        $Emailexists ="The email has already been used";
        $Nicknameexists = "The nickname  has already been used";
    }else{
        $Emailexists ="The email has already been used";
        $Nicknameexists = "The nickname  has already been used";
        $Cinexists ="The CIN has already been used";

    };

    

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
            <a class="navbar-brand" href="../Home/index.php"><img class="ms-5" src="../img/logo.png" alt="logo"></a>
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



    <section class="d-flex flex-wrap">
        <div class="partLogin w-50 container ">
            <div class="d-flex justify-content-between">
                <a class="active" href="signUp.php">SIGN UP</a>
                <a href="singIn.php">SIGN IN</a>
            </div>
            <div>
                <form action="" method="POST">
                    <div>
                        <i id="iconFullName" class="fa-solid icon"></i>
                        <input type="text" id="fullName" name="fullName" value="<?php echo $valueFullName?>" class="w-100 input" placeholder="FULL NAME">
                        <div class="errorMessage" id="errorfullName"></div>
                    </div>
                    <div>
                        <i id="iconAddress" class="fa-solid icon"></i>
                        <input type="text" id="address" name="address" value="<?php echo $valueAddress?>" class="w-100 input" placeholder="ADDRESS">
                        <div class="errorMessage" id="errorAddress"></div>
                    </div>
                    <div>
                        <i id="iconPhone" class="fa-solid icon"></i>
                        <input type="number" id="phone" name="phone" value="<?php echo $valuePhone?>" class="w-100 input" placeholder="PHONE">
                        <div class="errorMessage" id="errorPhone"></div>
                    </div>
                    <div>
                        <i id="iconDate" class="fa-solid icon"></i>
                        <input type="date" id="date" name="date" value="<?php echo $valueDate?>" class="w-100 input" placeholder="DATE OF BIRTH">
                        <div class="errorMessage" id="errorDate"></div>
                    </div>
                    <div>
                        <i id="iconEmail" class="fa-solid icon"></i>
                        <input type="email" id="email" name="email" value="<?php echo $valueEmail?>" class="w-100 input" placeholder="EMAIL">
                        <div class="errorMessage" id="errorEmail"></div>
                        <div class="text-danger"><?php echo $Emailexists ?></div>
                    </div>
                    <div>
                        <i id="iconCin" class="fa-solid icon"></i>
                        <input type="text" id="cin" name="cin" value="<?php echo $valueCin?>" class="w-100 input" placeholder="CIN">
                        <div class="errorMessage" id="errorCin"></div>
                        <div class="text-danger"><?php echo $Cinexists ?></div>
                    </div>
                    <div>
                        <i id="iconNickname" class="fa-solid icon"></i>
                        <input type="text" id="nickname" name="nickname" value="<?php echo $valueNickname?>"  class="w-100 input" placeholder="NICKNAME">
                        <div class="errorMessage" id="errorNickname"></div>
                        <div class="text-danger"><?php echo $Nicknameexists ?></div>

                    </div>
                    <div>
                        <i id="iconPassword" class="fa-solid icon"></i>
                        <input type="password" id="password" name="password" value="<?php echo $valuePassword?>"  class="w-100 input" placeholder="PASSWORD">
                        <div class="errorMessage" id="errorPassword"></div>
                    </div>
                    <div>
                        <i id="iconPasswordagain" class="fa-solid icon"></i>
                        <input type="password" id="passwordagain" class="w-100 input" value="<?php echo $valuePassword?>" placeholder="PASSWORD AGAIN">
                        <div class="errorMessage" id="errorPasswordagain"></div>
                    </div>


                    <div class="mt-4">
                        <div>
                            <input id="Student" type="radio" name="type" <?php if($valueType == "Etudiant "){ echo "checked";}?> value="Etudiant ">
                            <label id="labelStudent" for="Student">Etudiant</label>
                            <input id="Employee" type="radio" name="type" <?php if($valueType == "Employee"){ echo "checked";}?> value="Employee">
                            <label for="Employee">Employee</label>
                        </div>
                        <div class="mt-3">
                            <input id="Housewife" type="radio" name="type" <?php if($valueType == "Housewife"){ echo "checked";}?> value="Housewife">
                            <label for="Housewife">Housewife</label>
                            <input id="Another" type="radio" name="type" <?php if($valueType == "Another"){ echo "checked";}?> value="Another">
                            <label for="Another">Another Category</label>
                        </div>
                    </div>
                    <button id="subBtn" name="subBtn" class="w-100 p-2 mt-5">SIGN UP</button>
                </form>
            </div>
        </div>
        <div class="partImg w-50" >
        </div>
    </section>











<script src="validSignUp.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>