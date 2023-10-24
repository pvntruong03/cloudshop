<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="Shomepage.css">

    <title>Homepage</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fasthand&display=swap');

    .dropdown:hover .dropdown-menu{
    display: block;
}a
</style>
<body>
    <!--Nav bar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">ATN Shop</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navsup">
                <!--Left-->
                <div class="navbar-nav">
                    <a href="cart.php" class="nav-link">Cart</a>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>


                        <div class="dropdown-menu">
                            <a href="productadd.php" class="dropdown-item">Product Add</a>
                            <a href="" class="dropdown-item">Product Delete</a>
                        </div>
                    </div>
                    <div class="Search">
                        <a href="search.php" class="nav-link">Search</a>
                    </div>
                </div>
                <?php 
                    session_start();
                    if(isset($_SESSION['user_name'])):
                ?>
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="nav-link">Welcome,<?=$_SESSION['user_name']?></a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
                <?php 
                else
                :
                ?>
                <!--Right--> 
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="nav-link">Login</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </nav>
    <!--Section-->
    <section class="py-5 text-center container" style="background-image: url(img/Back.jpg); height:300px; width:700px;background-repeat: no-repeat;background-size:cover;">
            
     </section>

    <!-- <div class="b-example-divider" style="height: 3rem; background-color: rgba(0, 0, 0, .1); border: solid rgba(0, 0, 0, .15); 
    border-width: 1px 0; box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1);"></div>
    <h2 class="pb-2 border-bottom">Hot products</h2> -->
