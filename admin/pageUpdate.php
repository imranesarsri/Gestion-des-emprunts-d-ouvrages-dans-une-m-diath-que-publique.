
<?php
include('../connect.php');
include('update.php');

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

    <header style="height: 20vh;"> 
    <div class="container">
            <nav>
                <a href="#" class="brand"><img src="../img/logo.png" alt="logo"></a>
                <ul class="menu">
                    <form action="" method='POST'>
                        <li><a href="admin.php">Home</a></li>
                        <li><a href="item.php">item</a></li>
                    </form>
                    <li>
                    </li>
                </ul>
            </nav>
            <div class="add">
            <form action="" method="POST" enctype="multipart/form-data">
                <label class="d-block mt-4 mb-2">Title</label>
                <input type="text" class="w-75 p-2 mb-2" value="<?php echo $title ?>" name="UpTitle" id="Title" placeholder="Title">
                <label class="d-block mt-4 mb-2">Author name</label>
                <input type="text" class="w-75 p-2 mb-2" value="<?php echo $Author_Name ?>" name="UpAuthorName" id="AuthorName" placeholder="Author name">
                <label class="d-block mt-4 mb-2">edition date</label>
                <input type="date" class="w-75 p-2 mb-2" value="<?php echo $Edition_Date ?>" name="UpeditDate" id="editDate" placeholder="edition date">
                <label class="d-block mt-4 mb-2">purchase date</label>
                <input type="date" class="w-75 p-2 mb-2" value="<?php echo $Purchase_Date ?>" name="UppurchaseDate" id="purchaseDate" placeholder="purchase date">
                <div >
                    <label class="d-block mt-4 mb-2">image new</label>
                    <input type="file" class="w-25 p-2 mb-4 border border-white" name="fileimg"><br>
                    <input type="text" hidden name="UplinkImage" value="<?php echo $Cover_Image ?>" ><br>
                    <label class="mb-2">image old</label><br>
                    <img src="<?php echo $Cover_Image ?>" class="card-img w-25"  alt="">
                    <p class="text-white fs-5 text-start mt-4">stats</p>
                </div>
                <div>
                    <div class="d-flex text-start">
                        <div class="w-50">
                            <div class="">
                                <input <?php if($State =="New"){ echo "checked";}?> name="Upstats" id="New" value='New' type="radio">
                                <label for="New">New</label>
                            </div>
                            <div class="">
                                <input <?php if($State =="Old"){ echo "checked";}?> name="Upstats" id="Old" value='Old' type="radio">
                                <label for="Old">Old</label>
                            </div>
                        </div>
                        <div class="w-50">
                            <div class="">
                                <input <?php if($State =="Used"){ echo "checked";}?> name="Upstats" id="Used"  value='Used' type="radio">
                                <label for="Used">Used</label>
                            </div>
                            <div class="">
                                <input <?php if($State =="Broken"){ echo "checked";}?> name="Upstats" id="Broken"  value='Broken' type="radio">
                                <label for="Broken">Broken</label>
                            </div>
                        </div>
                    </div>
                    <p for="" class="text-white fs-5 text-start mt-4">category</p>
                    <div class=" d-flex flex-wrap text-start">
                    <?php
                            $sql = "SELECT * FROM `category`";
                            $result = $db->query($sql);
                            while($row = $result->fetch()) {
                            ?>
                                <div class="w-50">
                                    <input name="Upcategory" <?php if($Category_Code ==  $row['Category_Code']){ echo "checked";}?> id="<?php echo $row['Category_Name'] ?>" value='<?php echo $row['Category_Code'] ?>' type="radio">
                                    <label for="<?php echo $row['Category_Name'] ?>"><?php echo $row['Category_Name'] ?></label>
                                </div>
                            <?php
                                }
                            ?>
                    </div>
                    <?php
                    if( $Status == "Available" || $Status == "Unavailable" || $Status == "Borrowed" ){
                    ?>
                    <div class="mt-5">
                        <label for="status"></label>
                        <div class="w-50">
                            <input  <?php if($Status =="Available"){ echo "checked";}?> id="Available" name="Upstatus" value="Available" type="radio">
                            <label for="Available">Available</label>
                        </div>
                        <div class="w-50">
                            <input  <?php if($Status =="Unavailable"){ echo "checked";}?> id="Unavailable" name="Upstatus" value="Unavailable" type="radio">
                            <label for="Unavailable">Unavailable</label>
                        </div>
                        <div class="w-50">
                            <input  <?php if($Status =="Borrowed"){ echo "checked";}?> id="Borrowed" name="Upstatus" value="Borrowed" type="radio">
                            <label for="Borrowed">Borrowed</label>
                        </div>

                    </div>
                    <?php
                    }else{
                    ?>
                            <input hidden <?php if($Status =="Available"){ echo "checked";}?> name="Upstatus" value="Available" type="radio">
                            <input hidden <?php if($Status =="Unavailable"){ echo "checked";}?> name="Upstatus" value="Unavailable" type="radio">
                            <input hidden <?php if($Status =="Borrowed"){ echo "checked";}?> id="Borrowed" name="Upstatus" value="Borrowed" type="radio">
                            <input hidden <?php if($Status =="Reserved"){ echo "checked";}?> id="Reserved" name="Upstatus" value="Reserved" type="radio">
                            

                    <?php
                    }
                    ?>
                </div>
                <label class="mt-5">namber page or time</label><br>
                <input type="text" value="<?php echo $pageNumber ?>" class="w-75 p-2 mt-4" name="Uppages" id="pages" placeholder="pages">

                <button type="submit" value="<?php echo $Item_Code ?>" name="btnUp" class="w-75 btn btn-success mb-5 mt-4"> Add</button>
            </form>
            </div>
            
        </div>
    </header>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>