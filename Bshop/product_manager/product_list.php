<?php include '../view/header.php'; ?>
<link rel = "stylesheet" href = "../s.css">
<?php include '../model/dbconnect.php';?>
<nav>
<a href = "add_product.php">Add Product</a>
<a href = "../Account/logout.php">Logout</a>

</nav>
<main><div id = "b">
    <h2>Product List</h2>

    <?php
	$allproducts = "SELECT * from products INNER JOIN category on products.categoryId = category.catID;";
    $result = $conn->query($allproducts);
if ($result->num_rows > 0 ) {
echo "<table><tr><th></th><th>Name</th><th>Price</th><th>CategoryID</th><th>Category Name</th></tr>";
    while($row = $result->fetch_assoc()) {
    ?> 
       <tr><td><img src="../images/<?php echo $row["productName"];?>.jpg" height ="100px" width ="130px"><?php echo"</td><td>". $row["productName"]. "</td><td>$" . $row["productPrice"]. 
      "</td><td>".$row["categoryId"]. "</td><td>" .$row["categoryName"]. "</td><td>"?><a href = "product_list.php?action=remove&name=<?php $row["productName"]?>"><input type = "button" id = "btn" value ="Delete Product">  
   <?php echo "</td></tr>";

    }
    echo "</table>";
}

   $conn->close();

?>
   </main>
<?php 
If(isset($_GET['action'])){
    $n = $_GET['name'];
        If($_GET['action'] == "remove") {
            $sqldp = "DELETE FROM products Where productName = $n";
        }}
include '../view/footer.php';
?>