<?php
if (isset($_GET['delete_topic'])) {
    $delete_id=$_GET['delete_topic'];
    $delete_query="Delete from `topic` where topic_id='$delete_id'";
    $result_delete= mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Temat został usunięty')</script>";
    }else{
        echo "<script>alert('Błąd podczas usuwania')</script>";
     
    }
}
?>

