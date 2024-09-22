<?php
    include('includes/connect.php');
    include('function/common_function.php');
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Koszyk</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- custom CSS link -->
    <link rel="stylesheet" href="style.css">
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
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontakt</a>
                        </li>
                        <?php
                            if(!isset($_SESSION['username'])){
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='./users_area/user_login.php'>Logowanie</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='./users_area/user_registration.php'>Rejestracja</a>
                            </li>";
                            }else{
                            echo"
                            <li class='nav-item'>
                                <a class='nav-link' href='./users_area/profile.php'>Mój profil</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='./users_area/logout.php'>Wyloguj</a>
                            </li>";
                        }
                        ?>
                         <li class='nav-item'>
            <a class='nav-link' href='display_all.php'>Wszystkie wycieczki</a>
          <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Suma: <?php total_cart_price(); ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_trip.php" method="get">
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
        <div class="bg-light container-fluid">
            <h3 class="text-center">Koszyk</h3>
        </div>

        <!-- Zawartość strony -->
        <div class="container">
            <div class="row">
                <form action="" method="post">    
                    <table class="table table-bordered text-center">
                        <tbody>
                            <?php
                            global $con;
                            $ip = get_IP_Address();
                            $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
                            $result = mysqli_query($con, $cart_query);
                            $total = 0;
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){
                                echo"
                                <thead>
                                    <tr>
                                    <th class='cart_table'>Nazwa wycieczki</th>
                                    <th class='cart_table'>Zdjęcie</th>
                                    <th class='cart_table'>Ilość</th>
                                    <th class='cart_table'>Cena</th>
                                    <th class='cart_table'>Data rozpoczęcia</th>
                                    <th class='cart_table'>Data zakończenia</th>
                                    <th class='cart_table'>Usuń</th>
                                    <th class='cart_table'>Operacje</th>
                                </tr>
                                </thead>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $trip_id = $row['trip_id'];
                                    $quantity = $row['quantity'];
                                    $select_trips = "SELECT * FROM `trip` WHERE trip_id='$trip_id'";
                                    $result_trips = mysqli_query($con, $select_trips);
                                    $row_trip_price = mysqli_fetch_array($result_trips);
                                    $trip_title = $row_trip_price['trip_title'];
                                    $trip_picture = $row_trip_price['trip_picture'];
                                    $trip_price = $row_trip_price['trip_price'];
                                    $trip_start_date = $row_trip_price['trip_start_date'];
                                    $trip_end_date = $row_trip_price['trip_end_date'];   
                                    $total_price = $trip_price * $quantity;
                                    $total += $total_price;
                                ?>
                                <tr>
                                    <td><?php echo $trip_title; ?></td>
                                    <td><img src='./admin_area/trip_pics/<?php echo $trip_picture; ?>' class='cart_img' alt='...'></td>
                                    <td><input type="text" class="form-input text-center" name="quantity[<?php echo $trip_id; ?>]" value="<?php echo $quantity; ?>"></td>
                                    <td><?php echo $trip_price; ?> zł</td>
                                    <td><?php echo $trip_start_date; ?></td>
                                    <td><?php echo $trip_end_date; ?></td>
                                    <td><button type="submit" class="btn btn-secondary" name="remove_cart" value="<?php echo $trip_id; ?>">Usuń</button></td>
                                    <td>
                                        <input type="submit" value="Odśwież" class='btn btn-secondary' name='update_cart'>
                                    </td>
                                </tr>
                                <?php
                                }
                            }else{
                                echo"<h2 class='text-center'><strong>Koszyk jest pusty :(</strong></h2>";
                            }
                                ?>
                        </tbody>
                    </table>
                    <div>
                        <?php
                        if($result_count>0){
                            echo"
                            <h4 class='px-3'><strong>Suma: $total zł</strong></h4>
                            <a href='./users_area/checkout.php' class='btn btn-secondary'>Zatwierdź</a>";
                        }else{
                            echo "
                                <div class='image_container'>
                                    <img src='./images/confused-removebg-preview.png' alt='WIP'>
                                </div>
                            ";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- PHP code for updating and removing items -->
        <?php
        if (isset($_POST['update_cart'])) {
            foreach ($_POST['quantity'] as $trip_id => $quantity) {
                $update_cart_qnt = "UPDATE `cart` SET quantity=$quantity WHERE ip_address='$ip' AND trip_id=$trip_id";
                if (mysqli_query($con, $update_cart_qnt)) {
                    echo "<script>alert('Koszyk został zaktualizowany!')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                } 
            }
        }

        if (isset($_POST['remove_cart'])) {
            $remove_trip_id = $_POST['remove_cart'];
            $delete_cart_item = "DELETE FROM `cart` WHERE ip_address='$ip' AND trip_id=$remove_trip_id";
            if (mysqli_query($con, $delete_cart_item)) {
                echo "<script>alert('Wycieczka została usnięta z koszyka!')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
            } 
        }
        ?>

        <!-- Stopka -->
        <div class="text-center">
            <p>Super biuro podróży</p>
        </div>

        <!-- bootstrap JS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
