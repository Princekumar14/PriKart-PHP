<?php include_once 'header.php';
include('./product_data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $productID = $_POST['product_id'];
  $some = json_decode($_COOKIE["Cart_products"]);

  print_r($some);

    for($i=0; $i<sizeof($some); $i++){
      // print_r($some);
      if($some[$i] == $productID ){
        array_splice($some, $i, 1);
        // unset($some[$i]);
        setcookie("Cart_products", json_encode($some), time()+86400 , "/"); 
      }

    }
  
  
  // if(isset($_COOKIE[$cookieName])){
  //   $some = json_decode($_COOKIE[$cookieName]);
  //   // echo $some;
  //   print_r($some);
  //   if(in_array($productID,$some)){
  //   }
  // else{

  //   array_push($some, $productID);
  //   print_r($some);
  // }
    
    
  //   setcookie($cookieName, json_encode($some), time()+86400 , "/"); 
    
    
  // }else{
  //   array_push($cookievalue, $productID);
  //   setcookie($cookieName, json_encode($cookievalue), time()+86400 , "/"); 
  // }
 



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
    $cartProducts = json_decode($_COOKIE["Cart_products"]);
    foreach($products as $productID => $productDetail){
      if(in_array($productID,$cartProducts)){
  

?>
            
            <div class="row gy-3 mb-4">
              <div class="col-lg-5">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="<?php  echo $productDetail['image_url']; ?>" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link"><?php  echo $productDetail['title']; ?></a>
                      <!-- <p class="text-muted">XL size, Jeans, Blue</p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                  <select style="width: 100px;" class="form-select me-4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>
                <div class="">
                  <text class="h6">$<?php  echo $productDetail['price']; ?>.00</text> <br />
                  <small class="text-muted text-nowrap"> $460.00 / per item </small>
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <!-- <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a> -->
                  <!-- <button href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</button> -->
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $productID;?>" name="product_id">
                    <!-- <button type="submit" class="btn btn-danger mt-3" style="cursor:pointer;"><i class="fas fa-shopping-cart"></i> Add to Cart</button> -->
                    <button type="submit" class="btn btn-light border text-danger icon-hover-danger"> Remove</button>
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
