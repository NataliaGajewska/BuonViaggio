<?php
if (isset($_GET['edit_trips'])) {
    $edit_id = $_GET['edit_trips'];
    $get_data = "SELECT * FROM `trip` WHERE trip_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $trip_title = $row['trip_title'];
    $trip_description = $row['trip_description'];
    $trip_tags = $row['trip_tags'];
    $trip_topic = $row['topic_id'];
    $trip_continent = $row['trip_continent'];
    $trip_price = $row['trip_price'];
    $trip_picture = $row['trip_picture'];
    $trip_start_date = $row['trip_start_date'];
    $trip_end_date = $row['trip_end_date'];
}

if (isset($_POST['trip_update'])) {
    $update_trip_id = $_GET['edit_trips'];
    $update_trip_title = $_POST['trip_title'];
    $update_trip_description = $_POST['trip_description'];
    $update_trip_tags = $_POST['trip_tags'];
    $update_trip_topic= $_POST['trip_topiv'];
    $update_trip_continent = $_POST['trip_continent'];
    $update_trip_price = $_POST['trip_price'];
    $update_trip_start_date = $_POST['trip_start_date'];
    $update_trip_end_date = $_POST['trip_end_date'];

    // Obsługa przesyłania pliku
    $update_trip_picture = $_FILES['trip_picture']['name'];
    $temp_trip_picture = $_FILES['trip_picture']['tmp_name'];

    // Sprawdzenie czy plik został przesłany
    if (!empty($update_trip_picture)) {
        move_uploaded_file($temp_trip_picture, "./trip_pics/$update_trip_picture");
    }

    
    $update_trip_query = "UPDATE `trip` SET trip_title='$update_trip_title', trip_description='$update_trip_description', trip_tags='$update_trip_tags', topic_id='$update_tirp_topic', trip_continent='$update_trip_continent', trip_price='$update_trip_price', trip_picture='$update_trip_picture', trip_start_date='$update_trip_start_date', trip_trip_end_date='$update_trip_end_date' WHERE trip_id='$update_trip_id'";
    $update_trip = mysqli_query($con, $update_trip_query);

    if ($update_trip) {
        echo "<script>alert('Wycieczka została zaktualizowana');</script>";
    } else {
        echo "<script>alert('Aktualizacja nie powiodła się');</script>";
    }
}
?>

<div class="container mt-5 text-center">
    <h1 class="text-center">Edytuj wyczieczke</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <label for="trip_title" class="from-label">Nazwa wycieczki</label>
            <input type="text" class="form-control input_field" name="tript_title" value="<?php echo isset($trip_title) ? $trip_title : ''; ?>" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4">
            <label for="trip_description" class="from-label">Opis wycieczki</label>
            <input type="text" class="form-control input_field" name="trip_description" value="<?php echo isset($trip_description) ? $trip_description : ''; ?>" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4">
            <label for="trip_tags" class="from-label">Tagi</label>
            <input type="text" class="form-control input_field" name="trip_tags" value="<?php echo isset($trip_tags) ? $trip_tags : ''; ?>" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4">
            <label for="trip_price" class="from-label">Cena</label>
            <input type="text" class="form-control input_field" name="trip_price" value="<?php echo isset($trip_price) ? $trip_price : ''; ?>" autocomplete="off" required>
        </div>
        <div class="form-outline mb-4">
            <label for="trip_picture" class="from-label">Zdjęcie</label>
            <input type="file" class="form-control input_field" name="trip_picture" autocomplete="off">
        </div>
        <div class="form-outline mb-4">
            <label for="trip_topic" class="form-label">Tematyka</label>
            <select name="trip_topic" id="trip_topic" class="form-select input_field" required>
                <option value="" disabled selected>Wybierz temat</option>
                <?php
                $select_query = "SELECT * FROM `topic`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $topic_title = $row['topic_title'];
                    $topic_id = $row['topic_id'];
                    echo "<option value='$topic_id'>$topic_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-4 m-auto w-100">
            <label for="trip_continent" class="form-label">Rodzaj produktu</label>
            <select name="trip_continent" id="trip_continent" class="form-select input_field" required>
                <option value="" disabled selected>Wybierz kontynent</option>
                <option value="Europa">Europa</option>
                <option value="Afryka">Afryka</option>
                <option value="Azja">Azja</option>
                <option value="Ameryka Północna">Ameryka Północna</option>
                <option value="Ameryka Połódniowa">Ameryka Połódniowa</option>
            </select>
        </div>
        <input type="submit" value="Edytuj" class="btn btn-secondary py-2 px-3" name="trip_update">
    </form>
</div>
