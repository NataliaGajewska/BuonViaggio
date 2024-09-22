<?php
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
    <h1 class="text-center">Rejestracja</h1>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Nazwa użytkownika</label>
                    <input type="text" id="user_username" class="form-control" placeholder="podaj nazwę użytkownika" autocomplete="off" required="required" name="user_username"/>
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">E-mail</label>
                    <input type="text" id="user_email" class="form-control" placeholder="podaj email" autocomplete="off" required="required" name="user_email"/>
                </div>
                <!-- user pic -->
                <div class="form-outline mb-4">
                    <label for="user_pic" class="form-label">Dodaj zdjęcie</label>
                    <input type="file" id="user_pic" class="form-control" required="required" name="user_pic"/>
                </div>
                <!-- pass field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Hasło</label>
                    <input type="password" id="user_password" class="form-control" placeholder="podaj hasło" autocomplete="off" required="required" name="user_password"/>
                </div>
                <!-- conf field -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Potwierdź hasło</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="podaj hasło" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <!-- addres field -->
                <div class="form-outline mb-4">
                    <label for="user_addres" class="form-label">Adres</label>
                    <input type="text" id="user_addres" class="form-control" placeholder="podaj swój adres" autocomplete="off" required="required" name="user_addres"/>
                </div>
                <!-- phn field -->
                <div class="form-outline mb-4">
                    <label for="user_phn" class="form-label">Numer telefonu</label>
                    <input type="text" id="user_phn" class="form-control" placeholder="podaj swój numer telefonu" autocomplete="off" required="required" name="user_phn"/>
                </div>
                <div class="text-center mt-4 pt-2">
                    <input type="submit" value="Zarejestruj" class="action_button text-center" name="user_register">
                    <p class="mt-2 pt-1"><strong>Masz już konto?<a href="user_login.php"> Zaloguj się</a> </strong></p>
                </div>
            </form>
        </div>
    </div>
</div>



    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //#psw
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_addres = $_POST['user_addres'];
    $user_phn = $_POST['user_phn'];
    $user_ip = get_IP_Address();
    
    if ($user_password !== $conf_user_password) {
        echo "<script>alert('Wprowadzane hasła nie są takie same')</script>";
        exit();
    }
    if (!is_numeric($user_phn) || strlen($user_phn) != 9) {
        echo "<script>alert('Numer telefonu nie jest poprawny')</script>";
        exit();
    }

    // spr username
    $select_query_username = "SELECT * FROM `user` WHERE user_name='$user_username'";
    $result_username = mysqli_query($con, $select_query_username);
    $rows_count_username = mysqli_num_rows($result_username);
    
    // spr email
    $select_query_email = "SELECT * FROM `user` WHERE user_email='$user_email'";
    $result_email = mysqli_query($con, $select_query_email);
    $rows_count_email = mysqli_num_rows($result_email);

    // js if user pr
    if ($rows_count_username > 0) {
        echo "<script>alert('Ta nazwa użytkownika już jest zajęta')</script>";
    }
    // js if email pr
    elseif ($rows_count_email > 0) {
        echo "<script>alert('Ten adres email już jest zajerestrowany')</script>";
    }
    else {
        // Pic
        $user_pic = $_FILES['user_pic']['name'];
        $user_pic_temp = $_FILES['user_pic']['tmp_name'];
        move_uploaded_file($user_pic_temp, "./user_pics/$user_pic");
        
        $insert_query = "INSERT INTO `user` (user_name, user_email, user_password, user_picture, user_ip, user_address, user_mobile, role) VALUES ('$user_username', '$user_email', '$hash_password', '$user_pic', '$user_ip', '$user_addres', '$user_phn', 'user')";
        $sql_execute = mysqli_query($con, $insert_query);
        
        if($sql_execute){
            echo "<script>alert('Użytkownik dodany')</script>";
        } else {
            die(mysqli_error($con));
        }
    }

    //sel cart items
    $celect_cart_items="Select * from `cart` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $celect_cart_items);
    $rows_count_cart = mysqli_num_rows($result_cart);
    if($rows_count_cart>0){
        $_SESSION['username']=$user_username;
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>
