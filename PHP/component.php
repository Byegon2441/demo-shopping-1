<?php
function component($productname,$productprice,$productimg,$productid){
  $element = sprintf('
  <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="post">
                    <div class="crad shadow">
                        <div>
                            <img src="%s" alt="Image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="crad-title">%s</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half"></i>
                            </h6>
                            <p class="card-text">
                                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates
                            </p>
                            <h5>
                            <span class="price">%s บาท</span>
                            </h5>
                            <button type="submit" class="btn btn-warning my-3" name="add" id="addproduct"><i class="fas fa-shopping-cart"></i> Add to cart </button>
                            <input type="hidden" name="product_id" value="%s">
                        </div>
                    </div>
                </form>
            </div>
  
  ',$productimg,$productname,$productprice,$productid);
  echo $element;
}


function cartElement($productname,$productprice,$productimg,$productid,$productamount,$producttotal){
    $element = sprintf('
    <form action="cart.php?action=remove&product_id=%s" method="post" class="cart-items">
    <div class="border rounded">
        <div class="row bg-white">
            <div class="col-md-3 py-3">
                <img src="%s" alt="Image1" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h5 class="pt-2">%s</h5>
                <small class="text-secondary">ราคาต่อชิ้น %s บาท </small>
                <h5 class="pt-2">ราคารวม %s</h5>
                <button type="submit" class="btn btn-warning">Save for Later</button>
                <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
            </div>
            <div class="col-md-3 py-5">
                <div>
                    <!-- <button id="minus_product" type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>--> 
                    <input type="text" value="%s" class="form-control w-30 d-inline id="amount" ">
                    <!--   <button id="plus_product" type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>-->
                </div>
            </div>
        </div>
    </div>
</form>
    ',$productid,$productimg,$productname,$productprice,$producttotal,$productamount);

    
    echo $element;

    
}
?>
