<?php
  include '../view/header.php'; 
  require '../model/dbconnect.php';?>
  <?php session_start(); ?>
  <link rel = "stylesheet" href = "../s.css">
  <nav>
    <a href="../model/products.php">Products</a>
    <a href="../model/order.php">Orders</a>
    <a href = "../Account/logout.php">Logout</a>
  </nav>
  <div id = "b">
  <?php
  if(isset($_POST['AddToCart'])){
    $id = $_GET['id'];
    if(isset($_SESSION['cart'][$id])){
       $o = $_SESSION['cart'][$id]['quantity'];
       $session_array = array("ID" => $id,
                              "productname" => $_POST['productname'],
                              "productprice" => $_POST['productprice'],
                              "quantity" => $o + $_POST['quantity']);
                              $_SESSION['cart'][$id] = $session_array;
    }
    else{
       $session_array = array("ID" => $_GET['id'],
                              "productname" => $_POST['productname'],
                              "productprice" => $_POST['productprice'],
                              "quantity" => $_POST['quantity']);
       $_SESSION['cart'][$id] = $session_array;
    }
  }
    if (empty($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
      echo "<p>The Cart is Empty!!</p>";?>
      <a href = "../model/products.php"><input type = "button" value = "Continue Shopping"></a>
      <?php   }
    else{ ?>  
      <table>
          <tr>
            <th>S no.</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
          <?php 
          $sn=1;
          $subtotal = 0;
          foreach($_SESSION['cart'] as $key => $value ){
            $price = $value['quantity']* $value['productprice'];
              echo "<tr>
              <td>".$sn."</td>
              <td>".$value['productname']."</td>
              <td>$".$value['productprice']."</td>
              <td>".$value['quantity']."</td>
              <td>$" .$price. "</td>
              <td>"; ?> <a href = "index.php?action=remove&id=<?php echo $value['ID'] ?>"> <input type = "button" value = "Remove Item"></a>  </td>
              </tr>
              <?php
              $sn++;
              $subtotal = $subtotal + $price;
              }

    echo "</table><b><center>Subtotal = $" .$subtotal. "</b>";
    }
    ?>
 <a href = "index.php?action=clear"><input type = "button" value = "Clear Cart"></a>
 <a href = "index.php?action=checkout"><input type = "button" value = "Checkout"></a></center>
 <?php
 If(isset($_GET['action']))
   {
      If($_GET['action'] == "clear")
       {
          unset($_SESSION['cart']);
       }
      ElseIf($_GET['action'] == "checkout"){
            $checkout = 'INSERT INTO orders VALUES ("'.$_SESSION["user"].'" , "'.$value['productname'].'" , '.$value['productprice'].', '.$value['quantity'].', '.$subtotal.');';
            header('location:../model/products.php');
      }
      If($_GET['action'] == "remove") {
        foreach($_SESSION['cart'] as $key => $value ){
            If($value['ID'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
            }
        }
     }}?>
  </div>
<?php include '../view/footer.php'; ?>
