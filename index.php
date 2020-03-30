<?php
//start session
session_start();

require_once './PHP/component.php';
require_once './PHP/Data.php';
$data = new Data();

// //old version
//     if(isset($_POST['add'])){
//      //   print_r($_POST['product_id']);
//      if(isset($_SESSION['cart'])){
//        $item_array_id = array_column($_SESSION['cart'],"product_id"); //สร้างarrayที่มีแต่ค่า product_id จาก array $_SESSION['cart']
//         //print_r($item_array_id);
//         if(in_array($_POST['product_id'],$item_array_id)){//in_array เป็นฟังก์ชันที่ใช้ตรวจสอบค่าใน array ว่ามีค่าที่เราต้องการอยู่หรือป่าว
//             //เช็คว่ามีหรือยัง ถ้ามีแล้ว +1
//             echo "<script>alert('Product is already added in the cart')</script>";
//            echo "<script>window.location='index.php'</script>";
//           //count ++
//         }else{
//            $count = count($_SESSION['cart']);
//            $item_array = array(
//             'product_id' => $_POST['product_id']
//         );  
//             $_SESSION['cart'][$count] = $item_array;
            
//         }

//      }else{
//           $item_array = array(
//               'product_id' => $_POST['product_id']
//           );  
//           //creat new session variable
//           $_SESSION['cart'][0] = $item_array;
//          // print($_SESSION['cart']);
//      }
//     }

//new version

if(isset($_POST['add']) && !empty($_POST['product_id'])){

    $product_id = $_POST['product_id']; 
    $add = $_POST['add']; 
    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]++;
    }else{
        $_SESSION['cart'][$product_id]=1;
    }

    
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // print_r($product_id);
    // echo "</pre>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <!-- Bootrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require('./PHP/header.php'); ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php

                $result = $data->getData();
                while($row = mysqli_fetch_assoc($result)){
                    component($row['dessert_name'],$row['dessert_price'],$row['dessert_pic'],$row['dessert_id']);
                }
                 
               
                
            ?>
           
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>