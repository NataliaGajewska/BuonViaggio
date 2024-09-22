<?php

function get_trips(){
  global $con;
  if(!isset($_GET['topic'])){
    $select_query="Select * from `trip` order by rand() limit 0,6";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $trip_id=$row['trip_id'];
      $trip_title=$row['trip_title'];
      $trip_description=$row['trip_description'];
      $topic_id=$row['topic_id'];
      $trip_continent=$row['trip_continent'];
      $trip_picture=$row['trip_picture'];
      $trip_price=$row['trip_price'];
      $trip_start_date=$row['trip_start_date'];
      $trip_end_date=$row['trip_end_date'];
      echo "
        <div class='col-md-4 mb-4'> 
          <div class='card'>
            <img src='./admin_area/trip_pics/$trip_picture' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$trip_title</h5>
              <p class='card-text'>$trip_description</p>
              <p class='card-text'>$trip_start_date</p>
              <p class='card-text'>$trip_end_date</p>
              <p class='card-text'>Cena: $trip_price zł</p>
              <a href='index.php?add_to_cart=$trip_id' class='btn btn-outline-dark'>Dodaj</a>
              <a href='trip_details.php?trip_id=$trip_id' class='btn btn-secondary'>Zobacz</a>
            </div>
          </div>
        </div>
      ";
    }   
  }
}

//func displ products based on topics

function get_uniqe_topics(){
  global $con;
  if(isset($_GET['topic'])){
    $topic_id=$_GET['topic'];
    $select_query="Select * from `trip` where topic_id=$topic_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo"<h4 class='text-center'>Tematyka w trakcie produkcji. Zajrzyj później :)</h4>
        <div class='image_container'>
          <img src='./images/WIP-removebg-preview.png' alt='WIP'>
        </div>
      ";
    } else {
      while($row=mysqli_fetch_assoc($result_query)){
        $trip_id=$row['trip_id'];
        $trip_title=$row['trip_title'];
        $trip_description=$row['trip_description'];
        $topic_id=$row['topic_id'];
        $trip_continent=$row['trip_continent'];
        $trip_picture=$row['trip_picture'];
        $trip_price=$row['trip_price'];
        $trip_start_date=$row['trip_start_date'];
        $trip_end_date=$row['trip_end_date'];
        echo "
          <div class='col-md-4 mb-4'> 
            <div class='card'>
              <div class='image-container'>
                <img src='./admin_area/trip_pics/$trip_picture' class='card-img-top' alt='$trip_title'>
              </div>
              <div class='card-body'>
                <h5 class='card-title'>$trip_title</h5>
                <p class='card-text'>$trip_description</p>
                <p class='card-text'>$trip_start_date</p>
                <p class='card-text'>$trip_end_date</p>
                <p class='card-text'>Cena: $trip_price zł</p>
                <a href='index.php?add_to_cart=$trip_id' class='btn btn-outline-dark'>Dodaj</a>
                <a href='trip_details.php?trip_id=$trip_id' class='btn btn-secondary'>Zobacz</a>
              </div>
            </div>
          </div>
        ";
      }
    }
  }
}

function get_topics(){
  global $con;
  $select_topic="Select * from `topic`";
  $result_topic=mysqli_query($con,$select_topic);
  while($row_data=mysqli_fetch_assoc($result_topic)){
      $topic_title=$row_data['topic_title'];
      $topic_id=$row_data['topic_id'];
      echo "
          <li class='nav-item'>
              <a href='index.php?topic=$topic_id' class='nav-link'><h5>$topic_title</h5></a>
          </li>
      ";
  }
}

function get_search_trip(){
  global $con;
  if(isset($_GET['search_data_trip'])){
    $search_data_value=$_GET['search_data'];
    echo "<p>Wyszukiwanie dla: $search_data_value</p>"; 
    $search_query="Select * from `trip` where trip_tags like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "
        <h4 class='text-center'>Jeszcze nie mamy takich wycieczek</h4>
        <div class='image_container'>
          <img src='./images/sad.png' alt='WIP'>
        </div>
        ";
    } else {
      while($row=mysqli_fetch_assoc($result_query)){
        $trip_id=$row['trip_id'];
        $trip_title=$row['trip_title'];
        $trip_description=$row['trip_description'];
        $topic_id=$row['topic_id'];
        $trip_continent=$row['trip_continent'];
        $trip_picture=$row['trip_picture'];
        $trip_price=$row['trip_price'];
        $trip_tags=$row['trip_tags'];
        $trip_start_date=$row['trip_start_date'];
        $trip_end_date=$row['trip_end_date'];
        echo "
          <div class='col-md-4 mb-4'> 
            <div class='card'>
              <img src='./admin_area/trip_pics/$trip_picture' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$trip_title</h5>
                <p class='card-text'>$trip_description</p>
                <p class='card-text'>Wylot: $trip_start_date</p>
                <p class='card-text'>Powrót: $trip_start_date</p>
                <p class='card-text'>Cena: $trip_price zł</p>
                <a href='index.php?add_to_cart=$trip_id' class='btn btn-outline-dark'>Dodaj</a>
                <a href='trip_details.php?trip_id=$trip_id' class='btn btn-secondary'>Zobacz</a>
              </div>
            </div>
          </div>
        ";
      }
    }
  }
}

function get_all_trips(){
  global $con;
  if(!isset($_GET['topic'])){
    $select_query="Select * from `trip` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $trip_id=$row['trip_id'];
      $trip_title=$row['trip_title'];
      $trip_description=$row['trip_description'];
      $topic_id=$row['topic_id'];
      $trip_continent=$row['trip_continent'];
      $trip_picture=$row['trip_picture'];
      $trip_price=$row['trip_price'];
      $trip_start_date=$row['trip_start_date'];
      $trip_end_date=$row['trip_end_date'];
      echo "
        <div class='col-md-4 mb-4'> 
          <div class='card'>
            <img src='./admin_area/trip_pics/$trip_picture' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$trip_title</h5>
              <p class='card-text'>$trip_description</p>
              <p class='card-text'>Data wylotu: $trip_start_date</p>
              <p class='card-text'>Data powrotu: $trip_end_date</p>
              <p class='card-text'>Cena: $trip_price zł</p>
              <a href='index.php?add_to_cart=$trip_id' class='btn btn-outline-dark'>Dodaj</a>
              <a href='trip_details.php?trip_id=$trip_id' class='btn btn-secondary'>Zobacz</a>
            </div>
          </div>
        </div>
      ";
    }   
  }
}

function view_details(){
  global $con;
  if(isset($_GET['trip_id'])){
    if(!isset($_GET['topic'])){
      $trip_id=$_GET['trip_id'];
      $select_query="SELECT p.trip_id, p.trip_title, p.trip_description, p.topic_id, p.trip_continent, p.trip_picture, p.trip_price, t.topic_title, p.trip_start_date, p.trip_end_date FROM `trip` p LEFT JOIN `topic` t ON t.topic_id = p.topic_id WHERE p.trip_id='$trip_id'";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $trip_id=$row['trip_id'];
        $trip_title=$row['trip_title'];
        $trip_description=$row['trip_description'];
        $topic_title=$row['topic_title']; 
        $trip_continent=$row['trip_continent'];
        $trip_picture=$row['trip_picture'];
        $trip_price=$row['trip_price'];
        $trip_start_date=$row['trip_start_date'];
        $trip_end_date=$row['trip_end_date'];
        echo "
          <div class='col-md-4 d-flex justify-content-center align-items-center'>
            <img src='./admin_area/trip_pics/$trip_picture' class='card-img-top' alt='...'>
          </div>
          <div class='col-md-8'>
            <h2>O naszym produkcie:</h2>
            <h3>$trip_title</h3>
            <h4>$trip_description</h4>
            <h4>Data wylotu: $trip_start_date</h4>
            <h4>Data powrotu: $trip_end_date</h4>
            <h4>Tematyka:</h4>
            <h4>$topic_title</h4>
            <h4>Cena: $trip_price zł</h4>
            <div class='text-md-end'>
              <a href='index.php?add_to_cart=$trip_id' class='btn btn-outline-dark'>Dodaj do koszyka</a>
            </div>
          </div>
        ";
      }   
    }
  }
}


//get IP
function get_IP_Address() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = get_IP_Address();  
// echo 'User Real IP Address - '.$ip;  

//koszyk 
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = get_IP_Address();
    $get_trip_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart` where ip_address='$ip' and trip_id=$get_trip_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('Ta wycieczka już jest w koszyku')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query="insert into `cart` (trip_id, ip_address,quantity) values($get_trip_id,'$ip',1)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Wycieczka dodana do koszyka')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

//liczba produktów w koszyku

function cart_item_number(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = get_IP_Address();
    $select_query="Select * from `cart` where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
      global $con;
      $ip = get_IP_Address();
      $select_query="Select * from `cart` where ip_address='$ip'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
    }
echo $count_cart_items;

}

//total kwota

function total_cart_price(){
  global $con;
  $ip = get_IP_Address();
  $cart_query="Select * from `cart` where ip_address='$ip'";
  $result=mysqli_query($con,$cart_query);
  $total = 0;
  while($row=mysqli_fetch_array($result)){
    $trip_id=$row['trip_id'];
    $select_trips="Select * from `trip` where trip_id='$trip_id'";
    $result_trips=mysqli_query($con,$select_trips);
    while($row_trip_price=mysqli_fetch_array($result_trips)){
      $trip_price=array($row_trip_price['trip_price']);  
      $trip_values=array_sum($trip_price); 
      $total+=$trip_values;
    }
  }
echo $total;
}

//get user order det

function usr_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="Select * from `user` where user_name='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="Select * from `user_order` where user_id='$user_id' and order_status='przyjety do realizacji'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo "<h3 class='text-center'>Tyle twoich zamówień jest w trakcie realizacji: $row_count</h3>";
          }
          if($row_count==0){
            echo "<h3 class='text-center'>Nie masz żadnych zamówień w trakcie realizacji</h3>";
          }
        }
      }
    }

  }
}




?>