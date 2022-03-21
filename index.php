<?php 
  include "./includes/init.php";
require_once 'template/header.php'
?>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div>
            <?php 
                $products = new Item();
                if($products->getPost()) {
                foreach($products->getPost() as$product) { ?>   


                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="mr-2 mb-3 mb-lg-0"> <img src="img/ph.jpg" width="150" height="150" alt=""> </div>
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="#" data-abc="true"><?=$product['name'] ?></a> </h6>      
                            <p class="mb-3"> <?=$product['description'] ?></p>  
                        </div>
                        <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                            <h3 class="mb-0 font-weight-semibold"><?= $product['price']?></h3>
                            <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                        </div>
                    </div>
                </div>

           <?php  }
    }  else {
      echo "<p class='mt-5 mx-auto'>Post is empty...</p>";
    }
  ?>
            </div>
        </div>
    </div>


    <?php  require_once 'template/footer.php'?>
