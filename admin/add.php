<?php

if(isset($_POST["btnAdd"])){
    $Title = $_POST["Title"];
    $AuthorName = $_POST["AuthorName"];
    $coverImage = $_FILES["coverImage"];
    $editDate = $_POST["editDate"];
    $purchaseDate = $_POST["purchaseDate"];
    $stats = $_POST["stats"];
    $category = $_POST["category"];
    $pages = $_POST["pages"];
    


    $errors_img = [];


    if($coverImage['error'] !== 4){
        $vallowed_extensions = array('jpg' , 'gif' , 'jpeg' , 'png');
        $imag_extensions = explode("." ,$coverImage["name"]);

        if(in_array(end($imag_extensions) , $vallowed_extensions)){

            if($coverImage['size'] < 500000){

                move_uploaded_file($coverImage["tmp_name"],$_SERVER["DOCUMENT_ROOT"] . "\mediatheque-publique\admin\Item_Images\\" . $coverImage["name"]);
                
                $stmt = $db->prepare("INSERT INTO `item`(`Title`, `Author_Name`,`Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Category_Code`,`pageNumber`) 
                                            VALUES (:tit,:nam,:img,:stats,:editDate,:purchaseDate,:Status,:Category_Code,:pag)");



                $stmt->execute([
                'tit'  => $Title,
                'nam'  => $AuthorName,
                'img'  => "Item_Images/".$coverImage["name"],
                'stats'  => $stats,
                'editDate'  => $editDate,
                'purchaseDate'  => $purchaseDate,
                'Status'  => "Available",
                'Category_Code'  => $category ,
                'pag'  => $pages ,
                ]);


            }else {
            $errors_img[] = '<p>Thie imageis too large, please compress the image and re-upload it.</p>';
            }


        }else {
            $errors_img[] = '<p>Only images are allowed to be uploaded ?</p>';
            echo "no valid " ."<br>";
        };

    }else{
        $errors_img[] = '<p>You have not uploadad any photos?</p>';

    }



    if(!empty($errors_img)){
        ?>

        <div class="alert alert-dark alert-dismissible fade show position-absolute bottom-50 end-25  w-50 text-dark" role="alert">
            <strong>error !</strong>
            <strong class='text-dark'>
    
                <?php
                    echo $errors_img[0];
                ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
            <?php

    }


}
?>

