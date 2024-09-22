<?php
    include('includes/connect.php');
    include('function/common_function.php');
    if (!isset($_SESSION)) {
      session_start();
  }
?>

<!DOCTYPE HTML>
<HTML lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Biuro podróży</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom CSS link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0 ">
        <!-- first child -->
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
          <a class="nav-link" href="details.php">Kontakt</a>
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
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Suma: <?php total_cart_price(); ?></a>
        </li>
        </li>
      </ul>
      <form class="d-flex" action="search_trip.php" method="get">
        <input class="btn btn-outline-light form-control me-2" type="search" placeholder="wyszukaj wycieczki" name="search_data">
         <input type="submit" value="Szukaj" class="btn btn-outline-light" name="search_data_trip">
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
<div class="bg-light container-fluid">
    <h3 class="text-center">Nasze wycieczki</h3>
<div>

<?php
  cart();
?>

<!-- third child -->

<div class="row">
    <div class="col-md-10 ">
        <!-- wycieczki -->
         <div class="row container-fluid">
           <?php
            //function from cmn fct
            get_all_trips();
            get_uniqe_topics();
           ?>
        </div>
    </div>
    <div class="col-md-2 bold-text container-fluid">
        <!-- Tematy / sidenav -->
         <ul class="navbar-nav me-auto">
            <li class="nav-item ">
                <a href="#" class="nav-link"><h4>Tematyka:</h4></a>
            </li>
            <?php
              //function from cmn fct
              get_topics();
            ?>       

        </div>
    </div>


<!-- last child -->

<div class="text-center">
    <p>BuonViaggio</p>
     </div> 

    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	
</body>
</html>
