<?php
    include('../includes/connect.php');
    include('../function/common_function.php');
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Biuro podróży</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- custom CSS link -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../details.php">Kontakt</a>
                        </li>
                        <?php
                        if(!isset($_SESSION['username'])){
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='user_login.php'>Logowanie</a>
                            </li>";
                        }else{
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='profile.php'>Mój profil</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='logout.php'>Wyloguj</a>
                            </li>";
                        }
                        ?>

<li class='nav-item'>
            <a class='nav-link' href='../display_all.php'>Wszystkie wycieczki</a>
          <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Suma: <?php total_cart_price(); ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_trip.php" method="get">
                        <input class="btn btn-outline-light form-control me-2" type="search" placeholder="wyszukaj wycieczki" name="search_data">
                        <input type="submit" value="Szukaj" class="btn btn-outline-light" name="search_data_trip">
                    </form>
                </div>
            </div>
        </nav>

        <!-- wywołanie koszyka -->
        <?php
            cart();
        ?>
        <!-- Nagłówek -->
        <div class="row" style="margin-top: 50px; margin-left: 20px;">
            <div class="col-md-2">
                <ul class="navbar-nav text-center" style="height: 100vh">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><h4 style="margin-bottom: 10px;">Hejka <?php echo $_SESSION['username']?></h4></a>
                    </li>
                    <?php
                        $username=$_SESSION['username'];
                        $user_pic="Select * from `user` where user_name='$username'";
                        $result_pic=mysqli_query($con,$user_pic);
                        $row_pic=mysqli_fetch_array($result_pic);
                        $user_pic=$row_pic['user_picture'];
                        echo"
                        <li class='nav-item'>
                            <img src='./user_pics/$user_pic' alt='' class='image_container'>
                        </li>
                        ";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><h4 style="margin-bottom: 10px;">Oczekujące zamówienia</h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?edit_account"><h4 style="margin-bottom: 10px;">Edytuj konto</h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?my_orders"><h4 style="margin-bottom: 10px;">Moje zamówienia</h4></a>
                    </li>
                </ul>
            </div>
                <div class="col-md-10">
                <?php
                usr_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('my_orders.php');
                }
                ?>
            </div>
        </div>

        



        

        <!-- Stopka -->
        <div class="text-center">
            <p>Biuro podróży</p>
        </div>

        <!-- bootstrap JS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
