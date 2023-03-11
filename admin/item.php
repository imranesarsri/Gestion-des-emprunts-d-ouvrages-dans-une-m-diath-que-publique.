<?php

include("../connect.php");

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
    <header style="height: 70vh;"> 
        <div class="container">
            <nav>
                <a href="#" class="brand"><img src="../img/logo.png" alt="logo"></a>
                <ul class="menu">
                    <li><a href="admin.php">Home</a></li>
                    <!-- <li><a href="#">Acount</a></li> -->
                    <li>
                    </li>
                </ul>
            </nav>


            <form action="" method='POST'>
                <input class="inp" name="inpSerch"  type="text">
                <button  type="submit" name="btnSerch" class="btnserch text-white fs-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <div class='men'>
                    <div class="d-flex">
                        <select name="Status" style='background-color:#020824;color:white;border:none;outline: none;width:150px;height: 180px;' multiple class=' '>
                            <option class=' pt-2' value="Available">Available</option>
                            <option class=' pt-2' value="Reserved">Reserved</option>
                            <option class=' pt-2' value="Borrowed">Borrowed</option>
                            <option class=' pt-2' value="Unavailable">Unavailable</option>
                        </select>
                        <select name="State" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;' multiple class=' '>
                            <option class=' pt-2' value="New">New</option>
                            <option class=' pt-2' value="Used">Used</option>
                            <option class=' pt-2' value="Old">Old</option> 
                            <option class=' pt-2' value="Broken">Broken</option>
                        </select>
                        <select name="Category" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;' multiple class=' '>
                            <?php
                                $sql = "SELECT * FROM `category`";
                                $result = $db->query($sql);
                                while($row = $result->fetch()) {
                                ?>
                                    <option class=' pt-2' value="<?php echo $row['Category_Code'] ?>"><?php echo $row['Category_Name'] ?></option>
                                <?php
                                }
                            ?>
                        </select> 
                        <div class="d-flex">
                            <select name="info" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;' multiple class=' '>
                                <option class=' pt-2' value="Title">Title</option> 
                                <option class=' pt-2' value="Author_Name">Author Name</option>
                                <option class=' pt-2' value="Edition_Date">Edition Date</option>
                                <option class=' pt-2' value="Purchase_Date">Purchase Date</option>
                            </select>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </header>
    <div>



    </div>
    <div class="d-flex gap-3 p-3 ms-4 mt-5 flex-wrap">

    <?php
    $Status = "";
    $State = "";
    $info = "";
    $Category = "";
    $upTitle ="";
if(isset($_POST['btnSerch'])){



    if(isset($_POST["Status"])){
        $Status = " AND `Status` LIKE '$_POST[Status]' ";
    }
    if(isset($_POST["State"])){
        $State = " AND `State` LIKE  '%$_POST[State]%' ";
    }
    if(isset($_POST["info"])){
        $info = " AND `$_POST[info]` LIKE '%$_POST[inpSerch]%' ";
    }
    if(isset($_POST["Category"])){
        $Category = " AND `Category_Code` = '$_POST[Category]' ";
    }



    if(isset($_POST["Status"]) || isset($_POST["State"]) || isset($_POST["info"]) || isset($_POST["Category"])){
        $select = "SELECT * FROM `item` WHERE 1 $Status $State $info $Category ORDER BY `Title` ASC";
        $result = $db->query($select);
    }else {
        $select = "SELECT * FROM `item` WHERE `Title` LIKE '%$_POST[inpSerch]%' ORDER BY `Title` ASC";
        $result = $db->query($select);
    }
}else {
    $select = "SELECT * FROM `item` ORDER BY `Title` ASC ";
    $result = $db->query($select);
}

// DESC ASC

    while($row = $result->fetch()) {
        $category = $row["Category_Code"];

        $select2 = "SELECT * FROM `category` WHERE `Category_Code` = $category ";
        $result2 = $db->query($select2);
        foreach ($result2 as $rowc) {
            $Category_Name = $rowc['Category_Name'];
        };

        if($row['Status'] == "Available"){
            $bg = "green";
            $color = "white";

        }elseif($row['Status'] == "Reserved"){
            $bg = "yellow";
            $color = "black";
            
        }elseif($row['Status'] == "Borrowed"){
            $bg = "red";
            $color = "white";
            
        }else{
            $bg = "black";
            $color = "white";
        }

?>
    
        <div class="card mb-3" style="width: 460px;">
            <div class="row">
                <div class="col-4" >
                    <img src="<?php echo $row['Cover_Image'] ;?>" class="card-img" alt="<?php echo $row['Cover_Image'] ;?>">

                </div>
                <div class="col-8">
                    <div class="card-body row">
                            <h5 class="card-title"><?php echo $row['Title'] ;?></h5>
                            <h6 class="card-title">Author Name : <?php echo  $row['Author_Name'] ;?></h6>
                            <h6 class="card-title">State : <?php echo $row['State'] ;?></h6>
                            <h6 class="card-title">Edition_Date : <?php echo  $row['Edition_Date'] ;?></h6>
                            <h6 class="card-title">Purchase_Date : <?php echo $row['Purchase_Date'] ;?></h6>
                            <h6 class="card-title">Category : <?php echo $Category_Name  ;?></h6>
                            <h6 class="card-title">time or page : <?php echo $row['pageNumber']  ;?></h6>
                        <div class="col-3 d-flex gap-3">
                        <form action="" method="POST" class="d-flex gap-3">
                            <button type="submit" name='btnDelete' value="<?php echo $row["Item_Code"]?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            <?php include("delete.php"); ?>
                        </form>
                            <button disabled style="color:<?php echo $color?>;background-color:<?php echo $bg?>;border:none"><?php echo $row['Status'] ;?></button>
                        <form action="pageUpdate.php" method="POST">

                            <button type="submit" name="btnUpdate"  value="<?php echo $row["Item_Code"]?>" class="btn btn-success"><i class="fa-solid fa-marker"></i></button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                
            </div>
        </div>




<?php

// include("update.php"); 
}
?>




    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>