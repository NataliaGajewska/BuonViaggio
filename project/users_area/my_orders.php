<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wszystkie zamówienia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
    $username=$_SESSION['username'];
    $get_user="Select * from `user` where user_name='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
?>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Wszystkie zamówienia</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <?php
                    $get_order_details="Select * from `user_order` where user_id='$user_id'";
                    $result_orders=mysqli_query($con,$get_order_details);
                    $number=1;
                    while($row_orders=mysqli_fetch_assoc($result_orders)){
                        $order_id=$row_orders['order_id'];
                        $order_amount=$row_orders['amount'];
                        $order_invoice_number=$row_orders['invoice_number'];
                        $order_total_trips=$row_orders['total_trips'];
                        $order_order_date=$row_orders['order_date'];
                        $order_order_status=$row_orders['order_status'];
                        

                        echo"
                        <tbody>
                            <tr>
                                <td>$number</td>
                                <td>$order_total_trips</td>
                                <td>$order_invoice_number</td>
                                <td>$order_amount</td>
                                <td>$order_order_date</td>
                                <td>$order_order_status</td>
                            </tr>
                            
                         </tbody>
                        ";
                        $number++;
                    }

                ?>
                <thead>
                    <tr>
                        <th class='cart_table'>Numer zamówienia</th>
                        <th class='cart_table'>Liczba wycieczek</th>
                        <th class='cart_table'>Numer faktury</th>
                        <th class='cart_table'>Kwota</th>
                        <th class='cart_table'>Data</th>
                        <th class='cart_table'>Status</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>


</body>
</html>
