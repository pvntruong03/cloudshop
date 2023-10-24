<?php
    //goi noi dung
    require_once('header.php');
    include_once('connect.php');
    $c = new Connect();
    //goi ham
    $dbLink = $c->connectToMySQL();
    //$sql = 'SELECT * FROM product';
    $sql = 'SELECT * FROM product ORDER BY pdate DESC /*LIMIT 3*/';
    //thuc hien truy van
    $re=$dbLink->query($sql);

    // if($re->num_rows>0){
    //     while($row=$re->fetch_assoc()){
    //         echo $row['pname'];
    //         echo "<br>";
            
    //     }
    // }
    // Check if a product should be deleted
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    // Perform the deletion by running a DELETE SQL query
    $deleteSql = "DELETE FROM product WHERE pid = ?";
    $deleteStmt = $dbLink->prepare($deleteSql);
    $deleteStmt->bind_param("i", $deleteId);

    if ($deleteStmt->execute()) {
        // Product deleted successfully
        echo "Product has been deleted successfully!";
    } else {
        // Deletion failed
        echo "Failed to delete the product.";
    }
}

$sql = 'SELECT * FROM product';
$re = $dbLink->query($sql);
    if($re->num_rows>0){
?>
<div class="container">
    <div class="row mx-auto">
        <?php 
            while($row=$re->fetch_assoc()){
        ?>
        <!-- Nike Air Force 1 High -->
        <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
            <img src="img/<?=$row['pimg']?>" 
            class="card-img-top my-3" alt="..." style="max-width: 100%; height: auto; border: 1px solid black; border-radius: 6px;">
            <div class="card-body">

                <a href="detail.php?id=<?=$row['pid']?>" class="text-decoration-none">
                    <h6 class="text-center" style="font-size: 15px; color: black;"><?=$row['pname']?></h6>
                </a>
                
                <p class="card-cost text-center my-3" style="font-weight: bold; font-size: 30px;"><small class="text-muted"><?=$row['pprice']?></small></p>
            </div>
        </div>
        <?php 
            }//while
        }//if
        ?>
    </div>
</div>

<?php 
    require_once('footer.php');
?>