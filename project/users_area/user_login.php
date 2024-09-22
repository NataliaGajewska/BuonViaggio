<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../includes/connect.php');
include('../function/common_function.php');


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
    
<div class="container-fluid m-3">
    <h1 class="text-center">Logowanie</h1>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <!-- username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Nazwa użytkownika</label>
                    <input type="text" id="user_username" class="form-control" placeholder="podaj nazwę użytkownika" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- pass field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Hasło</label>
                    <input type="password" id="user_password" class="form-control" placeholder="podaj hasło" autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="Zaloguj" class="action_button text-center" name="user_login">
                    <p class="mt-2 pt-1"><strong>Nie masz jeszcze konta?<a href="user_registration.php"> Zarejestruj się</a> </strong></p>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user` WHERE user_name='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = get_IP_Address();

    //car item
    $select_query_cart = "SELECT * FROM `cart` WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($result_cart);
    

    if($row_count > 0){
        if(password_verify($user_password, $row_data['user_password'])){
            $_SESSION['username'] = $user_username;
            $user_role = $row_data['role'];
            
            if($user_role == '1'){
                echo "<script>alert('Zalogowano poprawnie jako admin')</script>";
                echo "<script>window.open('../admin_area/index.php','_self')</script>";
            } else {
                if($row_count_cart == 0){
                    echo "<script>alert('Zalogowano poprawnie')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                } else {
                    echo "<script>alert('Zalogowano poprawnie')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
            }            
        } else {
            echo "<script>alert('Nieprawidłowe dane')</script>";
        }
    } else {
        echo "<script>alert('Nieprawidłowe dane')</script>";
    }
}
?>