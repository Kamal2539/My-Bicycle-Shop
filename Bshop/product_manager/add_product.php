<html>
    <head>
    <link rel = "stylesheet" href = "../s.css">
    <?php include '../view/header.php';?>
       <?php include '../model/dbconnect.php';?>
       <nav>
       <a href="product_list.php">Products</a>
       <a href = "../model/order.php">Orders</a>
       <a href = "../Account/logout.php">Logout</a>
       </nav>
    </head>
    <body>
<div id = "b">
    <h2>Add Product</h2>
        <form action = "#" class ="addproduts" method ="Post">
            Product Name<br><input type ="text" name ="proname" ><br>
            Product Price<br><input type ="number" name ="proprice"><br>
            Stock Quantity<br><input type ="number" name ="stock"><br>
            CategoryId<br><select name = "id" id = "category">
                          <option value = "100">Electric</option>
                          <option value = "200">Mountain</option>
                          <option value = "300">Road Bike</option></select><br>
            
            Picture<br><input type ="file" name ="propic" enctype="multipart/form-data" accept ="image/jpg"><br><br>
            <input type ="Submit" value = "Add Product"><br><br><br>
            
            
            <h2>Delete Product</h2>
        <form action = "#" class ="delproduct" method ="Post">
            Product Name<input type ="text" name ="pna" ><br><br>
            <input type ="Submit" value = "Delete Product"><br><br><br>
            
        <form action = "#" class ="addcategory" method ="Post">
            <h2>Add Category</h2>
            CategoryId<br><input type ="number" name ="cid" ><br>
            Category Name<br><input type ="text" name ="cna"><br><br>
            <input type ="Submit" value = "Add Category">

</div>

<?php
     $appn = filter_input(INPUT_POST, 'proname');
     $app = filter_input(INPUT_POST, 'proprice');
     $apid = filter_input(INPUT_POST, 'id');
     $aps = filter_input(INPUT_POST, 'stock');
     $appi = filter_input(INPUT_POST, 'propic');
     $dppn = filter_input(INPUT_POST, 'pna');
     $acid = filter_input(INPUT_POST, 'cid');
     $acna = filter_input(INPUT_POST, 'cna');


If(isset($appn) && $appn !=null){
    $sqlap = 'INSERT INTO products VALUES (Null, '.$apid.',  "'.$appn. '", '.$app.' , '.$aps.');';
    If($conn->query($sqlap) === TRUE) {
        echo "Product Added Successfully";
    }
    else{
    echo "Please Enter all Fields";
    }
}
elseif(isset($dppn) && $dppn !=null)
{
    $sqldp = "DELETE FROM products Where productName = '$dppn' ";
    If ($conn->query($sqldp) === TRUE ) {
   
        echo "Product Deleted Successfully";
    }
}
elseif(isset($acid) && $acid !=null)
{
    $sqlac = 'INSERT INTO category VALUES ('.$acid.', "'.$acna.'")';
    If ($conn->query($sqlac) === TRUE ) {
        echo "Category Added Successfully";
    }
}
$conn->close();
?>
    <?php include '../view/footer.php';?>
</html>