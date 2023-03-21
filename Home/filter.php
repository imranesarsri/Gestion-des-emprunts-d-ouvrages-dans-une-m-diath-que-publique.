

<div style="margin-top: 15em;" class="d-flex gap-2 p-2 ms-3 flex-wrap">

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
            $background= "background: linear-gradient(222.28deg, #4caf50, rgb(139 195 74 / 50%) 98.17%);";

        }elseif($row['Status'] == "Reserved"){
            $bg = "yellow";
            $color = "black";
            $background = "background: linear-gradient(222.28deg, #ffeb3b, rgb(255 235 59 / 50%) 98.17%);";
            
        }elseif($row['Status'] == "Borrowed"){
            $bg = "red";
            $color = "white";
            $background = "background: linear-gradient(222.28deg, #e91e63, rgb(255 0 0 / 50%) 98.17%);";
            
        }else{
            $bg = "black";
            $color = "white";
            $background = "background: linear-gradient(222.28deg, #000, rgb(0 0 0 / 50%) 98.17%);";
        }

        if($Category_Name == "Book" || $Category_Name == "Comic" ){
            $TimeOrPage = "page";
        }else {
            $TimeOrPage = "time";
        }

?>
    


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="../admin/<?php echo $row['Cover_Image'] ;?>" alt="<?php echo $row['Cover_Image'] ;?>" style="width:15rem;height:20rem;">
                    <div class="rawdaw" style="<?php echo $background ?>">
                        <h6><?php echo substr($row['Title'] , 0 , 20) ;if(strlen($row['Title'])>20)echo "..."?></h6>
                        <!-- <button disabled style="color:<?php echo $color?>;background-color:<?php echo $bg?>;border:none"><?php echo $row['Status'] ;?></button> -->
                    </div>
                </div>
                <div class="flip-card-back p-2">
                    <h5>Title : <?php echo $row['Title'] ;?>.</h5> 
                    <h6>Author Name : <?php echo  $row['Author_Name'] ;?>.</h6> 
                    <h6>State : <?php echo $row['State'] ;?>.</h6>
                    <h6>Edition_Date : <?php echo  $row['Edition_Date'] ;?>.</h6>
                    <h6>Purchase_Date : <?php echo $row['Purchase_Date'] ;?>.</h6>
                    <h6>Category : <?php echo $Category_Name ;?>.</h6>
                    <h6><?php echo $TimeOrPage ?> : <?php echo $row['pageNumber'] ;?>.</h6>

                <?php
                    $sqll = "SELECT * FROM `members` WHERE `Email` = '$_SESSION[Email]'";
                    $gitNicmane =  $db->query($sqll);
                    while($roww = $gitNicmane->fetch()){
                        $NickName = $roww['Nickname'];
                    }

                    $selectreser = "SELECT * FROM `reservation` WHERE `Nickname` = '$NickName' AND `valid_admin` = 0";
                    $resultreser = $db->query($selectreser);
                    $selectborow = "SELECT * FROM `borrowings` WHERE `Nickname` = '$NickName' AND `valiid_return` = 0";
                    $resultborow = $db->query($selectborow);
                    
                    
                    ?>
                        <?php
                            if($row['Status'] == "Available"){
                                if( $resultreser->rowCount() +  $resultborow->rowCount() < 3){
                                ?>
                                <form action="pageReservation.php" method="POST">
                                    <button name="btnReserv" value="<?php echo $row['Item_Code'] ?>" class="p-2" style="color:<?php echo $color?>;background-color:<?php echo $bg?>;border:none"><?php echo $row['Status'] ;?></button>
                                </form>
                                <?php
                                }else{
                                    ?>
                                <!-- <form action="" method="POST"> -->
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#alert"  value="<?php echo $row['Item_Code'] ?>" class="p-2" style="color:<?php echo $color?>;background-color:<?php echo $bg?>;border:none"><?php echo $row['Status'] ;?></button>
                                <!-- </form> -->
                                <?php
                                }
                            }
                        ?>

                    
                    

                </div>
            </div>
        </div>


        <?php

                ?>

<!-- Modal -->
<div class="modal fade" id="alert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        i have already made a reservation :
        <?php echo $resultreser->rowCount() +  $resultborow->rowCount() ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                        <?php
                        
                    
                    ?>

<?php

}
?>

</div>