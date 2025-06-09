<html>
<link rel = "stylesheet" href = "../s.css">
    <head>
    <?php include '../view/header.php'; ?>
    <?php require 'dbconnect.php';?>
    <?php session_start(); ?>
    </head>
    
    <body><div id = "b">
    <?php
    If(isset($_SESSION["user"])){
        If($_SESSION["user"] == 'admin'){
            ?>
            <nav>
                <a href="../product_manager/product_list.php">Products</a>
                <a href = "../Account/logout.php">Logout</a></div>
            </nav>
            <?php
            echo  "<h2>All Orders</h2>";
            $order = "SELECT * from orders";
            $result = $conn->query($order);
            if ($result->num_rows > 0 ){
                 echo "<table><tr><th>User</th><th>Name</th> <th>Price</th> <th>Quantity</th> <th>Subtotal</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" .$row["customerId"]. "</td><td>" .$row["product"]. "</td><td>" .$row["price"].
                             "</td><td>" .$row["quantity"]. "</td><td>" .$row["subtotal"]. "</td></tr>";
                    }
            }
            else
            {
                echo "No orders Found";
            }

        }
        Else{
            ?>
            <nav> <div id ="ord">
                <a href="products.php">Products</a>
                <a href="../cart/index.php">Cart</a>
                <a href = "../Account/logout.php">Logout</a>
        </div>
            </nav>
            <?php
            
            $sess = $_SESSION["user"];
	        $order = "SELECT * from orders WHERE customerId = '$sess'";
            $result = $conn->query($order);
            echo  "<h2>My Orders</h2>";
            if ($result->num_rows > 0 ){
                echo "<table><tr><th>Name</th> <th>Price</th> <th>Quantity</th> <th>Subtotal</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" .$row["product"]. "</td><td>" .$row["price"].
                    "</td><td>" .$row["quantity"]. "</td><td>" .$row["subtotal"]. "</td></tr>";}
            }
            else
            {
                echo "No orders Found";
            }
        }

    } ?>
  </div>
  </body>
</html>
