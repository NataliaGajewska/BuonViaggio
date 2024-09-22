<?php
include('../includes/connect.php');
include('../function/common_function.php');

if (!isset($_SESSION)) {
    session_start();
}

// usname z ses
if (isset($_SESSION['username'])) {
    $user_username = $_SESSION['username'];

    // usid z usname
    $query = "SELECT user_id FROM `user` WHERE user_name='$user_username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $user_id = $row['user_id'];
    } else {
        die("Nie znaleziono użytkownika.");
    }
} else {
    die("Użytkownik nie jest zalogowany.");
}

$get_ip_address = get_IP_Address();
$total_price = 0;
$total_trips = 0;
$cart_query = "SELECT * FROM `cart` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query);
$invoice_number = mt_rand();
$status = 'przyjety do realizacji';

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $trip_id = $row_price['trip_id'];
    $quantity = $row_price['quantity'];
    $cart_trip = "SELECT * FROM `trip` WHERE trip_id=$trip_id";
    $run_price = mysqli_query($con, $cart_trip);
    while ($row_trip_price = mysqli_fetch_array($run_price)) {
        $trip_price = $row_trip_price['trip_price'];
        $total_price += ($trip_price * $quantity);
        $total_trips += $quantity;

        $insert_order = "INSERT INTO `user_order` (user_id, invoice_number, trip_id, quantity, amount, total_trips, order_date, order_status) VALUES ($user_id, $invoice_number, $trip_id, $quantity, $total_price, $total_trips, NOW(), '$status')";
        $result_order = mysqli_query($con, $insert_order);
        if (!$result_order) {
            die(mysqli_error($con));
        }
    }
}

$empty_cart = "DELETE FROM `cart` WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);

if ($result_delete) {
    echo "<script>alert('Zamówienie zostało złożone poprawnie')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
?>
