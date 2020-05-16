<header id="header">
    <nav class="navbar navbar-expand-Ig navbar-dark bg-dark">
        <a href="customerView.php" class="navbar-brand">
            <h3 classs="px-5">
                <i class="fas fa-shopping-basket"></i>ABHAYAVACANA Pharmacy
            </h3>
        </a>
        <button class="navbar-toggler"
         type="button"
         data-toggle="collapse"
         data-target="#navbarNavAltMarkup"
         aria-controls="navbarnavAltMarkup"
         aria-expanded="false"
         araia-label="Toggle navigation" >
         
         <span class="navbar-toggler-icon"></span></button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="mr-auto">
         <div class="navbar-nav">
         <a href="cart.php" class="nav-item nav-link active">
         <h5 class="px-5" cart>
         Cart 
         <?php 
         if(isset($_SESSION['cart'])){
             $count=count($_SESSION['cart']);
             echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>"; 
         }else {
            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>" ;

         }
         ?>

         </h5></a> 
         </div></div>
         </div>
    </nav>
</header>