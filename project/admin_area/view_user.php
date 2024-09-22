<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wszyscy użytkownicy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Wszystkie użytkownicy</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <?php
                    $get_user="Select * from `user`";
                    $result_user=mysqli_query($con,$get_user);
                    while($row_user=mysqli_fetch_assoc($result_user)){
                        $user_id=$row_user['user_id'];
                        $user_name=$row_user['user_name'];
                        $user_picture=$row_user['user_picture'];
                        $user_mobile=$row_user['user_mobile'];
                        $role=$row_user['role'];

                        echo"
                        <tbody>
                            <tr>
                                <td>$user_id</td>
                                <td>$user_name</td>
                                <td>$user_mobile</td>
                                <td>$role</td>
                                <td><a href='index.php?edit_user=$user_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                <td><a href='index.php?delete_user=$user_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            
                         </tbody>
                        ";
                    }

                ?>
                <thead>
                    <tr>
                        <th class='cart_table'>Numer użytkownika</th>
                        <th class='cart_table'>Nazwa użytkownika</th>

                        
                        <th class='cart_table'>Telefon użytkownika</th>
                        <th class='cart_table'>Rola</th>
                        <th class='cart_table'>Edytuj</th>
                        <th class='cart_table'>Usuń</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>


</body>
</html>
