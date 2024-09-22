<?php
include('../includes/connect.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['insert_topic'])) {
    $topic_title = $_POST['topic_title'];

    // Sprawdzenie czy temat już istnieje
    $select_query = "SELECT * FROM `topic` WHERE topic_title='$topic_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    
    if ($number > 0) {
        echo "<script>alert('Taka tematyka już istnieje')</script>";
    } else {
        $insert_query = "INSERT INTO `topic` (topic_title) VALUES ('$topic_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Tematyka dodana pomyślnie')</script>";
        } else {
            echo "<script>alert('Błąd podczas dodawania tematyki')</script>";
        }
    }
}
?>

<h2 class="text-center">Dodaj Tematyke</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tag"></i></span>
            <input type="text" class="form-control input_field" name="topic_title" placeholder="Dodaj temat" autocomplete="off">
        </div>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="action_button" name="insert_topic" value="Dodaj temat">
    </div>
</form>
