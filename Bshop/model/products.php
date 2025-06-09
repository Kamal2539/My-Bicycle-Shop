<?php include '../view/header.php'; ?>
<?php require 'dbconnect.php';?>

<?php session_start();?>

<html>
<link rel = "stylesheet" href = "../s.css">
    <nav>
        <a href="products.php">Products</a>
        <a href="../index.php">Home</a>
        <a href="order.php">Orders</a>
        <a href = "../Account/logout.php">Logout</a>
    </nav>
    
    <div id ="b">

    <h1> Category</h1>
    <form method="post" action="#">
    <input type= "Submit" name="button1" value="Electric">
    <input type= "Submit" name="button2" value="Mountain">
    <input type= "Submit" name="button3" value="Road Bike">
    <input type ="text" name ="S">
    <input type = "submit" value = "Search">
    </form>
</html>
<?php
$srch= filter_input(INPUT_POST, 'S');

if(isset($_POST['button1']))
{
	$sql = "SELECT * from products WHERE categoryId = 100;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        echo "<table><tr><th></th><th>Name</th> <th>Price</th></tr>";
        while($row = $result->fetch_assoc()) {
            ?>
            <tr><td><img src="../images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
            "</td><td>" ?>    
            <form  action = "../cart/index.php?id=<?= $row["ID"]?>" method = "POST">
            <input type="hidden" name="productname" value="<?php echo $row["productName"] ?>">
            <input type="hidden" name="productprice" value="<?php echo $row["productPrice"] ?>">
            <input type="hidden" name="userid" value="<?php echo $_SESSION['user'] ?>">
            <b>Quantity:</b><input type="number" name="quantity" value="1">
            <br><br>
            <input type="submit" name ="AddToCart" value="Add to Cart">
            </form> <?php echo "</d></tr>";

        }
    echo "</table>";
    }

   $conn->close();
}
else if(isset($_POST['button2'])){
	$sql = "SELECT * from products WHERE categoryId = 200;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        echo "<table><tr><th></th><th>Name</th> <th>Price</th></tr>";
        while($row = $result->fetch_assoc()) {
            ?>
            <tr><td><img src="../images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
            "</td><td>" ?>    
            <form  action = "../cart/index.php?id=<?= $row["ID"]?>" method = "POST">
            <input type="hidden" name="productname" value="<?php echo $row["productName"] ?>">
            <input type="hidden" name="productprice" value="<?php echo $row["productPrice"] ?>">
            <input type="hidden" name="userid" value="<?php echo $_SESSION['user']?>">
            <b>Quantity:</b><input type="number" name="quantity" value="1">
            <br><br>
            <input type="submit" name ="AddToCart" value="Add to Cart">
            </form> <?php echo "</d></tr>";

        }
        echo "</table>";
    }
    $conn->close();
}
elseif(isset($_POST['button3'])){
	$sql = "SELECT * from products WHERE categoryId = 300;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        echo "<table><tr><th></th><th>Name</th> <th>Price</th></tr>";
        while($row = $result->fetch_assoc()){
            ?>
            <tr><td><img src="../images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
            "</td><td>" ?>    
            <form  action = "../cart/index.php?id=<?= $row["ID"]?>" method = "POST">
            <input type="hidden" name="productname" value="<?php echo $row["productName"] ?>">
            <input type="hidden" name="productprice" value="<?php echo $row["productPrice"] ?>">
            <input type="hidden" name="userid" value="<?php echo $_SESSION['user']?>">
            <b>Quantity:</b><input type="number" name="quantity" value="1">
            <br><br>
            <input type="submit" name ="AddToCart" value="Add to Cart">
            </form> <?php echo "</d></tr>";

        }
        echo "</table>";
    }
    $conn->close();
}
else if(isset($srch)&& $srch !=Null){
    $sql = "SELECT * from products WHERE productName like '%$srch%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        echo "<table><tr><th></th><th>Name</th> <th>Price</th></tr>";
        while($row = $result->fetch_assoc()){
            ?>
            <tr><td><img src="../images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
            "</td><td>" ?>    
            <form  action = "../cart/index.php?id=<?= $row["ID"]?>" method = "POST">
            <input type="hidden" name="productname" value="<?php echo $row["productName"] ?>">
            <input type="hidden" name="productprice" value="<?php echo $row["productPrice"] ?>">
            <input type="hidden" name="userid" value="<?php $_SESSION['user']?>">
            <b>Quantity:</b><input type="number" name="quantity" value="1">
            <br><br>
            <input type="submit" name ="AddToCart" value="Add to Cart">
            </form> <?php echo "</d></tr>";

        }
        echo "</table></div>";
    }

    $conn->close();
}
include '../view/footer.php';
?>