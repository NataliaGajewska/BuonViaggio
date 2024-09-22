<?php
if (isset($_GET['delete_trips'])) {
    $delete_id=$_GET['delete_trips'];
    $delete_query="Delete from `trip` where trip_id='$delete_id'";
    $result_delete= mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Wycieczka usunięta')</script>";
    }else{
        echo "<script>alert('Błąd podczas usuwania')</script>";
     
    }
}
?>

