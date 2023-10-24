<?php
require_once('header.php');
include_once('connect.php');
?>

<div class="container mx-auto">
    <?php
    if (isset($_GET['id'])):
        $pid = $_GET['id'];
        require_once('connect.php');
        $conn = new Connect();
        $dbLink = $conn->connectToPDO();
        $sql = "SELECT * FROM product WHERE pid=?";
        $stmt = $dbLink->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
        
        <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
            <img src="img/<?= $re['pimg']?>" 
            class="card-img-top my-3 mx-auto" alt="..." style="max-width: 90%; height: auto; border: 1px solid black; border-radius: 6px;">
            <div class="card-body">
                <h2 class="text-center" style="color: blue;"><?=$re['pname']?></h2>

                Price: <?=$re['pprice']?>
                <br>
                Quantity: <?=$re['pquan']?>
                <br>
                Description: <?=$re['pdesc']?>
            </div>

            <button type="submit" name="btnAddToCart" class="btn btn-warning my-3 mx-auto">
                <a href="cart.php?id=<?=$re['pid']?>" class="text-decoration-none text-black">Add to cart<i class="fas fa-shopping-cart"></i></a>
            </button>

        </div>

    <?php
        else:
    ?>
            <h2>Nothing to show</h2>
    <?php
        endif;
    ?>
    </div>

    <div>
        <h6 class="mb-0">
            <a href="home.php" class="text-primary text-decoration-none">
                Back to shop
            </a>
        </h6>
    </div>