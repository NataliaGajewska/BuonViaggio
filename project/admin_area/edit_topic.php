<?php
if (isset($_GET['edit_topic'])) {
    $edit_id = $_GET['edit_topic'];
    $get_data = "SELECT * FROM `topic` WHERE topic_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $topic_title = $row['topic_title'];
}

if (isset($_POST['topic_update'])) {
    $update_topic_id = $_GET['edit_topic'];
    $update_topic_title = $_POST['topic_title'];
    $update_topic_query = "UPDATE `topic` SET topic_title='$update_topic_title' WHERE topic_id='$update_topic_id'";
    $update_topic = mysqli_query($con, $update_topic_query);

    if ($update_topic) {
        echo "<script>alert('Temat został zaktualizowany'');</script>";
    } else {
        echo "<script>alert('Aktualizacja nie powiodła się');</script>";
    }
}
?>

<div class="container mt-5 text-center">
    <h1 class="text-center">Edytuj tematy</h1>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="topic_title" class="from-label">Nazwa tematu</label>
            <input type="text" class="form-control input_field" name="topic_title" value="<?php echo isset($topic_title) ? $topic_title : ''; ?>" autocomplete="off" required>
        </div>
        
        <input type="submit" value="Edytuj" class="btn btn-secondary py-2 px-3" name="topic_update">
    </form>
</div>
