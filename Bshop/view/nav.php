<html>
<body>
  <?php session_start();?>
  <nav><div = "nav1">
    <a href="index.php">Home</a>
    <a href="cart/index.php">Cart</a>
    </div>
    <div = "nav2">
    <?php
    if (isset($_SESSION['user'])) {
    ?>
     <a href="model/products.php">Products</a>
     <a href="order.php">Orders</a>
     <a href = "Account/logout.php">Logout</a>
    <?php  }
    else{
    ?>   
     <a href = "signin.php">Login/Register</a>
     <?php   } ?>
    </div>
  </nav>
</body>
</html>
