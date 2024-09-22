<?php
if (isset($_GET['delete_user'])) {
    $delete_id=$_GET['delete_user'];
    $delete_query="Delete from `user` where user_id='$delete_id'";
    $result_delete= mysqli_query($con, $delete_query);
    if($result_delete){
        echo "<script>alert('Użytkownik usunięty')</script>";
    }else{
        echo "<script>alert('Błąd podczas usuwania')</script>";
     
    }
}
?>

