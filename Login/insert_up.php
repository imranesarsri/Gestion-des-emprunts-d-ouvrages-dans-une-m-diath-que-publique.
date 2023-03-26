<?php
// include("../connect.php");
// include("signUp.php");




//   fullName address phone date email cin nickname password type 





if(isset($_POST['subBtn'])){

    $fullName = $_POST["fullName"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $email = $_POST["email"];
    $cin = $_POST["cin"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $type = $_POST["type"];


    

    
    echo $fullName ;
    echo $address;
    echo $phone;
    echo $date ;
    echo $email ;
    echo $cin ;
    echo $nickname ;
    echo $password ;
    echo $type ;
    // Nickname Name Password Admin Address Email Phone CIN Occupation Penalty_Count Birth_Date Creation_Date


//     $stmt = $db->prepare("INSERT INTO Members( `Nickname` ,`Name` ,`Password` ,`Admin` ,`Address` ,`Email`,
//                                     `Phone` ,`CIN` ,`Occupation` ,`Penalty_Count` ,`Birth_Date` ,`Creation_Date` )
//                         VALUES(:ncn,:nam,:pas,:adm,:adr,:eml,
//                                 :pho,:cin,:occ,:pnl,:bdt,:cdt)");



//     $stmt->execute([
//     'ncn'  => $nickname,
//     'nam'  => $fullName,
//     'pas'  => $password,
//     'adm'  => "0",
//     'adr'  => $address,
//     'eml'  => $email,
//     'pho'  => $phone,
//     'cin'  => $cin,
//     'occ'  => $type,
//     'pnl'  => "0",
//     'bdt'  => $date,
//     'cdt'  =>"2022/2/10 -10-12-29" 
// ]);


}



?>
