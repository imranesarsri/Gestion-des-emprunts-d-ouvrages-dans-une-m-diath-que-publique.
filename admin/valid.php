<?php
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
                    <li><a href="#">Home</a></li>
                    <!-- <li><a href="#">Acount</a></li> -->
                    <li>
                    </li>
                </ul>
            </nav>

            <div class="header-bodyy">
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
        <button type="button" class="darks btn btn-outline-dark"  type="button" data-bs-toggle="modal" data-bs-target="#add">ADD</button>
        <div class="lin"></div>
        <button type="button" class="btn btn-outline-dark"><a href="admin.php">WAIT</a></button>
        <div class="lin"></div>
        <button type="button" class="btn btn-dark "><a class="text-white" href="valid.php">VALID</a></button>
        <!-- <button type="button" class="btn btn-dark"><a class="text-white" href="admin.php">WAIT</a></button> -->


        <div class="lin"></div>
        <button type="button" class="darks btn btn-outline-dark"> <a href="item.php">ITEM</a></button>
        <?php include("addModal.php");?>
        <?php include("add.php");?>


    </div>




    


    <br><br><br><br>
<div class="mb-3">



<?php


$select ="SELECT * FROM `borrowings`WHERE `valiid_return` = 0";
$result = $db->query($select);
if($result->rowCount() > 0){
    while($row = $result->fetch()) {

        $Borrowing_Code = $row['Borrowing_Code'];
        $itemCode = $row['Item_Code'];
        $Nickname = $row['Nickname'];
        $Borrowing_Date = $row['Borrowing_Date'];
        $Borrowing_Return_Date = $row['Borrowing_Return_Date'];
        $Reservation_Code = $row['Reservation_Code'];
    
?>


    <div class="cart mt-5 d-flex justify-content-between">
        <div>
            <div>
                <img src="../img/img_profil.png" alt="">
                <span class="ms-3 fs-5"><?php echo $Nickname ?></span>
            </div>
            <div class="mt-4 ms-5">


            <?php
                    $sql = "SELECT * FROM `item` WHERE `Item_Code` = '$itemCode'";
                    $result2 = $db->query($sql);
                    while($row2 = $result2->fetch()){

                ?>

                <i class="fa-solid fa-tower-observation text-white mb-3"></i>
                <span class="fs-6 mb-3"><?php echo $row2['Title']?></span><br>

                <?php
                    }
                ?>


            </div>
        </div>
        <div>
            <span class="iconify" data-icon="mdi:marker-tick"></span>
        </div>
        <div class="d-flex flex-column justify-content-between">
            <div class="">
                <span class="fs-5">Borrowing Date :</span><br>
                <span class="fs-5"><?php echo $Borrowing_Date ?></span><br>
                <span class="fs-5">Borrowing Return Date :</span><br>
                <span class="fs-5"><?php echo $Borrowing_Return_Date ?></span>
            </div>
            <div class="mt-5 ms-3">
                <form action="" method="POST">
                    <button type="submit" value="<?php echo $Borrowing_Code ?>" name="btnValid" class="btn btn-dark border-white w-100 border-3 me-3">Valid</button>
                </form>
            </div>
        </div>
        
</div>

<?php
    }
    if(isset($_POST['btnValid'])){
        $id = $_POST['btnValid'];
        $sqlborr = "SELECT * FROM `borrowings` WHERE `Borrowing_Code`='$id' ";
        $resultborr = $db->query($sqlborr);
        while($rowborr = $resultborr->fetch()) {
            $Nickname = $rowborr['Nickname'];
            $Borrowing_Return_Date = $rowborr['Borrowing_Return_Date'];
        }
        $sqlmemb = "SELECT * FROM `members` WHERE `Nickname`= '$Nickname'";
        $resultmemb = $db->query($sqlmemb);
        while($rowmemb = $resultmemb->fetch()) {
            $Penalty = $rowmemb['Penalty_Count'];
        }
        echo  $Penalty ;
            $sqlUp = "UPDATE `borrowings` SET `valiid_return`='1' WHERE `Borrowing_Code` = '$id'";
            $db->query($sqlUp);

        $date = date("Y/m/d-H:i:s");
        if($date < $Borrowing_Return_Date){
            $sqlpn = "UPDATE `members` SET `Penalty_Count`= $Penalty + 1 WHERE `Nickname`='$Nickname'";
            $db->query($sqlpn);
            echo "pnlti";
        }else{
            echo "else";
        }

    }

}
?>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>