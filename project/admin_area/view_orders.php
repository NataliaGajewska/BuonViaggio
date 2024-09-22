<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wszystkie zamówienia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Wszystkie zamówienia</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <?php
                    $get_orders="Select * from `user_order`";
                    $result=mysqli_query($con,$get_orders);
                    $rows_count=mysqli_num_rows($result);
                    if($rows_count>0){
                        while($row_orders=mysqli_fetch_assoc($result)){
                            $order_id=$row_orders['order_id'];
                            $amount=$row_orders['amount'];
                            $invoice_number=$row_orders['invoice_number'];
                            $total_trips=$row_orders['total_trips'];
                            $order_date=$row_orders['order_date'];
                            $order_status=$row_orders['order_status'];
                        
                    
                            echo"
                            <tbody>
                                <tr>
                                    <td>$order_id</td>
                                    <td>$amount</td>
                                    <td>$invoice_number</td>
                                    <td>$total_trips</td>
                                    <td>$order_date</td>
                                    <td>$order_status</td>
                                    <td><a href='index.php?edit_order=$order_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                    <td><a href='index.php?delete_order=$order_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                                </tr>
                                
                            </tbody>
                            ";
                        }
                    }
                    

                ?>
                <thead>
                    <tr>
                        <th class='cart_table'>Numer zamówienia</th>
                        <th class='cart_table'>Kwota</th>
                        <th class='cart_table'>Numer faktury</th>
                        <th class='cart_table'>Liczba produktów</th>
                        <th class='cart_table'>Data</th>
                        <th class='cart_table'>Status</th>
                        <th class='cart_table'>Edytuj status</th>
                        <th class='cart_table'>Usuń</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>


</body>
</html>
