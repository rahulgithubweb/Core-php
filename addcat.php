<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?> 

        
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Add New Category</h2>
            <div class="block copyblock">
                
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){                  
                        $name = ($_POST['catname']);                     
                        $name =  mysqli_real_escape_string($db->link,$name);
                        
                        $query = "INSERT INTO tbl_category (name) VALUES ('$name')";
                        $catinsert = $db->insert($query);
                        
                        if($catinsert){
                            echo "successfully Inserted..!";
                        }
                        else {
                            echo "Sorry! Data is not inserted..!";
                        }
                    }
                ?>
                
                <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" required name="catname"/>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>

<?php include './footer.php'; ?>        