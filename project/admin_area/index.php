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
    <title>Profil Admina</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../users_area/logout.php">Wyloguj</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <h3 class="text-center p-2">Zarządzaj zarządco</h3>
        </div>

        <div class="row">
            <div class="col-md-10 p-3 d-flex align-items-center">
                <div class="p-5">
                    <a href="#"><img src="../images/admin_pic.png" alt="Admin Image" class="admin_image"></a>
                    
                </div>
                <div class="button text-center">
                    <button><a href="index.php?insert_trip" class="admin_button">Dodaj wycieczke</a></button>
                    <button><a href="index.php?view_trips" class="admin_button">Zobacz wycieczki</a></button>
                    <button><a href="index.php?insert_topic" class="admin_button">Dodaj tematyke</a></button>
                    <button><a href="index.php?view_topics" class="admin_button">Zobacz tematy</a></button>
                    <button><a href="index.php?view_orders" class="admin_button">Wszystkie zamówienia</a></button>
                    <button><a href="index.php?view_user" class="admin_button">Lista użytkowników</a></button>
                </div>
            </div>
        </div>

        <div class="container">
            <?php
                if (isset($_GET['insert_topic'])) {
                    include('insert_topic.php');
                }
                if (isset($_GET['insert_trip'])) {
                    include('insert_trip.php');
                }
                if (isset($_GET['view_trips'])) {
                    include('view_trips.php');
                }
                if (isset($_GET['edit_trips'])) {
                    include('edit_trips.php');
                }
                if (isset($_GET['delete_trips'])) {
                    include('delete_trips.php');
                }
                if (isset($_GET['view_topics'])) {
                    include('view_topics.php');
                }
                if (isset($_GET['edit_topic'])) {
                    include('edit_topic.php');
                }
                if (isset($_GET['delete_topic'])) {
                    include('delete_topic.php');
                }
                if (isset($_GET['view_orders'])) {
                    include('view_orders.php');
                }
                if (isset($_GET['edit_order'])) {
                    include('edit_order.php');
                }
                if (isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }
                if (isset($_GET['view_user'])) {
                    include('view_user.php');
                }
                if (isset($_GET['edit_user'])) {
                    include('edit_user.php');
                }
                if (isset($_GET['delete_user'])) {
                    include('delete_user.php');
                }
            ?>
        </div>
    </div>

    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
