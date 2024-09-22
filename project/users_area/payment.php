<?php
include('../includes/connect.php');
include('../function/common_function.php');

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Płatność</title>
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
    <?php
    $user_ip=get_IP_Address();
    $get_user="Select * from `user` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];

    ?>
    <h1 class="text-center">Płatność</1>
    <div class='text-center mt-4 pt-2'>
    <a href="order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">zapłać gotówką </h2></a>
    </div>

</body>
</html>