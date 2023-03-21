<?php


if(isset($_POST['btnReservation'])){
    $cod = $_POST['btnReservation'];



        // update status table item 
    $sql = "UPDATE `item` SET `Status`='Reserved' WHERE `Item_Code`= '$cod' ";
    $db->query($sql);

    //select Nickname table 

    $select ="SELECT * FROM `members` WHERE `Email`= '$_SESSION[Email]'";
    $result = $db->query($select);
    while($row = $result->fetch()) {
        $Nickname = $row['Nickname'];
    };


    date_default_timezone_set("Africa/Casablanca");
    $d = date_create();
    date_modify($d,"+1 days");
    $resExpirDate = date_format($d ,"Y/m/d-H:i:s");
    $resDate = date("Y/m/d-H:i:s");

    $stmt = $db->prepare("INSERT INTO `reservation`( `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`)
                        VALUES (:resDate,:resExpirDate,:ItmCod,:Nickname)");

    $stmt->execute([
        'resDate'  => $resDate,
        'resExpirDate'  => $resExpirDate,
        'ItmCod'  => $cod,
        'Nickname'  => $Nickname,
    ]);


    header("location:index.php");

}
?>

