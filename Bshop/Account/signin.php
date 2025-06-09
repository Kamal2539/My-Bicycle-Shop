<html>
  <link rel = "stylesheet" href = "../s.css">
  <head>
    <?php include '../view/header.php'; ?>
    <?php require '../model/dbconnect.php'; ?>
  </head>
  <body>
    <nav> 
    <?php

      if (isset($_SESSION["user"])) { 
        if ($_SESSION["user"] == 'Admin'){?>
          <a href="../product_manager/product_list.php">Products</a>
          <a href="../model/order.php">Orders</a>
          <a href = "logout.php">Logout</a>
        <?php }
        else{ ?>
          <a href="../model/products.php">Products</a>
          <a href="../model/order.php">Orders</a>
          <a href = "logout.php">Logout</a>
        <?php  }}
      else{ ?>   
        <a href = "signin.php">Login/Register</a>
    <?php } ?>
    </nav>
    <div id = "b">
    <form method = "POST" action = "#" onsubmit = "return validation()">
    <h1> Login</h1>
    <b>Please Fill in your Credentials to Login</b><br><br>
    <l>UserID</l><br>
    <input type = "text" name  = "user" required><br>
    <l>Password</l><br>
    <input type = "password" name  = "pass" required>  
    <br><br>
    <input type =  "submit" id = "btn" value = "Login">  
    </form>
    <p> Dont have an account? <a href="signup.php">Sign up here</a></p>

    <script>  
      function validation(){  
      var id=document.f1.user.value;  
      var ps=document.f1.pass.value;  
      if(id.length=="" && ps.length==""){  
        alert("User Name and Password fields are empty");  
        return false;  
      }  
       else {  
        if(id.length=="") {  
            alert("User Name is empty");  
            return false;  
        }   
        if (ps.length=="") {  
        alert("Password field is empty");  
        return false;  
        }  
       }                             
    }  
    </script> 
    </div>
  </body>
</html>

<?php
$userna = filter_input(INPUT_POST, 'user');
$passwo = filter_input(INPUT_POST, 'pass');

$sql = "select * from idpass where customerId = '$userna' and password = '$passwo'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
      
if (is_array($row)){
    session_start();
    $_SESSION["user"]= $row['customerId'];
    $_SESSION["pass"]= $row['Password'];
}
if(isset($_SESSION["user"])){
  if ($_SESSION["user"] == 'admin'){
    header("location: ../product_manager/product_list.php");
  }
  else{
    header("location: ../model/products.php");}
 }
else if(isset($userna)&& $userna != null){
    echo "<h1><center> Login failed. Invalid username or password.</center></h1>";
}

?>
<?php include '../view/footer.php'; ?>