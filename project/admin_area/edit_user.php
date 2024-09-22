<?php
if (isset($_GET['edit_user'])) {
    $edit_id = $_GET['edit_user'];
    $get_data = "SELECT * FROM `user` WHERE user_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['role_update'])) {
    $update_user_id = $_GET['edit_user'];
    $selected_role = $_POST['role'];
    
    // Przypisanie wartości numerycznej
    if (strcasecmp($selected_role, 'admin') == 0) {
        $update_user_role = 1; // 1 dla roli admin
    } else {
        $update_user_role = 0; // 0 dla roli user
    }

    // Zapytanie SQL
    $update_role_query = "UPDATE `user` SET role='$update_user_role' WHERE user_id='$update_user_id'";
    $update_role_result = mysqli_query($con, $update_role_query);

    if ($update_role_result) {
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
            <label for="role" class="form-label">Rola</label>
            <select name="role" id="role" class="form-select input_field" required>
                <option value="" disabled selected>role</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <input type="submit" value="Edytuj" class="btn btn-secondary py-2 px-3" name="role_update">
    </form>
</div>
