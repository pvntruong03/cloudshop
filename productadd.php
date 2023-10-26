<?php 
    require_once('header.php');
    require_once('connect.php');

    
    if(isset($_SESSION['user_name'])) {
        $username = $_SESSION['user_name'];
        if(isset($_POST['btnAdd'])){
            $c = new Connect();
            $dbLink = $c->connectToPDO();
    
            //$proID = $_POST['product_ID'];
            $proName = $_POST['product_Name'];
            $price = $_POST['price'];
            $proDes  = $_POST['product_Description'];
            $proDate = date('Y-m-d',strtotime($_POST['product_date']));
            $proQuan = $_POST['quantity'];
            $shopid = $_POST['shop_id'];
    
            $img = str_replace(' ','-',$_FILES['Pro_image']['name']); 
            $imgdir = './img/'; //duong dan
            $flag = move_uploaded_file(
                $_FILES['Pro_image']['tmp_name'],
                $imgdir.$img
            ); //dua hinh vao duong dan ./img/
    
            if($flag){
                $sql = "INSERT INTO `product`(`pname`, `pprice`, `pquan`, `pdesc`, `pimg`, `pdate`, `shop_id`) VALUES(?,?,?,?,?,?,?)";
    
                $re = $dbLink->prepare($sql);
                $valueArray = [
                    "$proName","$price","$proQuan","$proDes","$img","$proDate","$shopid"
                ];
    
                $stmt = $re->execute($valueArray);
                if($stmt){
                    echo "Added Successfully!";
                }
            } else{
                echo "Copy failed!";
            }
        }

    }else{
        header('Location: login.php');
    }
?>
<div class="container">
    <form action="#" class="form form-vertical" method="POST" enctype="multipart/form-data">  <!--multipart: upload file
        <!--Product ID-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="product_ID" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product ID</label>
                <input type="text" id="product_ID" name="product_ID" class="form-control" value="" placeholder="Product ID">
            </div>
        </div>

        <!--Product name-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="product_Name" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product Name</label>
                <input type="text" id="product_Name" name="product_Name" class="form-control" value="" placeholder="Product Name">
            </div>
        </div>

        <!--Price-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="price" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Price</label>
                <input type="text" id="price" name="price" class="form-control" value="" placeholder="Price">
            </div>
        </div>

        <!--Product Description-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="product_Description" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product Description</label>
                <input type="text" id="product_Description" name="product_Description" class="form-control" value="" placeholder="Product Description">
            </div>
        </div>

        <!--Product date-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="product_date" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product date</label>
                <input type="date" id="product_date" name="product_date" class="form-control" value="" placeholder="Product date">
            </div>
        </div>

        <!--Quantity-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="quantity" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Quantity</label>
                <input type="text" id="quantity" name="quantity" class="form-control" value="" placeholder="Quantity">
            </div>
        </div>

        <!--Image-->
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image-vertical" style="font-weight: bold; color: cornflowerblue">Image</label>
                    <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                </div>
            </div>
        </div>

        <!--Cat ID-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="cat_id" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Shop ID</label>
                <input type="text" id="cat_id" name="cat_id" class="form-control" value="" placeholder="Cat ID">
            </div>
        </div>

        <!--Button-->
        <div class="row mb-3">
            <div class="col-2 ms-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="btnAdd" class="btn btn-warning rounded-pill">Add</button>
                </div>
                <div class="col-6 d-grid mx-auto">
                    <button type="reset" name="btnReset" class="btn btn-secondary rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>