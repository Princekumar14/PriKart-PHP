<?php include_once 'header.php';
include('./product_data.php');
// $cartProducts = json_decode($_COOKIE["Cart_products"], true);
// echo sizeof($cartProducts);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $productID = $_POST['product_id'];
  // if (isset($_POST['product_id']) && isset($_POST['remove_product_form'])) {

  // }
  
  // if (isset($_POST['selected_qty']) && isset($_POST['update_QTY_form'])) {
  //   $cartProducts = json_decode($_COOKIE["Cart_products"], true);
  //   $updtaed_ProductID = $_POST['updated_product_id'];
  //   $productQTY = $_POST['selected_qty'];
  //   $cartProducts[$updtaed_ProductID] = $productQTY;
  //   setcookie($cookieName, json_encode($cartProducts), time()+86400 , "/"); 
  
  // }
  

  if(isset($_COOKIE["Cart_products"])){ 

  $cartProducts = json_decode($_COOKIE["Cart_products"], true);

  $cart_products_keys = array_keys($cartProducts);
  
  for($i=0; $i<sizeof($cart_products_keys); $i++){
    if($cart_products_keys[$i] != $productID ){
      $productsAfterRemoving[$cart_products_keys[$i]] = $cartProducts[$cart_products_keys[$i]];
      
      setcookie("Cart_products", json_encode($productsAfterRemoving), time()+86400 , "/"); 
      
    }
    else{
          if( sizeof($cartProducts) == 1 ){
            setcookie("Cart_products", "", time()+86400 , "/");
          }
    }
    
  }
  }

}

?>

<section class="bg-light my-5 p-3">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <h4 class="card-title mb-4">Your shopping cart</h4>
                        <?php 


if(isset($_COOKIE["Cart_products"])){
    $cartProducts = json_decode($_COOKIE["Cart_products"], true);
    $cart_products_keys = array_keys($cartProducts);
    
      for($i=0; $i < sizeof( $cartProducts ); $i++){
        if(array_key_exists($cart_products_keys[$i],$cartProducts)){
?>
                        <div class="row gy-3 mb-4">
                            <div class="col-lg-5">
                                <div class="me-lg-5">
                                    <div class="d-flex">
                                        <img src="<?php  echo $products[$cart_products_keys[$i]]['image_url']; ?>"
                                            class="border rounded me-3" style="width: 96px; height: 96px;" />
                                        <div class="">
                                            <a href="#"
                                                class="nav-link"><?php  echo $products[$cart_products_keys[$i]]['title']; ?></a>
                                            <!-- <p class="text-muted">XL size, Jeans, Blue</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                <form action="" method="post" id="update_QTY_form">
                                    <div class="d-flex">
                                        <!-- <input type="number" class="form-control" id="productQuantity"> -->
                                        <input type="hidden" value="<?php echo $cart_products_keys[$i];?>"
                                            name="product_id">
                                        <input type="text" maxlength="3" class="form-control me-4 product_qty"
                                            name="selected_qty" style="width: 80px;"
                                            value="<?php echo $cartProducts[$cart_products_keys[$i]] ?>">
                                        <button type="submit"
                                            class="btn btn-light border text-danger icon-hover-danger update_QTY_Button"
                                            style="display:none;">Update</button>
                                        <!-- <select style="width: 100px;" class="form-select me-4">
                                                  <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select> -->
                                    </div>
                                </form>
                                <div class="product_fares ms-5">
                                    <text
                                        class="h6">$<?php  echo $products[$cart_products_keys[$i]]['price']; ?>.00</text>
                                    <br />
                                    <small class="text-muted text-nowrap"> $460.00 / per item </small>
                                </div>
                            </div>
                            <div
                                class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                <div class="float-md-end">
                                    <!-- <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a> -->
                                    <form action="" method="post" id="remove_product_form">
                                        <!-- <button href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</button> -->
                                        <input type="hidden" value="<?php echo $cart_products_keys[$i];?>"
                                            name="product_id">
                                        <button type="submit"
                                            class="btn btn-light border text-danger icon-hover-danger"> Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 

      }
      
    }
  
}

?>
                    </div>

                    <!-- <div class="border-top pt-4 mx-4 mb-4">
            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
            <p class="text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip
            </p>
          </div> -->
                </div>
            </div>
            <!-- cart -->

        </div>
    </div>
</section>