<html>
  <link rel = "stylesheet" href = "../s.css">
  <head>
    <?php include '../view/header.php'; ?>
    <?php include '../model/dbconnect.php';?>
  </head>
  <body>
  <div id ="b">
  <h1>Sign Up</h1><br>

  <form method ="POST" action = "#">
  Name: &nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name = "Name"/><br><br>
  Email: &nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name = "Email"/><br><br>
  User ID: &nbsp; <input type = "text" name = "Custid"/><br><br>
  Password: <input type = "password" name = "Passw"/><br><br>
  <input type = "submit" id ="btn" value = "Sign up">
  </form>

  <p>Already have an account? <a href="signin.php">Sign in here</a></p>
  </div>
  </body>
</html>';

<?php
$cusid = filter_input(INPUT_POST,'Custid');
$pass = filter_input(INPUT_POST,'Passw');
$nam = filter_input(INPUT_POST, 'Name');
$ema = filter_input(INPUT_POST, 'Email');

If(isset ($cusid) && isset ($pass)&& isset ($nam) && isset ($ema)){
   $sql = 'INSERT INTO idpass VALUES ("'.$cusid. '" , "'.$pass.'" , "'.$nam.'", "'.$ema. '");';
   If ($conn->query($sql) === TRUE ) {
      echo "Account Created Successfully";
    }
   else {
   echo "Error: Please Enter all Fields";
   }
}
$conn->close();
?>

<?php include '../view/footer.php'; ?>