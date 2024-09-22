<?php
    include('../includes/connect.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
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
                            </li>
                                <li class='nav-item'>
                                <a class='nav-link' href='user_registration.php'>Rejestracja</a>
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
                    </ul>
                    <form class="d-flex" action="search_trip.php" method="get">
                        <input class="btn btn-outline-light form-control me-2" type="search" placeholder="wyszukaj wycieczki" name="search_data">
                        <input type="submit" value="Szukaj" class="btn btn-outline-light" name="search_data_trip">
                    </form>
                </div>
            </div>
        </nav>

        <!-- wywołanie koszyka -->
        <!-- Nagłówek -->


        <!-- Zawartość strony -->

                <div class="row container-fluid">
                    <?php
                        if(!isset($_SESSION['username'])){
                            include('user_login.php');
                        }else{
                            include('payment.php');
                        }
                    ?>
                </div>
 


        <!-- Stopka -->
        <div class="text-center">
            <p>Super biuro podróży</p>
        </div>

        <!-- bootstrap JS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
