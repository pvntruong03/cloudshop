<?php
include_once("header.php");
include_once("connect.php");

$c = new Connect();
$dblink = $c->connectToPDO();
if (isset($_SESSION['user_name'])) { //Check if user logged into website
    $user = $_SESSION['user_name'];

    if (isset($_GET['id'])) { //When user add an item to shopping cart
        $p_id = $_GET['id'];
        $sqlSelect1 = "SELECT pid FROM cart WHERE user_id=? AND pid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user", "$p_id"));

        //Check if the item has been added
        if ($re->rowCount() == 0) { //The item couldn't be found in user's cart
            $query = "INSERT INTO cart(user_id, pid, pCount, date) VALUE(?,?,1,CURDATE())";
        } else { //Added by user
            $query = "UPDATE cart SET pCount = pCount + 1 WHERE user_id=? AND pid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user", "$p_id"));

    } else if (isset($_GET['del_id'])) { //When user wanna delete a item to shopping cart
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cart_id=?";

        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }

    //Show a list of shopping cary
    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pid = p.pid AND user_id=?";

    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
} else {
    header("Location: login.php");
}
?>

<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?></h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
            <th>Total Bill</th>
        </tr>

        <?php 
        foreach($rows as $row){
        ?>
        <tr>
            <td><?=$row['pname']?></td>
            <td>
                <input type="number" id="form1" min="0" value="<?=$row['pCount']?>" class="form-control form-control-sm">
            </td>
            <td>
                <h6 class="mb-0">
                    <span>&#8363;</span> <?=$row['pCount']?> * <?=$row['pprice']?>
                </h6>
            </td>
            <td>
                <a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none">X</a>
            </td>
        </tr>

        <?php 
        }
        ?>

    </table>
    <hr class="my-4">
    <div class="pt-5">
        <h6 class="mb-0">
            <a href="home.php" class="text-body">
                <i class="fas fas-long-arrow-alt-left me-2"></i>Back to shop
            </a>
        </h6>
    </div>
</div>