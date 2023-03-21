<?php 
session_start();

include("../connect.php");
if(isset($_POST['btnSidnOut'])){
    session_unset();
    header("Location:../Home/index.php");
};
$_SESSION['nom'] ="imrane sarsri";


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

    <header style="height:20vh;">
        <nav class="p-5">
            <a href="index.html" class="brand"><img src="../img/logo.png" alt="logo"></a>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
            <li>
                </li>
            </ul>
        </nav>



        </div> 
    </header>

<style>
.item_one { grid-area: item_one; }
.item_twe { grid-area: item_twe; }
.item_zero { grid-area: item_zero; }
.item_three { grid-area: item_three; }
.item_four { grid-area: item_four; }

.profil {
  width: 700px;
  display: grid;
  grid-template-columns:repeat(3,250px);
  grid-template-rows:repeat(3,250px);
  grid-template-areas:
    'item_twe item_one item_one'
    'item_twe item_zero item_three '
    'item_four item_four item_three ';
  gap: 26px;
  margin: 10vh auto;
}

.item {
  background-color: rgba(255, 255, 255);
  text-align: center;
  padding: 10px;
  font-size: 30px;
  border-radius: 20px;
}



<?php

$select ="SELECT * FROM `members` WHERE `Email`= '$_SESSION[Email]'";
$result = $db->query($select);
while($row = $result->fetch()) {
    $Nickname = $row['Nickname'];
    $Full_Name = $row['Full_Name'];
    $Address = $row['Address'];
    $CIN = $row['CIN'];
    $Phone = $row['Phone'];
    $Email = $row['Email'];
    $Birth_Date = $row['Birth_Date'];
    $Occupation = $row['Occupation'];
    $Penalty_Count = $row['Penalty_Count'];
    $image_profil = $row['image_profil'];
    $_SESSION['nom'] = $Full_Name;

};



?>
.img_profil  {
    width: 200px;
    height: 200px;
    border-radius: 50% !important;
    background: url("../admin/<?php echo $image_profil ?>")no-repeat center;
    background-position: center;
    background-size: 200px;
    padding: auto;
    margin: 15px auto;
    border: 5px #020824 solid;

}

</style>

<?php

$select ="SELECT * FROM `reservation` WHERE `Nickname` = '$Nickname'";
$result = $db->query($select);

  $reserv = $result->rowCount() ;



$select ="SELECT * FROM `borrowings` WHERE `Nickname` = '$Nickname'";
$result = $db->query($select);

  $Allborrow = $result->rowCount() ;




$select ="SELECT * FROM `borrowings` WHERE `Nickname` = '$Nickname'  AND `valiid_return` = 0";
$result = $db->query($select);
  
    $borrow = $result->rowCount() ;


?>

<div class="profil">
  <div class="item_one item ">
    <h2 class="fs-5 text-dark mb-4">information account</h2>
    <div class="d-flex justify-content-around">
      <div>
        <p class="text-dark fs-6 text-start">Full name : <?php echo $Full_Name ?></p>
        <p class="text-dark fs-6 text-start">neckname : <?php echo $Nickname ?></p>
        <p class="text-dark fs-6 text-start">Address : <?php echo $Address ?></p>
        <p class="text-dark fs-6 text-start">CIN : <?php echo $CIN ?></p>
      </div>
      <div class="mb-3" style="background-color: black; width: 1.6px;"></div>
      <div class="text-center">
        <p class="text-dark fs-6 text-end">Phone : <?php echo $Phone ?></p>
        <p class="text-dark fs-6 text-end">Occupation : <?php echo $Occupation ?></p>
        <p class="text-dark fs-6 text-end">Birth Date : <?php echo $Birth_Date ?></p>
        <p class="text-dark fs-6 text-end">gmail : <?php echo $Email ?></p>

      </div>
    </div>
  </div>
  <div class="item_twe item ">
    <h2 class="fs-5 text-dark">Reservation</h2>
      <div class="mt-4 fs-4">
        <i class="fa-regular fa-bookmark"></i>
        <label class="fs-6"> Reservation : <?php echo $reserv ?></label>
      </div>
      <div class="mt-4 fs-4">
        <i class="fa-solid fa-bookmark"></i>
        <label class="fs-6"> Borrowings :<?php echo $borrow ?></label>

      </div>
      <div class="mt-4 fs-4 text-danger">
        <i class="fa-solid fa-biohazard"></i>
        <label class="fs-6"> Ban : <?php echo $Penalty_Count ?></label>

      </div>
      <div class="mt-4 fs-4 text-success">
        <i class="fa-solid fa-book"></i>
        <label class="fs-6">All Borrowings : <?php echo $Allborrow ?></label>

      </div>

  </div>
  <div class="item_zero item">
    <div class="img_profil"></div>
  </div>
  <div class="item_three item">
    <h2 class="fs-5 text-dark">Modify Profile</h2>
    <div class="mt-4 fs-4">
      <span class="iconify fs-2" data-icon="material-symbols:photo-camera-outline" type="button" data-bs-toggle="modal" data-bs-target="#image" style="color:#020824;cursor: pointer;"></span>
    </div>
    <div class="mt-4 fs-4">
      <span class="iconify fs-2" data-icon="ri:ball-pen-line" type="button" data-bs-toggle="modal" data-bs-target="#information" style="color:#020824;cursor: pointer;"></span>
    </div>
    <div class="mt-4 fs-4 text-success">
      <i class="fa-solid fa-right-from-bracket" type="button" data-bs-toggle="modal" data-bs-target="#signOut" style="color:#020824;cursor: pointer;"></i>
    </div>

  </div>  
  <div class=" item_four item d-flex justify-content-evenly">
      <div class="w-50">
          <h2 class="fs-5 text-dark mb-3">Reservation</h2>
          <?php
          $sqlrese = "SELECT * FROM `reservation` WHERE `Nickname` = '$Nickname' AND `valid_admin` = 0";
          $resultReser = $db->query($sqlrese);
          if($resultReser->rowCount() >0){
              while($rowr = $resultReser->fetch()) {
                $Item_Code = $rowr['Item_Code'];
              
                $sqlitem = "SELECT * FROM `item` WHERE `Item_Code` = '$Item_Code'";
                $resultitem = $db->query($sqlitem);
                while($rowit = $resultitem->fetch()) {
                    ?>
                    <li class="fs-6 text-dark"><?php echo $rowit['Title']  ?></li>
                    <?php
                }
              }
            }else{
              ?>
              <p class="fs-6 text-dark">The are currently no Reservation for you !</p>
              <?php
            }

          ?>
          <h2 class="fs-5 text-dark mb-3">Borrowings</h2>
          <?php
          $sqlborr = "SELECT * FROM `borrowings` WHERE `Nickname` = '$Nickname' AND `valiid_return`= 0";
          $resultborr = $db->query($sqlborr);
          if($resultborr->rowCount() >0){
              while($rowb = $resultborr->fetch()) {
                $Item_Code = $rowb['Item_Code'];
              
                $sqlitem = "SELECT * FROM `item` WHERE `Item_Code` = '$Item_Code'";
                $resultitem = $db->query($sqlitem);
                while($rowit = $resultitem->fetch()) {
                    ?>
                    <li class="fs-6 text-dark "><?php echo $rowit['Title']  ?></li>
                    <?php
                }
              }
          }else{
            ?>
            <p class="fs-6 text-dark">The are currently no borrowings for you !</p>
            <?php
          }

          ?>

      </div>
      <div style="background-color: black; width: 2px;">
      </div>
      <div class="w-50">
          <h2 class="fs-5 text-dark mb-3">All Borrowings</h2>
          <?php
          $sqlborr = "SELECT * FROM `borrowings` WHERE `Nickname` = '$Nickname' ";
          $resultborr = $db->query($sqlborr);
          if($resultborr->rowCount() >0){
              while($rowb = $resultborr->fetch()) {
                $Item_Code = $rowb['Item_Code'];
              
                $sqlitem = "SELECT * FROM `item` WHERE `Item_Code` = '$Item_Code'";
                $resultitem = $db->query($sqlitem);
                while($rowit = $resultitem->fetch()) {
                    ?>
                    <li class="fs-6 text-dark "><?php echo $rowit['Title']  ?></li>
                    <?php
                }
              }
            }else{
              ?>
              <p class="fs-6 text-dark">The are currently no borrowings for you !</p>
              <?php
            }
          ?>
          
      </div>
  </div>
</div>

<?php
include('modalPageProfil.php');
?>

<script src="validation.js"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>