<?php 
include('./product_data.php');

?>

<header>
<div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <a class="navbar-brand" href="/PriKart-PHP">
                        <h5 class="brand-name">PriKart</h5>
                    </a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input type="search" placeholder="Search your product" class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="./cart.php">
                                    <i class="fa fa-shopping-cart"></i> Cart (<?php 
if(!isset($_COOKIE["Cart_products"])){
    echo 0;
    
}
else{
    echo sizeof( json_decode($_COOKIE["Cart_products"]));
}

?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-heart"></i> Wishlist (0)
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> Username 
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </header>