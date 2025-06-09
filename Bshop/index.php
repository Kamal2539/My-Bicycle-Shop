
<html>
<link rel = "stylesheet" href = "s.css">
<?php include 'view/header.php'; ?>
<?php include 'model/dbconnect.php'; 
session_start(); ?>

<nav> 
<?php
  if (isset($_SESSION['user'])) { ?>
    <a href="model/products.php">Products</a>
    <a href="model/order.php">Orders</a>
    <a href = "Account/logout.php">Logout</a>
    <?php  }
  else{ ?>   
    <a href = "Account/signin.php">Login/Register</a><a href = "Account/signin.php" ><button value ="Login/Register">
    <?php } ?>
</nav>

<div id ="b">

<main>
    <img src= "images/index.jpg" height = 40% width = 70%></div>
    <?php if(isset($_SESSION["user"])){ ?>
            <h2>Value Products</h2>

            <?php
	          $sql = "SELECT * from products WHERE productPrice < 1000;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0 ) { ?>
               <div id ="product"><table>
               <?php

               while($row = $result->fetch_assoc()) { ?>
                 <tr><td><img src="images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
                 "</td><td>" ?>    

                 <form  action = "cart/index.php?id=<?= $row["ID"]?>" method = "POST">
                 <input type="hidden" name="productname" value="<?php echo $row["productName"] ?>">
                 <input type="hidden" name="productprice" value="<?php echo $row["productPrice"] ?>">
                 <input type="hidden" name="userid" value="<?php $_SESSION["user"]?>">
                 <b>Quantity:</b><input type="number" name="quantity" value="1">
                 <br><br>
                 <input type="submit" name ="AddToCart" value="Add to Cart">
                 </form> <?php echo "</d></tr>";
               }
            echo "</table>";
            }
    $conn->close();
    }
    else
    {
      echo "<center><h2>Please Login to view Products</h2><center>";
    }?>
    </div>
</main>

<?php include 'view/footer.php'; ?>
