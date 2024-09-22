<?php
include('../includes/connect.php');
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['edit_account'])) {
    if (isset($_SESSION['username'])) {
        $user_session_name = $_SESSION['username'];
        $select_query = "SELECT * FROM user WHERE user_name='$user_session_name'";
        $result_query = mysqli_query($con, $select_query);

        if ($result_query && mysqli_num_rows($result_query) > 0) {
            $row_fech = mysqli_fetch_assoc($result_query);
                $user_id = $row_fech['user_id'];
                $user_name = $row_fech['user_name'];
                $user_email = $row_fech['user_email'];
                $user_address = $row_fech['user_address'];
                $user_mobile = $row_fech['user_mobile'];
}}}

if (isset($_POST['user_update'])) {
    $update_user_id = $_POST['user_id'];
    $update_user_name = $_POST['user_username'];
    $update_user_email = $_POST['user_email'];
    $update_user_address = $_POST['user_address'];
    $update_user_mobile = $_POST['user_mobile'];

    $update_query = "UPDATE `user` SET user_name='$update_user_name', user_email='$update_user_email', user_address='$update_user_address', user_mobile='$update_user_mobile' WHERE user_id='$update_user_id'";
    $result_update_query = mysqli_query($con, $update_query);
    if ($result_update_query) {
        echo "<script>alert('Konto zostało zaktualizowane');</script>";
    } else {
        echo "<script>alert('Aktualizacja nie powiodła się');</script>";
    }
}
?>

<h2 class="text-center">Edytuj konto</h2>
<form action="" method="post" class="mb-2 text-center" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : ''; ?>">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo isset($user_name) ? $user_name : ''; ?>" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo isset($user_email) ? $user_email : ''; ?>" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo isset($user_address) ? $user_address : ''; ?>" autocomplete="off" required>
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo isset($user_mobile) ? $user_mobile : ''; ?>" autocomplete="off" required>
    </div>

    <input type="submit" value="Edytuj" class="btn btn-secondary py-2 px-3" name="user_update">
</form>
