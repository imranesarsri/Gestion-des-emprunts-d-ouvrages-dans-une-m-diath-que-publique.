<?php
session_start();

include("../connect.php");
if(isset( $_SESSION['Email'])){
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
                        <img src="../img/wallet.png" alt="wallet">
                        <h3>Set up your wallet</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut corrupti hic eligendi, adipisci explicabo quaerat ipsam? Harum ut vero
                        </p>
                    </div>
                    <div class="lcard">
                        <div class="lightt"></div>
                        <img src="../img/camera.png">
                        <h3>Set up your wallet</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut corrupti hic eligendi, adipisci explicabo quaerat ipsam? Harum ut vero
                        </p>
                    </div>
                    <div class="lcard">
                        <div class="lightt"></div>
                        <img src="../img/gift.png" alt="">
                        <h3>Set up your wallet</h3>
                        <p>
                        At our library, we offer a borrowing service that allows patrons to take home books, DVDs, CDs, and other multimedia products for a period of 15 days.

                        </p>
                    </div>
                </div>
            </section>

            <section class="featured">
                <div class="heading">
                    <h2>
                        Featured Artworks
                    </h2>
                </div>
                <div class="lcards">
                    <div class="lcard">
                        <img class="art-img" src="../img/crystal1.jpg" alt="">
                        <div class="lightt"></div>
                        <h3 class="art-title">Blue color crystal</h3>
                        <div class="favourites">
                            <div>
                                <img src="../img/user1.jpg" alt="">
                                <img src="../img/user2.jpg" alt="">
                                <img src="../img/user3.jpg" alt="">
                                <small>
                                    2+
                                </small>
                            </div>
                            <div>
                                <span>Favourite This</span>
                            </div>
                        </div>
                        <div class="bid">
                            <div>
                                <p>Current Bid</p>
                                <h3>
                                    <i class="fab fa-ethereum"></i>
                                    2.65ETH
                                </h3>
                            </div>
                            <div>
                                <p>Ends In</p>
                                <h3>10H 33M</h3>
                            </div>
                        </div>
                    </div>

                    <div class="lcard">
                        <img class="art-img" src="../img/crystal2.jpg" alt="">
                        <div class="lightt"></div>
                        <h3 class="art-title">Blue color crystal</h3>
                        <div class="favourites">
                            <div>
                                <img src="../img/user1.jpg" alt="">
                                <img src="../img/user2.jpg" alt="">
                                <img src="../img/user3.jpg" alt="">
                                <small>
                                    2+
                                </small>
                            </div>
                            <div>
                                <span>Favourite This</span>
                            </div>
                        </div>
                        <div class="bid">
                            <div>
                                <p>Current Bid</p>
                                <h3>
                                    <i class="fab fa-ethereum"></i>
                                    2.65ETH
                                </h3>
                            </div>
                            <div>
                                <p>Ends In</p>
                                <h3>10H 33M</h3>
                            </div>
                        </div>
                    </div>

                    <div class="lcard">
                        <img class="art-img" src="../img/crystal3.jpg" alt="">
                        <div class="lightt"></div>
                        <h3 class="art-title">Blue color crystal</h3>
                        <div class="favourites">
                            <div>
                                <img src="../img/user1.jpg" alt="">
                                <img src="../img/user2.jpg" alt="">
                                <img src="../img/user3.jpg" alt="">
                                <small>
                                    2+
                                </small>
                            </div>
                            <div>
                                <span>Favourite This</span>
                            </div>
                        </div>
                        <div class="bid">
                            <div>
                                <p>Current Bid</p>
                                <h3>
                                    <i class="fab fa-ethereum"></i>
                                    2.65ETH
                                </h3>
                            </div>
                            <div>
                                <p>Ends In</p>
                                <h3>10H 33M</h3>
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

        <?php if(!isset( $_SESSION['Email'])){
                return true
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



        <div class="container">
            <footer>
                <div>
                    <h2>Degital Agency</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus voluptas qui nostrum accusantium eligendi libero quas sequi. Consectetur iusto voluptatibus aliquid molestiae nemo, alias modi? Molestiae repudiandae itaque aliquid provident!
                    </p>
                    <hr>
                    <div class="d-flex gap-5 container ms-1">
                        <div class="d-flex">
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">sarsri.imrane.solicode@gmail.com</a></li>
                                    <li><a href="#">sarsri.imrane.solicode@gmail.com</a></li>
                                    <li><a href="#">sarsri.imrane.solicode@gmail.com</a></li>
                                    <li><a href="#">sarsri.imrane.solicode@gmail.com</a></li>
                                    <li><a href="#">sarsri.imrane.solicode@gmail.com</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">imrane112233imrane</a></li>
                                    <li><a href="#">imrane112233imrane</a></li>
                                    <li><a href="#">imrane112233imrane</a></li>
                                    <li><a href="#">imrane112233imrane</a></li>
                                    <li><a href="#">imrane112233imrane</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <!-- <span class="iconify fs-1" data-icon="ic:round-access-time"></span>  -->
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <li><a href="#">Protocol Explore</a></li>
                                    <!-- <span class="iconify fs-1" data-icon="ic:round-access-time"></span>  -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </footer>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>


</body>
</html>