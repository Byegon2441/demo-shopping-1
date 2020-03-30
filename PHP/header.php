<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">
        <h3 class="px-5">
        <i class="fas fa-shopping-basket">ShoppingCart</i>
        </h3>
    </a>
    <button class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-taget = "#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup"
    arai-expanded="false"
    arai-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                <h5 class="px-5 cart">
                    <i class="fas fa-shopping-cart"> Cart 
                     <?php
                     $all_amount =0;
                     if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $product_id => $qty){
                            $all_amount+=$qty;
                        }
                      
                        echo "<span id='cart_count' class='text-warning bg-light'>$all_amount</span>";
                     }else{
                        echo '<span id="cart_count" class="text-warning bg-light">0</span>';
                     }
                     ?>
                    </i>
                </h5>
                </a>
            </div>
        
    </div>
    </nav>
</header>