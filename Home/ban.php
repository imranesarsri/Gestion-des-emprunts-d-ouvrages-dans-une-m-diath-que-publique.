<?php
session_start();
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>médiathèque publique</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="w-50 mt-5 container p-3 border border-white text-center">
    <?php
    // SELECT * FROM `borrowings` WHERE `Nickname` = AND `Borrowing_Return_Date`

    $sqlname ="SELECT * FROM `members` WHERE `Email` = '$_SESSION[Email]'";
    $rusltname =$db->query($sqlname);
    while($rowname = $rusltname->fetch()) {
        $Nickname = $rowname['Nickname'];
    }
    ?>

    <h2 class="mb-5 ">Account Suspension Notice: <?php echo $Nickname?> for Book Return Breach</h2>
    <p class="fs-5">
        We regret to inform you that the user <?php echo $Nickname?>'s account has been blocked due to breaches committed by him. 
        <?php echo $Nickname?> failed to return a book at the specified time, violating our library's policy on timely returns. 
        As a result, his account has been suspended until further notice. We take such breaches seriously as
        they not only inconvenience other library users but also disrupt the overall functioning of the library.
        We kindly remind all users to adhere to the library's policies and regulations to ensure a
        seamless and enjoyable experience for all. Thank you for your cooperation.
    </p>
    <p class="fs-5">
    Best regards,
    </p>
    <p class="fs-5"> The Reading & Listening Room</p>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>