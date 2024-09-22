<?php
include('../includes/connect.php');
if (isset($_POST['insert_trip'])) {
    $trip_title = $_POST['trip_title'];
    $trip_description = $_POST['trip_description'];
    $trip_topic = $_POST['trip_topic'];
    $trip_continent = $_POST['trip_continent'];
    $trip_price = $_POST['trip_price'];
    $trip_tags = $_POST['trip_tags'];
    $trip_status='true';
    $trip_start_date = $_POST['trip_start_date'];
    $trip_end_date = $_POST['trip_end_date'];
    //accessing pic
    $trip_picture = $_FILES['trip_picture']['name'];
    //accessing pic temp name
    $temp_picture = $_FILES['trip_picture']['tmp_name'];
    //checking empty condition
    if(!is_numeric($trip_price)){
        echo "<script>alert('Wpisz poprawną kwotę')</script>";
    }else{
        move_uploaded_file($temp_picture,"./trip_pics/$trip_picture");
        $insert_trip = "Insert into `trip` (trip_title,trip_description,topic_id,trip_continent,trip_picture,trip_price,Date,Status,trip_tags,trip_start_date,trip_end_date) values ('$trip_title','$trip_description','$trip_topic','$trip_continent','$trip_picture','$trip_price',NOW(),'$trip_status', '$trip_tags', '$trip_start_date', '$trip_end_date')";
        $result = mysqli_query($con, $insert_trip);
        if($result){
            echo "<script>alert('Wycieczka dodana poprawnie')</script>";
        }
    }
}

?>
 
<h2 class="text-center">Dodaj wyczieczkę</h2>
<form action="" method="post" enctype="multipart/form-data" class="mb-2">
    <!-- trip name -->
    <div class="mb-4">
        <label for="trip_title" class="form-label">Nazwa wycieczki</label>
        <input type="text" class="form-control input_field" name="trip_title" placeholder="Podaj nazwe" autocomplete="off" required>
    </div>
    <!-- product desc -->
    <div class="mb-4">
        <label for="trip_description" class="form-label">Opis wycieczki</label>
        <input type="text" class="form-control input_field" name="trip_description" placeholder="Podaj opis wycieczki" autocomplete="off" required>
    </div>
    <!-- tags -->
    <div class="mb-4">
        <label for="trip_tags" class="form-label">Tagi</label>
        <input type="text" class="form-control input_field" name="trip_tags" placeholder="Dodaj tagi" autocomplete="off" required>
    </div>
     <!-- prodcut type -->
     <div class="mb-4 m-auto w-100">
        <label for="trip_continent" class="form-label">Kontynent</label>
        <select name="trip_continent" id="trip_continent" class="form-select input_field" required>
            <option value="" disabled selected>Wybierz kontynent</option>
            <option value="Europa">Europa</option>
            <option value="Afryka">Afryka</option>
            <option value="Azja">Azja</option>
            <option value="Ameryka Północna">Ameryka Północna</option>
            <option value="Ameryka Połuniowa">Ameryka Połuniowa</option>
        </select>
    </div>
    <!-- topic -->
    <div class="mb-4 m-auto w-100">
        <label for="trip_topic" class="form-label">Tematyka</label>
        <select name="trip_topic" id="trip_topic" class="form-select input_field" required>
            <option value="" disabled selected>Wybierz tematyke</option>
            <?php
                $select_query="Select * from `topic`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $topic_title=$row['topic_title'];
                    $topic_id=$row['topic_id'];
                    echo"<option value='$topic_id'>$topic_title</option>";
                }

            ?>
        </select>
    </div>
    <!-- pic -->
    <div class="mb-4">
        <label for="trip_picture" class="form-label">Zdjęcie wycieczki</label>
        <input type="file" class="form-control input_field" name="trip_picture" id="trip_picture" required>
    </div>
    <!-- price -->
    <div class="mb-4">
        <label for="trip_price" class="form-label">Cena wycieczki</label>
        <input type="text" class="form-control input_field" name="trip_price" placeholder="Podaj cene" autocomplete="off" required>
    </div>
    <div class="mb-4">
        <label for="trip_start_date" class="form-label">Data rozpoczęcia</label>
        <input type="text" class="form-control input_field" name="trip_start_date" placeholder="Podaj date startu" autocomplete="off" required>
    </div>
    <div class="mb-4">
        <label for="trip_end_date" class="form-label">Data zakończenia</label>
        <input type="text" class="form-control input_field" name="trip_end_date" placeholder="Podaj date zakończenia" autocomplete="off" required>
    </div>

    <!-- submit -->
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="action_button" name="insert_trip" value="Dodaj wycieczke">
    </div>
</form>



