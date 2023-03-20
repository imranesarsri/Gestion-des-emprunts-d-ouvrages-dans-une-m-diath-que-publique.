
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
    <title>Document</title>
    <link rel="stylesheet" href="../admin/admin.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>


    <header style="height: 20vh;">
    
    
    
        <div class="ms-5 me-5 d-flex justify-content-between" style="align-items: center;flex-direction: column;">
            <nav>
                <a href="#" class="brand"><img src="../img/logo.png" alt="logo"></a>
                <ul class="menu">
                    <form action="" method='POST'>
                        <li><a href="index.php">Home</a></li>
                    </form>
                    <li>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="d-flex gap-5  m-5 ">
        <div class='w-50 border border-white border-3 p-5 d-flex '>
            
        <?php
            if(isset($_POST['btnReserv'])){


                $select = "SELECT * FROM `item` WHERE `Item_Code` = ' $_POST[btnReserv]' ";
                $result = $db->query($select);


                while($row = $result->fetch()) {
                    $category = $row["Category_Code"];
                    
                    $select2 = "SELECT * FROM `category` WHERE `Category_Code` = $category ";
                    $result2 = $db->query($select2);
                    foreach ($result2 as $rowc) {
                        $Category_Name = $rowc['Category_Name'];
                    };

                    if($Category_Name == "Book" || $Category_Name == "Comic" ){
                        $TimeOrPage = "page";
                    }else {
                        $TimeOrPage = "time";
                    }

?>
            <div>
                <img src="../admin/<?php echo $row['Cover_Image'] ;?>" class="me-5"  style="width:15rem;height:20rem;border-radius: 0;" alt="<?php echo $row['Cover_Image'] ;?>">
            </div>
            <div>



                <h3>Title : <?php echo $row['Title'] ;?></h3>
                <p class="fs-5">Author Name : <?php echo  $row['Author_Name'] ;?>.</p>
                <p class="fs-5">State : <?php echo $row['State'] ;?>.</p>
                <p class="fs-5">Edition_Date : <?php echo  $row['Edition_Date'] ;?>.</p>
                <p class="fs-5">Purchase_Date : <?php echo $row['Purchase_Date'] ;?>.</p>
                <p class="fs-5">Category : <?php echo $Category_Name ;?>.</p>
                <p class="fs-5"><?php echo $TimeOrPage ?>  : <?php echo $row['pageNumber'] ;?>.</p>
            </div>
        </div>
        <div class='w-50 border border-white border-3 p-5'>
            <form action="" method="POST">


                <h3 class="mb-5"> Ces règles sont les suivantes :</h3>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox1" >
                    <p>Une personne ne peut pas emprunter, ni réserver plus que trois ouvrages en même temps.</p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox2" >
                    <p>Une opération d’emprunt doit être précédée par une réservation.</p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox3" >
                    <p>La validité d’une réservation est limitée à 24 h. </p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox4" >
                    <p>La durée d’emprunt ne doit pas dépasser 15 jours.</p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox5" >
                    <p>Une personne qui remet un ouvrage au-delà des 15 jours, reçoit une pénalité.</p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required style="width: 1.7em;" id="checkbox6" >
                    <p>Une personne qui cumule plus de 3 pénalités n’a pas le droit de continuer à emprunter les ouvrages. Et son compte sera immédiatement verrouillé.</p>
                </div>
                <div class="d-flex gap-3">
                    <input class="form-check-input cheked" type="checkbox" required id="checkbox7" >
                    <p>Aucune opération ne sera possible sans authentification, même une simple consultation.<?php echo $row['Item_Code'] ?></p>
                </div>
                <button type="submit" id="btnReservation" name="btnReservation" value="<?php echo $row['Item_Code'] ?>" style="background: linear-gradient(222.28deg, #7000FF, rgba(250, 0, 255) 98.17%);" class="w-100 p-3 text-white ">reservation</button>
            </form>
        </div>
    </div>
<?php





        };
    };
    include("reservation.php");


?>
<script src="scriptReserv.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>