<?php
session_start();

include("../connect.php");
if(isset( $_SESSION['Email'])){



    $select ="SELECT * FROM `reservation` WHERE `valid_admin` = 0";
    $result = $db->query($select);
    while($row = $result->fetch()) {
        $itemCode = $row['Item_Code'];
        $Nickname = $row['Nickname'];
        $reservCode = $row['Reservation_Code'];
        $Res_Expi_Date = $row['Reservation_Expiration_Date'];
        //  24 hour
        if($Res_Expi_Date >= date("Y/m/d-H:i:s")){
        
        $sql ="UPDATE `item` SET `Status`='Available' WHERE `Item_Code` = '$itemCode'";
        $res = $db->query($sql);
        $dlt = "DELETE FROM `reservation` WHERE `Item_Code` = '$itemCode'";
        $rsul = $db->exec($dlt); 
    }
}

    $sqlPnlti ="SELECT * FROM `members` WHERE `Email` = '$_SESSION[Email]'";
    $rusltPnlti =$db->query($sqlPnlti);
    while($rowPnlti = $rusltPnlti->fetch()) {
        $pntli = $rowPnlti['Penalty_Count'];
    }
    if($pntli == 3){
        header("location:ban.php");
    }

}
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
    <header>
        <div class="container">
            <nav>
                <a href="index.php" class="brand"><img src="../img/logo.png" alt="logo"></a>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <?php if(isset( $_SESSION['Email'])){?>
                        <li><a href="pageClient.php">Acount</a></li>
                    <?php }else{?>
                    </ul>
                <a href="../Login/signUp.php" class="btn btn-primary">
                    Login
                </a>
                <?php }?>


            </nav>

            <div class="header-bodyy">
                <div>
                    <div>
                        <p>
                        Our library has an extensive collection of books covering various subjects, from classic literature to contemporary bestsellers, as well as non-fiction books on topics such as history,                        
                        </p>
                    <span class="bar"></span>
                    <h1>The Reading</h1>
                </div>
                <div>
                    <h1>Listening Room</h1>
                    <span class="bar"></span>
                    <p>
                    science, and politics. We also have a wide range of DVDs and CDs that cater to different interests and genres, from educational documentaries to popular music albums and blockbuster movies.                    </p>
                    </div>

                </div>
            </div>
            <?php 
                if(isset( $_SESSION['Email'])){
            ?>
            <form action="" method='POST'>

                <div class="d-flex filter">
                    <div>
                        <input class="inp" name="inpSerch"  type="text">
                    </div>
                    <div>
                    <select  name="info" class="select" id="search-by-select">
                        <option value="Title">Title</option>
                        <option value="Author_Name">Author Name</option>
                        <option value="Edition_Date">Edition Date</option>
                        <option value="Purchase_Date">Purchase Date</option>
                    </select>
                    </div>
                    <div>
                        <button  type="submit" name="btnSerch" class="btnserch text-white fs-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
                <div class='men d-flex'>
                    <div class="w-50 p-3">
                        <div>
                            <label class="text-white d-block mb-3">status :</label>
                        </div>
                        <div>
                            <select name="Status" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;overflow: hidden;' multiple id="type-select">
                                <option value="Available">Available</option>
                                <option value="Reserved">Reserved</option>
                                <option value="Borrowed">Borrowed</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-50 p-3">
                        <div>
                            <label class="text-white d-block mb-3">condition :</label>
                        </div>
                        <div>
                            <select name="State" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;overflow: hidden;' multiple id="type-select">
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                                <option value="Old">Old</option>
                                <option value="Broken">Broken</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-50 p-3">
                        <div>
                            <label class="text-white d-block mb-3">Categori :</label>
                        </div>
                        <div>
                            <select name="Category" style='background-color:#020824;color:white;border:none;outline: none ;width:150px;height: 180px;' multiple id="type-select">
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
                        </div>
                    </div>
                </div>
            </form>
            <?php
                }else{
            ?>
<img src="../img/Slice 3.png" class="grid-img">

            <?php
                }
            ?>
        </div>
        
    </header>

    <div class="container">
            <?php 
                if(!isset( $_SESSION['Email'])){
            ?>
        <img src="../img/Slice 4.png" class="grid-img">
        <?php 
                }else{
                include("filter.php");

                }



                
            ?>
            <section class="services">
                <div class="heading">
                    <h2>what we actually do ?</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. In dignissimos quas iure ut aliquam labore nesciunt, distinctio beatae repellat tenetur numquam adipisci laboriosam architecto eveniet id repudiandae at voluptas recusandae!
                    </p>
                </div>
                <div class="lcards">
                    <div class="lcard">
                        <div class="lightt"></div>
                        <img src="../img/img-book.png" alt="wallet">
                        <h3>paper products</h3>
                        <p>
                        Our library boasts an extensive collection of Books and Romans and Journals , covering a wide range of topics and genres. With over 210 different titles to choose from,                        </p>
                        </p>
                    </div>
                    <div class="lcard">
                        <div class="lightt"></div>
                        <img style="width: 11em;" src="../img/imgdvd1.png">
                        <h3>digital products</h3>
                        <p>
                        Our library boasts an extensive collection of CDs and DVDs and video tapes, covering a wide range of topics and genres. With over 210 different titles to choose from,                        </p>
                    </div>
                    <div class="lcard">
                        <div class="lightt"></div>
                        <img src="../img/gift.png" alt="">
                        <h3>Our library gift</h3>
                        <p>
                        At our library, we offer a borrowing service that allows patrons to take home books, DVDs, CDs, and other multimedia products for a period of 15 days.

                        </p>
                    </div>
                </div>
            </section>
            <?php
                    $arrNew = [];
                    $sqlNew = "SELECT * FROM `item` WHERE `State` ='New'";
                    $rsltNew =  $db->query($sqlNew);
                    while($row = $rsltNew->fetch()) {
                        array_push($arrNew,$row['Cover_Image']);
                    }
                    $random_New=array_rand($arrNew,3);


                    $arrOld = [];
                    $sqlOld = "SELECT * FROM `item` WHERE `State` ='Old'";
                    $rsltOld =  $db->query($sqlOld);
                    while($row = $rsltOld->fetch()) {
                        array_push($arrOld,$row['Cover_Image']);
                    }
                    $random_Old=array_rand($arrOld,3);


                    $arrUsed = [];
                    $sqlUsed = "SELECT * FROM `item` WHERE `State` ='Used'";
                    $rsltUsed =  $db->query($sqlUsed);
                    while($row = $rsltUsed->fetch()) {
                        array_push($arrUsed,$row['Cover_Image']);
                    }
                    $random_Used=array_rand($arrUsed,3);

                

            ?>
            <section  class="featured">
                <div class="heading">
                    <h2>
                        Item catecory
                    </h2>
                </div>
                <div class="lcards">
                    <div class="lcard">
                        <img class="art-img" src="../img/crystal1.jpg" alt="">
                        <div class="lightt"></div>
                        <div class="d-flex justify-content-between">
                            <h3 class="art-title">Item New</h3>
                            <div class="favourites">
                                <img src="../admin/<?php echo $arrNew[$random_New[0]] ?>" alt="">
                                <img src="../admin/<?php echo $arrNew[$random_New[1]] ?>" alt="">
                                <img src="../admin/<?php echo $arrNew[$random_New[2]] ?>" alt="">
                                <small class="num" data-goal="100">
                                <?php echo $rsltNew->rowCount() -4 ; ?>+
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="lcard">
                        <img class="art-img" src="../img/crystal2.jpg" alt="">
                        <div class="lightt"></div>
                        <div class="d-flex justify-content-between">
                            <h3 class="art-title">Item Old</h3>
                            <div class="favourites">
                                <img src="../admin/<?php echo $arrOld[$random_Old[0]] ?>" alt="">
                                <img src="../admin/<?php echo $arrOld[$random_Old[1]] ?>" alt="">
                                <img src="../admin/<?php echo $arrOld[$random_Old[2]] ?>" alt="">
                                <small>
                                <?php echo $rsltOld->rowCount() -4 ; ?>+ 
                                </small>
                            </div>
                            
                        </div>
                    </div>

                    <div class="lcard">
                        <img class="art-img" src="../img/crystal3.jpg" alt="">
                        <div class="lightt"></div>
                        <div class="d-flex justify-content-between">
                            <h3 class="art-title">Item Used</h3>
                            <div class="favourites">
                                <img src="../admin/<?php echo $arrUsed[$random_Used[0]] ?>" alt="">
                                <img src="../admin/<?php echo $arrUsed[$random_Used[1]] ?>" alt="">
                                <img src="../admin/<?php echo $arrUsed[$random_Used[2]] ?>" alt="">
                                <small>
                                <?php echo $rsltUsed->rowCount() -4 ; ?>+ 
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="explore">
                <div class="grid">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div>
                    <h3 class="mb-5 fs-2">Library Policies and Procedures</h3 >
                    <!-- <p>
                        Create an account and take advantage of all these benefits and offers
                    </p> -->
                    <div class="stats">
                        <div>
                            <!-- <small>Artworks</small>
                            <h3>130k</h3> -->
                            <p>
                                A pexrson cannot borrow or reserve more than three books at the same time.
                            </p>
                            <p>
                                A borrowing operation must be preceded by a reservation.
                            </p>
                            <p>
                                A torn book cannot be reserved or borrowed.
                            </p>
                            <p>
                                A reservation can only be made for a book that is actually available in the library and is not subject to a current reservation.
                            </p>
                        </div>
                        <div>
                            <!-- <small>Users</small>
                            <h3>505k</h3> -->
                            <p>
                                The validity of a reservation is limited to 24 hours.
                            </p>
                            <p>
                                The borrowing period should not exceed 15 days.
                            </p>
                            <p>
                                A person who returns a book after the 15-day limit will receive a penalty.
                            </p>
                            <p>
                                A person who accumulates more than 3 penalties will not be allowed to continue borrowing books, and their account will be immediately locked.
                            </p>
                            <p>
                                No operation will be possible without authentication, even a simple consultation.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php if(empty($_SESSION['Email'])){
            ?>
                <section class="trial">
                    <h2>Make a reservation now</h2>
                    <p>
                        Create an account and take advantage of all these benefits and offers            
                    </p>
                    <a href="../Login/signUp.php" class="btn btn-primary ps-5 pe-5 pt-3 pb-3">
                        Reservation
                    </a>
                </section>

            <?php
                }
            ?>




    </div>

    <?php
                    $sql = "SELECT * FROM `category` WHERE `Category_Type` ='Number of pages'";
                    $result = $db->query($sql);
                    while($row = $result->fetch()) {
                        $Category_Code = $row['Category_Code'];
                        // echo $Category_Code;
                        
                        $select = "SELECT * FROM `item` WHERE `Category_Code` = '$Category_Code'";
                        $reslct = $db->query($select);
                        // while($rows = $reslct->fetch()) {
                            // $Title = $rows['Title'];
                            // echo $Title . "<br>";
                            $qq =$reslct->rowCount()  ;
                            echo $qq;
                            // }
                            
                    }
                        

    ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
<script src="validation.js"></script>
<!-- 
sarsri.imrane.solicode@gmail.com
imrane112233imrane 

abdmawla@gmail.com
abdmawla990022

-->
</body>
</html>