<?php
if (isset($_GET['delete_order'])) {
    $delete_id=$_GET['delete_order'];
    $delete_query="Delete from `user_order` where order_id='$delete_id'";
    $result_delete= mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Zamówienie usunięte')</script>";
    }else{
        echo "<script>alert('Błąd podczas usuwania')</script>";
     
    }
}
?>

