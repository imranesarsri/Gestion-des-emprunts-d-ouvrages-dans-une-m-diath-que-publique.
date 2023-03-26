<?php
if(isset($_POST['btnUpdate'])){
    

    $select = "SELECT * FROM `item` WHERE Item_Code = $_POST[btnUpdate] ";
    $result = $db->query($select);

    while($row = $result->fetch()) {

        $title = $row['Title'];
        $Item_Code = $row['Item_Code'];
        $Author_Name = $row['Author_Name'];
        $Cover_Image = $row['Cover_Image'];
        $State = $row['State'];
        $Edition_Date = $row['Edition_Date'];
        $Purchase_Date = $row['Purchase_Date'];
        $Status = $row['Status'];
        $Category_Code = $row['Category_Code'];
        $pageNumber = $row['pageNumber'];




    }
}else {
    
    $title = "";
    $Author_Name = "";
    $Cover_Image = "";
    $State = "";
    $Edition_Date = "";
    $Purchase_Date = "";
    $Status = "";
    $Category_Code = "";
    $pageNumber = "";
    
    if(isset($_POST['btnUp'])){
        $update = $_POST['btnUp'];

            try{


                function valideLinkeImage(){
                    $fileimg = $_FILES["fileimg"]["name"];
                    move_uploaded_file($_FILES["fileimg"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"] . "\mediatheque-publique\admin\Item_Images\\" . $fileimg);
                    
                    if($_FILES["fileimg"]['error']  == 4){
                        return $_POST['UplinkImage'];
                    }else{
                        return "Item_Images/".$fileimg;
                    };
                }
                $valideLinkeImage = valideLinkeImage();



            $sql = "UPDATE `item` SET `Title`= '$_POST[UpTitle]',`Author_Name`= '$_POST[UpAuthorName]' ,`Cover_Image`='$valideLinkeImage',
                    `State`= '$_POST[Upstats]',`Edition_Date`= '$_POST[UpeditDate]',
                    `Purchase_Date`= '$_POST[UppurchaseDate]', `Status`='$_POST[Upstatus]',`Category_Code`= '$_POST[Upcategory]',
                    `pageNumber`= '$_POST[Uppages]' WHERE `Item_Code`=  '$update'";
            
            $db->query($sql);

                

            
            }
            catch(PDOException $e) {
                die('error :'.$e->getMessage());
            }


        }
}


?>
