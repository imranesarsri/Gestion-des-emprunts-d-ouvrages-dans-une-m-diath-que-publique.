

<!-- modal image -->
<div class="modal fade" id="image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change profile picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body text-center ">
                    <img src="../admin/<?php echo $image_profil ?>" class="border border-dark border-3 rounded-circle mb-3" style="width: 100px;" alt="image profil"><br>
                    <label>You can choose a new picture for your profilt</label>
                    <input type="file" name="image_profil" class="border border-dark border-2 mt-2">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="UpdateImageProfil"  class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>


<?php
if(isset($_POST['UpdateImageProfil'])){

    if($_FILES['image_profil']['error']  !== 4){

        $filimgprof = $_FILES["image_profil"]["name"];
        move_uploaded_file($_FILES["image_profil"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"] . "\mediatheque-publique\admin\Item_Images\\" . $filimgprof);

        $sql = "UPDATE `members` SET `image_profil`= 'Item_Images/$filimgprof' WHERE  `Nickname` = '$Nickname'";
        $db->query($sql);

    }
}

?>







<!-- modal Modification of personal information  -->
<div class="modal fade" id="information" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modification of personal information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-around">

                    <div>
                        <label for="Nickname" >Nickname</label><br>
                        <input id="Nickname" name="Nickname" value="<?php echo $Nickname ?>" type="text"><br>

                        <label for="fullName">full Name</label><br>
                        <input id="fullName" name="fullName" value="<?php echo $Full_Name ?>" type="text"><br>

                        <label for="Address">Address</label><br>
                        <input id="Address" name="Address" value="<?php echo $Address ?>" type="text"><br>
                    </div>

                    <div>
                        <label for="Phone">Phone</label><br>
                        <input id="Phone" name="Phone" value="<?php echo $Phone ?>" type="number"><br>

                        <label for="CIN">CIN</label><br>
                        <input id="CIN" name="CIN" value="<?php echo $CIN ?>" type="text"><br>

                        <label for="BirthDate">Birth Date</label><br>
                        <input id="BirthDate" name="BirthDate" value="<?php echo $Birth_Date ?>" required class="w-100" type="date"><br>
                    </div>

                </div>
                <div class="d-flex justify-content-evenly">
                    <div>
                        <div>
                            <input  <?php if($Occupation =="Etudiant"){ echo "checked";}?> value="Etudiant" name="Occupation" id="Etudiant" type="radio">
                            <label for="Etudiant">Etudiant</label>
                        </div>
                        <div class="mt-2 mb-2">
                            <input <?php if($Occupation =="Employee"){ echo "checked";}?> value="Employee" name="Occupation" id="Employee" type="radio">
                            <label for="Employee">Employee</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input <?php if($Occupation =="Housewife"){ echo "checked";}?> value="Housewife" name="Occupation" id="Housewife" type="radio">
                            <label for="Housewife">Housewife</label>
                        </div>
                        <div class="mt-2 mb-2">
                            <input <?php if($Occupation =="Another"){ echo "checked";}?> value="Another" name="Occupation" id="Another" type="radio">
                            <label for="Another">Another Category</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnupPagProfil" id="btnupPagProfil" class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
<?php

if(isset($_POST['btnupPagProfil'])){

    $selectCin = "SELECT * FROM `Members` WHERE `CIN` = '$_POST[CIN]'";
    $resultCin = $db->query($selectCin);

    $selectNickname = "SELECT * FROM `Members` WHERE `Nickname` = '$_POST[Nickname]'";
    $resultNickname = $db->query($selectNickname);


    $selectC1 = "SELECT * FROM `Members` WHERE `CIN` = '$_POST[CIN]' AND `Email` = '$_SESSION[Email]'";
    $resultC1 = $db->query($selectC1);
        
    $selectN1 = "SELECT * FROM `Members` WHERE `Nickname` = '$_POST[Nickname]' AND `Email` = '$_SESSION[Email]'";
    $resultN1 = $db->query($selectN1);


    $MassegError = [];

    $massegeErrorNickname = "We apologize, we were unable to accept the changes made to youraccount because the NICKNAME you entered has already been used by another customer.
                            Please update your information with a new NICKNAME that is not already in use. Please note that we strive to provide a unique service to each customer, 
                            so the same information cannot be used by different customers.Thank you for your understanding.";

    $massegeErrorCIN = "We apologize, we were unable to accept the changes made to youraccount because the CIN you entered has already been used by another customer.
                            Please update your information with a new CIN that is not already in use. Please note that we strive to provide a unique service to each customer, 
                            so the same information cannot be used by different customers.Thank you for your understanding.";

    $massegeErrorNickmaneAndCIN = "We apologize, we were unable to accept the changes made to youraccount because the CIN you entered has already been used by another customer.
                            Please update your information with a new CIN that is not already in use. Please note that we strive to provide a unique service to each customer, 
                            so the same information cannot be used by different customers.Thank you for your understanding.";

    // if ($resultNickname->rowCount() == 0 && $resultCin->rowCount() == 0){
    //     echo " new 1 : valid Nickname and CIN ";

    // }
    if ($resultNickname->rowCount() == 0 && $resultCin->rowCount() == 1) {

        if($resultC1->rowCount() == 0 ){
            array_push($MassegError , $massegeErrorCIN);
        }else{
            echo "valid";

        }

    }elseif ($resultNickname->rowCount() >= 1 && $resultCin->rowCount() <= 0) {

        if($resultN1->rowCount() == 0 ){
            array_push($MassegError ,$massegeErrorNickname);
        }else{
            echo "valid";

        }

    }elseif ($resultNickname->rowCount() == 1 && $resultCin->rowCount() == 1) {
        
        if ($resultN1->rowCount() == 1 && $resultC1->rowCount() == 1){
            echo "valid";
        }elseif ($resultN1->rowCount() == 0 && $resultC1->rowCount() == 1){
            array_push($MassegError , $massegeErrorNickname);

        }elseif ($resultN1->rowCount() > 1 && $resultC1->rowCount() <= 0){
            array_push($MassegError , $massegeErrorCIN);

        }else {
            array_push($MassegError , $massegeErrorNickmaneAndCIN);
        }

    }

    if(empty($MassegError)){

        $sqlUp =   "UPDATE `members` SET `Nickname`='$_POST[Nickname]',`Full_Name`='$_POST[fullName]',`Address`='$_POST[Address]',
                            `Phone`='$_POST[Phone]',`CIN`='$_POST[CIN]',`Occupation`='$_POST[Occupation]',`Birth_Date`='$_POST[BirthDate]'
                    WHERE `Email`= '$_SESSION[Email]'";
        $db->query($sqlUp); 

    }else{
    ?>

    <div style="position:absolute; top:30%; margin:20%;" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Massege error!</strong> <?php echo $MassegError[0] ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
    }


}
?>





<!-- modal update password and email  -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification of personal information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body text-center">
                    <div class="d-flex">
                        <label class="d-block w-25 ps-4 text-start" for="email">Email :</label>
                        <input class="d-block w-75" name="email" id="email" value="<?php echo $Email ?>" type="email">
                    </div>
                    <hr>
                    <div class="d-flex mt-3 mb-3">
                        <label class="d-block w-50 ps-4 text-start" for="currPass">Enter the current password :</label>
                        <input class="d-block w-50" name="currPass" id="currPass" type="text">
                    </div>
                    <div class="d-flex mt-3 mb-3">
                        <label class="d-block w-50 ps-4 text-start" for="newPass">Enter the new password :</label>
                        <input class="d-block w-50" id="newPass" type="text">
                    </div>
                    <div class="d-flex mt-3 mb-3">
                        <label class="d-block w-50  ps-4 text-start" for="rnewPass">Re-Enter the new password :</label>
                        <input class="d-block w-50" id="rnewPass" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnUpPasswAndEmail" id="btnUpPasswAndEmail" class="btn btn-dark">Update</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<div>

<?php


if(isset($_POST['btnUpPasswAndEmail'])){
    

    $select = "SELECT * FROM `Members` WHERE  `Email`='$_POST[email]'";
    $result = $db->query($select);

    $select1 = "SELECT * FROM `Members` WHERE  `Email`='$_POST[email]' AND `Email` ='$_SESSION[Email]'";
    $result1 = $db->query($select1);




    if ($result->rowCount() == 0 ){

        $sqlUpPass = "UPDATE `members` SET `Email`='$_POST[email]' WHERE `Email` ='$_SESSION[Email]'";
        $db->query($sqlUpPass);
        
        $_SESSION['Email'] = $_POST['email'];
        if(empty($_POST['currPass'])){
            echo "empty";
        }else{
            echo "not empty";
        }
    }elseif($result1->rowCount() == 0){
        $sqlUpPass = "UPDATE `members` SET `Email`='$_POST[email]' WHERE `Email` ='$_SESSION[Email]'";
        $db->query($sqlUpPass);
    
        $_SESSION['Email'] = $_POST['email'];
        if(empty($_POST['currPass'])){
            echo "empty";
        }else{
            echo "not empty";
        }
    } else{
        "masseg error : email ";
    }


}
?>



<!-- modal sign out  -->
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
