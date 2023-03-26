<?php




if(isset($_POST['btnDelete'])){

$code =  $_POST['btnDelete'] ;

$select2 = "DELETE FROM `borrowings` WHERE `Item_Code` = $code ";
$result2 = $db->exec($select2);


  $select1 = "DELETE FROM `reservation` WHERE `Item_Code` = $code ";
  $result1 = $db->exec($select1);


  $select3 = "DELETE FROM `item` WHERE `Item_Code` = $code  ";
  $result3 = $db->exec($select3);
  // header("location:admin.php");
}
?>