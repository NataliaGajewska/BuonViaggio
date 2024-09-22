<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wszystkie wycieczki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Wszystkie wycieczki</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <?php
                    $get_trips="Select * from `trip`";
                    $result_orders=mysqli_query($con,$get_trips);
                    while($row_orders=mysqli_fetch_assoc($result_orders)){
                        $trip_id=$row_orders['trip_id'];
                        $trip_title=$row_orders['trip_title'];
                        //pic
                        $trip_picture=$row_orders['trip_picture'];
                        //
                        $trip_price=$row_orders['trip_price'];
                        $Status=$row_orders['Status'];
                        
                        $get_counts="Select * from `pending_orders` where trip_id=$trip_id";
                        $result_counts=mysqli_query($con,$get_counts);
                        $rows_count=mysqli_num_rows($result_counts);

                        echo"
                        <tbody>
                            <tr>
                                <td>$trip_id</td>
                                <td>$trip_title</td>
                                <td> <img src='./trip_pics/$trip_picture' class='cart_img' alt='...'></td>
                                <td>$trip_price</td>
                                <td>$rows_count</td>
                                <td>$Status</td>
                                <td><a href='index.php?edit_trips=$trip_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                <td><a href='index.php?delete_trips=$trip_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            
                         </tbody>
                        ";
                    }

                ?>
                <thead>
                    <tr>
                        <th class='cart_table'>Numer wycieczki</th>
                        <th class='cart_table'>Nazwa wycieczki</th>
                        <th class='cart_table'>Zdjęcie wycieczki</th>
                        <th class='cart_table'>Cena</th>
                        <th class='cart_table'>Liczba sprzedanych</th>
                        <th class='cart_table'>Status</th>
                        <th class='cart_table'>Edytuj</th>
                        <th class='cart_table'>Usuń</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>


</body>
</html>
