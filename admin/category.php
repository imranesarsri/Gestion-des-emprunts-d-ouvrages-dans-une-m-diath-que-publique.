
<?php
include('../connect.php');

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
                </form>
            </ul>
        </nav>
            <table>
                <form action="" method="POST">
                    <input type="text" name="addCategory" class="w-50 p-2 mt-5" required>
                    <input  class="btn btn-primary w-50" name="btnAddCateg" type="submit">
                </form>
            </table>
            <?php


                if(isset($_POST["btnAddCateg"])){
                    $stmt = $db->prepare( "INSERT INTO `category`( `Category_Name`) VALUES (:nameCategory)");

                    
                $stmt->execute([
                    'nameCategory'  => $_POST["addCategory"],
                    ]);
                }
            ?>

            <table class="table w-50 mb-5">
            <thead>
                <tr>
                    <th class="text-white">category name</th>
                    <th class="text-white">category code</th>
                    <th class="text-white">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `category`";
                $result = $db->query($sql);
                while($row = $result->fetch()) { 
                
                ?>
                <tr>
                    <td class="text-white" ><?php echo $row['Category_Name'] ?></td>
                    <td class="text-white" ><?php echo $row['Category_Code'] ?></td>
                    <form action="" method="POST">
                        <td class="text-white" ><button type="submit" name="btnDel" value="<?php echo $row['Category_Code'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
                    </form>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

<?php
if(isset($_POST["btnDel"])){
        $cod = $_POST["btnDel"];
        $delet = "DELETE FROM `category` WHERE `Category_Code` = $cod ";
        $result = $db->exec($delet);

}


?>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/66fa8a420d.js" crossorigin="anonymous"></script>
</body>
</html>

