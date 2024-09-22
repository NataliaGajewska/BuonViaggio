<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Wszystkie tematy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Wszystkie tematy</h1>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <?php
                    $get_topic="Select * from `topic`";
                    $result_topics=mysqli_query($con,$get_topic);
                    while($row_orders=mysqli_fetch_assoc($result_topics)){
                        $topic_id=$row_orders['topic_id'];
                        $topic_title=$row_orders['topic_title'];
                        echo"
                        <tbody>
                            <tr>
                                <td>$topic_id</td>
                                <td>$topic_title</td>
                                <td><a href='index.php?edit_topic=$topic_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                <td><a href='index.php?delete_topic=$topic_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            
                         </tbody>
                        ";
                    }

                ?>
                <thead>
                    <tr>
                        <th class='cart_table'>Numer tematu</th>
                        <th class='cart_table'>Nazwa tematu</th>
                        <th class='cart_table'>Edytuj</th>
                        <th class='cart_table'>Usuń</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>


</body>
</html>
