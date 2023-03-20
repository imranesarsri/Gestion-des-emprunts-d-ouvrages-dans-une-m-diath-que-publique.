<?php
session_start();
if(isset($_POST['btnOut'])){
    session_unset();
    header("Location:../Home/index.php");
};

include('../connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header> 
        <div class="container">
            <nav>
                <a href="#" class="brand"><img src="../img/logo.png" alt="logo"></a>
                <ul class="menu">
                    <form action="" method='POST'>
                        <li><a href="#">Home</a></li>
                        <li><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" >Sign out</button></li>
                        
                        <!-- modal sign out -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to Sign Out ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name='btnOut'>Sign Out</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <li>
                    </li>
                </ul>
            </nav>

            <div class="header-bodyy ">
                <div>
                    <div>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Fuga inventore nemo asperiores quibusdam voluptatibus magni
                        </p>
                        <span class="bar"></span>
                        <h1>imrane sars</h1>
                    </div>
                    <div>
                        <h1>sarsri imr</h1>
                        <span class="bar"></span>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Fuga inventore nemo asperiores quibusdam voluptatibus magni
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </header>
    

    <div class="ratings">
        <button type="button" class="darks btn btn-outline-dark"> <a href="category.php">CATEGORY</a></button>
        <div class="lin"></div>
        <button type="button" class="darks btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#add">ADD</button>
        <div class="lin"></div>
        <button type="button" class="btn btn-dark"><a class="text-white" href="admin.php">WAIT</a></button>
        <div class="lin"></div>
        <button type="button" class=" btn btn-outline-success"><a href="valid.php">VALID</a></button>
        <div class="lin"></div>
        <button type="button" class="darks btn btn-outline-dark"> <a href="item.php">ITEM</a></button>
        <?php include("addModal.php");?>
        <?php include("add.php");?>
    </div>


    <br><br><br><br>
    <div>
        <form action="" method="POST">
            <input name="inpSerchAdmin" class='inpSerchAdmin' type="text">
            <button name="btnSerchAdmin" class='btnSerchAdmin'><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
<div class="mb-3">


<?php
if(isset($_POST['btnSerchAdmin'])){

    $select ="SELECT * FROM `reservation` WHERE `valid_admin` = 0 AND `Nickname` LIKE '%$_POST[inpSerchAdmin]%'";
}else{
    $select ="SELECT * FROM `reservation` WHERE `valid_admin` = 0";
}

$result = $db->query($select);
if($result->rowCount() > 0){
    while($row = $result->fetch()) {
        $itemCode = $row['Item_Code'];
        $Nickname = $row['Nickname'];
        $reservCode = $row['Reservation_Code'];
        $Reservation_Date = $row['Reservation_Date'];
    
        $select1 ="SELECT * FROM `members` WHERE `Nickname` = '$Nickname'";
        $result1 = $db->query($select1);
        while($row1 = $result1->fetch()) {
            $image_profil = $row1['image_profil'];
            $Penalty_Count = $row1['Penalty_Count'];
        }
?>




<div class="cart mt-5 d-flex  justify-content-between">
        <div class=" d-flex flex-column justify-content-between"> 
            <div>
                <img src="<?php echo $image_profil ?>" alt="img profil">
                <span class="ms-3 fs-5"><?php echo $Nickname ?></span>
            </div>
            <div class="mt-4 ms-5">
                <?php
                    $sql = "SELECT * FROM `item` WHERE `Item_Code` = $itemCode";
                    $result2 = $db->query($sql);
                    while($row2 = $result2->fetch()){
                        $Title = $row2['Title'];
                        $Cover_Image = $row2['Cover_Image'];
                    }
                ?>
    
                <img class="rounded" src="<?php echo $Cover_Image ?>" alt="">
                <span class="fs-6 mb-3"><?php echo $Title ?></span><br>

                <?php
                    
                ?>
            </div>
            <div>
                <span style="margin-top:10em; " class="ms-3 fs-5 mt-5">penalites  : <?php echo $Penalty_Count ?> </span>
            </div>
        </div>
        <div>
            <span class="iconify" data-icon="material-symbols:nest-clock-farsight-analog-outline-sharp"></span>    
        </div>
        <div class="d-flex flex-column justify-content-between">
            <div class="">
                <span class="fs-5">Reservation Date :</span><br>
                <span class="fs-5"> <?php echo $Reservation_Date ?></span><br>
            </div>
            <div class="mt-5 ms-3">
                <form action="" method="POST">
                    <button type="submit" name="btnAccept"  class="btn btn-dark border-white border-3 me-3">Acceptance</button>
                    <button type="submit" name="btnReject"  class="btn btn-outline-dark bg-white border-white border-3 reject">to reject</button>
                </form>
            </div>
        </div>
        
</div>




<?php




        }
    
}else{
    ?>
    <img src="../img/cassette-wallpaper-preview.jpg" style="border-radius:0;margin-left:20em"  alt="">
<?php
}



if(isset($_POST["btnAccept"])){

    $stmt = $db->prepare("INSERT INTO `borrowings`( `Borrowing_Date`, `Borrowing_Return_Date`, `Item_Code`, `Nickname`, `Reservation_Code`) 
            VALUES (:borwDat ,:borwRetDat ,:itecod ,:nickname ,:resevcod)");


    date_default_timezone_set("Africa/Casablanca");
    $d = date_create();
    date_modify($d,"+15 days");
    $Borrowing_Return_Date = date_format($d ,"Y/m/d-H:i:s");
    $Borrowing_Date = date("Y/m/d-H:i:s");


    $stmt->execute([
    'borwDat'  => $Borrowing_Date,
    'borwRetDat'  => $Borrowing_Return_Date,
    'itecod'  => $itemCode,
    'nickname'  => $Nickname ,
    'resevcod'  => $reservCode,
    ]);
    
    $sql = "UPDATE `reservation` SET `valid_admin`='1' WHERE `Reservation_Code` = '$reservCode'";
    $db->query($sql);
};


// btnReject 

if(isset($_POST["btnReject"])){


        // update status table item 
        $sql = "UPDATE `item` SET `Status`='Available' WHERE `Item_Code`= '$itemCode' ";
        $db->query($sql);

        $sql = "DELETE FROM `reservation` WHERE `Reservation_Code` = '$reservCode'";
        $db->query($sql);
        // $result = $db->exec($sql);



}

?>


<script src="script.js"></script>
<script src="srciptValidAdd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>