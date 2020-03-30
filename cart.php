<?php
session_start();
require_once './PHP/component.php';
require_once './PHP/Data.php';
$db = new Data();
//delete product from cart list
        if(isset($_POST['remove'])){
            if($_GET['action']=='remove' && !empty($_GET['product_id'])){
                    unset($_SESSION['cart'][$_GET['product_id']]);
                    echo "<script>window.location='cart.php'</script>";
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <!-- Bootrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<?php require('./PHP/header.php'); ?>
    
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
        <h6>My cart</h6>


        <hr>
       <?php
                $total = 0;
                $all_amount =0;
           if(!empty($_SESSION['cart'])){
            // $product_id = array_column($_SESSION['cart'],'product_id');




           
                foreach($_SESSION['cart'] as $product_id => $qty){
                    $result = $db->getDataWhere($product_id);
                    $row = mysqli_fetch_assoc($result);

                        $sum = (int)$row['dessert_price'] * $qty;//ราคารวมของ สินค้า 1ชิ้น
                        $total+=$sum;//ราคารวมทั้งหมด //สินค้าทุกชิ้น
                        $all_amount+=$qty;
                        cartElement($row['dessert_name'],$row['dessert_price'],$row['dessert_pic'],$row['dessert_id'],$qty,$sum);
                        
                
            }
           }else{
               echo "<h5>Cart is Empty</h5>";
           }
         
       ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
           <div class="pt-4">
               <h6>รายละเอียด</h6>
               <hr>
               <div class="row price-details">
                   <div class="col-md-6">
                       <?php
                       
                        if(isset($_SESSION['cart'])){
                       
                        echo "<h6>ราคา (ทั้งหมด $all_amount ชิ้น)</h6>";
                        }else{
                            echo "<h6>ราคา (0 ชิ้น)</h6>";
                        }
                       ?>
                       <h6>ค่าจัดส่ง</h6>
                       <hr>
                       <h6>จำนวนเงินทั้งหมด</h6>
                   </div>
                   <div class="col-md-6">
                       <h6><?php echo $total." บาท"?></h6>
                       <h6 class="text-success">Free</h6>
                       <hr>
                       <h6><?php echo $total." บาท"?></h6>
                   </div>
               </div>
           </div>

        </div>
    </div>

</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>