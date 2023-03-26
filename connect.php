<?php 

// library
$dsm = 'mysql:host=localhost;dbname=llaa';
$usr = "root" ;
$pass = "" ; 

try {

    $db = new PDO($dsm ,$usr ,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $db-> getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));

} catch (PDOException $e) {

    die("error : not connecte" . $e->getMessage());

}

?>