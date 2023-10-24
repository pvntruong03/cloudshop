<!-- Search -->
<?php
require_once('header.php');
require_once('connect.php');
?>

<?php 

?>

<div class="container my-3">
    <div class="row d-flex justify-content-center align-items-center p-3">
        <div class="col-md-8">
            <form action="search.php" class="search d-flex" role="search">
                <input type="search" class="form-control me-2" placeholder="Search..." name="search" aria-label="search">

                <button class="btn btn-outline-success" name="btnSearch" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row mx-auto">
        <?php
        $c = new Connect();
        $dblink = $c->connectToPDO();

        if (isset($_GET['search'])) {
            $nameP = $_GET['search'];
        } else {
            $nameP = "";
        }

        $sql = "SELECT * FROM product WHERE pname LIKE ?";
        $re = $dblink->prepare($sql);
        $valueArray = ["%$nameP%"]; //dieu kien like
        $re->execute($valueArray);
        $row = $re->fetchAll(PDO::FETCH_BOTH); //fetchAll lay toan bo
        if ($re->rowCount() > 0) {
            foreach ($row as $r):
                ?>

                <div class="row card mb-3 col-3 mx-auto" style="width: 18rem;">
                    <img src="img/<?= $r['pimg'] ?>" class="card-img-top my-3" alt="..."
                        style="max-width: 100%; height: auto; border: 1px solid black; border-radius: 6px;">

                    <div class="card-body mx-auto">
                        <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;">
                                <?= $r['pname'] ?>
                            </h6>
                        </a>

                        <p class="card-cost text-center" style="font-weight: bold; font-size: 30px;"><small class="text-muted">
                                <?= $r['pprice'] ?>
                            </small></p>

                    </div>
                </div>

                <?php
            endforeach;
            ?>

            <?php
        } else {
            echo "Nothing";
        }
        ?>
    </div>
</div>

<?php
require_once('footer.php');
?>