<?php 
session_start();
include("../connect.php");
if(isset($_POST['btnSidnOut'])){
    session_unset();
    header("Location:../Home/index.php");
};
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

    <header style="height:80vh;">
        <nav class="p-5">
            <a href="index.html" class="brand"><img src="../img/logo.png" alt="logo"></a>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
            <!-- <li><a href="#">Acount</a></li> -->
            <li>
                </li>
            </ul>
        </nav>
        <div class="img_profil"></div>
        <div class="fs-1 text-center pt-5">
        <?php

          $select ="SELECT * FROM `members` WHERE `Email`= '$_SESSION[Email]'";
          $result = $db->query($select);
          while($row = $result->fetch()) {
              $Nickname = $row['Nickname'];
          };
          ?>
            <p><?php echo $Nickname ?></p>
            <p class="mt-3"><?php  echo ( $_SESSION['Email'])?></p>
        </div>
    </header>
    <div class="bg-white text-dark p-3 d-flex ">
        <button type="button" class="darks btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#signOut">SIGN OUT</button>
    </div>






<!-- modal sign out -->
    <div class="modal fade" id="signOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        wach bari nit t5roj mn kont ?
      </div>
      <div class="modal-footer">
        <form action="" method="POST">
            <button type="submit" name="btnSidnOut"  class="btn btn-dark">Sign Out</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div>
  <?php




    $select ="SELECT * FROM `reservation` WHERE `Nickname` = '$Nickname'";
    $result = $db->query($select);
    while($row = $result->fetch()) {
      ?>
      <p><?php echo $row['Item_Code'] ?></p>
      <?php
      
    };

  ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>