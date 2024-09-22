<?php
if (isset($_GET['edit_order'])) {
    $edit_id = $_GET['edit_order'];
    $get_data = "SELECT * FROM `user_order` WHERE order_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['status_update'])) {
    $update_status_id = $_GET['edit_order'];
    $update_order_status = $_POST['order_status'];
    
    $update_product_query = "UPDATE `user_order` SET order_status='$update_order_status' WHERE order_id='$update_status_id'";
    $update_user_order = mysqli_query($con, $update_product_query);

    if ($update_user_order) {
        echo "<script>alert('Status został zaktualizowany');</script>";
    } else {
        echo "<script>alert('Aktualizacja nie powiodła się');</script>";
    }
}
?>

<div class="container mt-5 text-center">
    <h1 class="text-center">Edytuj status</h1>
    <form action="" method="post">
        <div class="mb-4 m-auto w-100">
            <label for="order_status" class="form-label">Status</label>
            <select name="order_status" id="order_status" class="form-select input_field" required>
                <option value="" disabled selected>order_status</option>
                <option value="przyjety do realizacji">przyjety do realizacji</option>
                <option value="w trakcie realizacji">w trakcie realizacji</option>
                <option value="zrealizowany">zrealizowany</option>
            </select>
        </div>
        <input type="submit" value="Edytuj" class="btn btn-secondary py-2 px-3" name="status_update">
    </form>
</div>
