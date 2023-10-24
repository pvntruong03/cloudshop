<?php
    //goi noi dung
    require_once('header.php');
    include_once('connect.php');
    $c = new Connect();
    //goi ham
    $dbLink = $c->connectToMySQL();
    $sql = 'SELECT * FROM product';
    //thuc hien truy van
    $re=$dbLink->query($sql);

    // if($re->num_rows>0){
    //     while($row=$re->fetch_assoc()){
    //         echo $row['pname'];
    //         echo "<br>";
            
    //     }
    // }
    if($re->num_rows>0){
?>

<div class="container">
    <div class="row mx-auto">
        <?php 
            while($row=$re->fetch_assoc()){
        ?>
        <!-- Samsung Galaxy S23 Ultra -->
        <div class="card mb-3 col-3 mx-auto" style="width: 18rem;">
            <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/s/2/s23-ultra-tim.png" 
            class="card-img-top" alt="...">
            <div class="card-body">
                <span><h6><?=$row['pname']?></h6></span>
                <p class="card-cost" style="font-weight: bold; font-size: 30px;"><small class="text-muted"><?=$row['pprice']?></small></p>
            </div>
            <details>
                <summary>More details</summary>
                <div class="card-desc">
                    <?=$row['pdesc']?>
                </div>
            </details>
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