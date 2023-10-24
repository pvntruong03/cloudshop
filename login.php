<?php 
    SESSION_START();
    require_once('login_header.php');
    include_once('connect.php');

    if(isset($_POST['btnLogin'])){
        if(isset($_POST['username'])&&isset($_POST['password'])){
            $pwd = $_POST['password'];
            $username = $_POST['username'];
            $c = new Connect();
            $dbLink = $c->connectToPDO();
            $sql = "SELECT * FROM users WHERE username = ? and upassword = ?";
            $stmt = $dbLink->prepare($sql);
            $re = $stmt->execute(array("$username","$pwd"));
            $numrow = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_BOTH);
            
            if($numrow==1){
                echo "Login successfully!";
                $_SESSION['user_name'] = $row['user_name'];
                header("Location: index.php");
            } else{
                echo "Something wrong with your info<br>";
            }
        } else{
            echo "Please enter your info!";
        }
    }
?>
<div class="container">
    <h2>Login</h2>
    <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
        <div class="row mb-3 my-auto">
            <div class="d-grid col-4 mx-auto">
                <input id="username" type="text" name="username" class="form-control" value="" placeholder="Username">
            </div>
        </div>

        <div class="row mb-3">
            <div class="d-grid col-4 mx-auto">
                <input id="password" type="password" name="password" class="form-control" value=""
                    placeholder="Password">
            </div>
        </div>

        <div class="d-grid col-4 mx-auto">
            <div class="form-check d-inline-flex mx-auto">
                <input id="checkrmb" type="checkbox" name="grpcheckrmb" value="1" class="form-check-input me-3">
                <label id="check" for="checkrmb" class="form-check-label text-white">Remember me</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3 mx-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
                </div>
                <!-- <div class="col-6 d-grid mx-auto">
                    <button type="reset" name="btnReset" class="btn btn-primary"><a href="register_h.php"
                            style="text-decoration: none; color: white;">Register</a></button>
                </div> -->
            </div>
        </div>
    </form>
</div>