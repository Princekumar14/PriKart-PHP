<?php
include('./index.php');
include('./product_data.php');

// print_r($products[1002]); 

    //  echo "<prev>";
    //   print_r $products["1001"];
    //   echo "</prev>";

// echo sizeof($products);

  // if ( array_key_exists(1001, $products) ){
  //     echo "<prev>";
  //     print_r ($products[1001]);
  //     echo "</prev>";
       
  //   }

  $cookieName = "Cart_products";
  $cookievalue = array();
  $qty = 1;
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $productID = $_POST['product_id'];
  $productQTY = $_POST['selected_qty'];
  // $productID = 1;
  
  
  if(isset($_COOKIE[$cookieName])){
    $cartProducts = json_decode($_COOKIE[$cookieName], true);
    // $cart_products_keys = array_keys($cartProducts);


    if(array_key_exists($productID,$cartProducts)){
      $cartProducts[$productID] += $productQTY;
      // print_r($cartProducts[$productID]);
      setcookie($cookieName, json_encode($cartProducts), time()+86400 , "/"); 
    }else{
        $cartProducts[$productID] = $productQTY;
        setcookie($cookieName, json_encode($cartProducts), time()+86400 , "/"); 
        
      }
      
    }else{
      $cookievalue[$productID] = $productQTY;
      setcookie($cookieName, json_encode($cookievalue), time()+86400 , "/"); 
  }
 



}



?>
<?php
  foreach($products as $key=>$p1){
      // echo $p1["title"];
      
    }
      ?>

<div class="container mt-3">
    <div class="row">

        <?php
  foreach($products as $key=>$p1){
      

      ?>
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="card" style="position: relative;">
            <img class="card-img" src="<?php  echo $p1['image_url']; ?>" alt="Vans">

                <!-- <div class="card-img-overlay d-flex justify-content-end"> -->
                  <div class="d-flex justify-content-end" style=" width: fit-content; position: absolute; right: 6px;">
                    <a href="#" class="card-link text-danger like" style="height: fit-content;">
                      <i class="fas fa-heart"></i>
                    </a>
                  </div>
                  <form action="" method="post">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $p1["title"];?>
                        <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                        <p class="card-text">
                            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the
                            elements whilst still looking cool. </p>
                        <div class="options d-flex flex-fill">
                            <select class="form-select mr-1">
                                <option selected>Color</option>
                                <option value="1">Green</option>
                                <option value="2">Blue</option>
                                <option value="3">Red</option>
                            </select>
                            <select class="form-select ml-1">
                                <option selected>Size</option>
                                <option value="1">41</option>
                                <option value="2">42</option>
                                <option value="3">43</option>
                            </select>
                            <select style="width: 100px;" class="form-select me-4" name="selected_qty">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success">
                                <h5 class="mt-4">$<?php echo $p1["price"];?></h5>
                            </div>
                            <!-- <form action="" method="post"> -->
                                <input type="hidden" value="<?php echo $key;?>" name="product_id">
                                <button type="submit" class="btn btn-danger mt-3" style="cursor:pointer;"><i
                                        class="fas fa-shopping-cart"></i> Add to Cart</button>
                            <!-- </form> -->

                        </div>
                        </form>
                </div>
            </div>
        </div>

        <?php
  }
?>


        <!-- 
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://images.pexels.com/photos/60619/boot-leather-shoe-old-60619.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
          <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
          <p class="card-text">
            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             </p>
          <div class="options d-flex flex-fill">
             <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
            </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://images.pexels.com/photos/1456706/pexels-photo-1456706.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
          <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
          <p class="card-text">
            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             </p>
          <div class="options d-flex flex-fill">
             <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
            </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://images.pexels.com/photos/1598505/pexels-photo-1598505.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
          <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
          <p class="card-text">
            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             </p>
          <div class="options d-flex flex-fill">
             <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
            </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div> -->
    </div>
</div>