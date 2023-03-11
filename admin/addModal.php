<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="w-100 p-2 mt-4" name="Title" id="Title" placeholder="Title">
                    <input type="text" class="w-100 p-2 mt-4" name="AuthorName" id="AuthorName" placeholder="Author name">
                    <input type="date" class="w-100 p-2 mt-4" name="editDate" id="editDate" placeholder="edition date">
                    <input type="date" class="w-100 p-2 mt-4" name="purchaseDate" id="purchaseDate" placeholder="purchase date">
                    <input type="file" class="w-100 p-2 mt-4 border border-dark" name="coverImage" id="">
                    <p class="text-dark fs-5 text-start mt-4">stats</p>
                    <div class="d-flex text-start">
                        <div class="w-50 ">
                            <div class="">
                                <input name="stats" id="New" value='New' type="radio">
                                <label for="New">New</label>
                            </div>
                            <div class="">
                                <input name="stats" id="Used" value='Used' type="radio">
                                <label for="Used">Used</label>
                            </div>
                        </div>

                        <div class="w-50 ">
                            <div class="">
                                <input name="stats" id="Old"  value='Old' type="radio">
                                <label for="Old">Old</label>
                            </div>

                            <div class="">
                                <input name="stats" id="Broken" value='Broken' type="radio">
                                <label for="Broken">Broken</label>
                            </div>
                        </div>
                    </div>
                
                    <p for="" class="text-dark fs-5 text-start mt-4">category</p>
                    <div class=" d-flex flex-wrap text-start">
                    <?php
                $sql = "SELECT * FROM `category`";
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                
                ?>
                    <div class="w-50">
                        <input name="category" id="<?php echo $row['Category_Name'] ?>" value='<?php echo $row['Category_Code'] ?>' type="radio">
                        <label for="<?php echo $row['Category_Name'] ?>"><?php echo $row['Category_Name'] ?></label>
                    </div>
                <?php
                    }
                ?>
                    </div>

                    <input type="number" class="w-100 p-2 mt-4" name="pages" id="pages" placeholder="pages">


                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>








