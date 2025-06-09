<html>
<head>
<link rel = "stylesheet" href = "s.css">
<?php include '../view/header.php'; ?>
<?php include '../view/side.php'; ?>
<?php include '../dbconnect.php'; ?>
</head>

<body>
    <main>
        <h1>Add Item</h1>
        <form action="." method="post">
            <input type="hidden" name="action" value="add">
 
            <label>Name:</label>
            <select name="productkey">
            <?php foreach($products as $key => $product) :
                $cost = number_format($product['cost'], 2);
                $name = $product['name'];
                $item = $name . ' ($' . $cost . ')';
            ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Quantity:</label>
            <select name="itemqty">
            <?php for($i = 1; $i <= 10; $i++) : ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php endfor; ?>
            </select><br>
 
            <label>&nbsp;</label>
            <input type="submit" value="Add Item">
        </form>
        <p><a href=".?action=show_cart">View Cart</a></p>    
    </main>
    <h1>Your Cart</h1>
        <?php if (empty($_SESSION['cart12']) || 
                  count($_SESSION['cart12']) == 0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="." method="post">
            <input type="hidden" name="action"
                   value="update">
            <table>
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>
                <?php foreach($_SESSION['cart12'] as $key => $item ) :
         $cost  = number_format($item['cost'],  2);
         $total = number_format($item['total'], 2);
   ?>
   <tr>
      <td><?php echo $item['name']; ?></td>
      <td class="right">$<?php echo $cost; ?></td>
      <td class="right"><input type="text" class="cart_qty"
               name="newqty[<?php echo $key; ?>]“
               value="<?php echo $item['qty']; ?>">
      </td>
      <td class="right">$<?php echo $total; ?></td>
   </tr>
   <?php endforeach; ?>
   <tr id="cart_footer">
                    <td colspan="3"><b>Subtotal</b></td>
                    <td>$<?php echo get_subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="right">
                        <input type="submit"
                               value="Update Cart"></td>
                </tr>
            </table>
            <p>Click "Update Cart" to update quantities in
               your cart. Enter a quantity of 0 to remove
               an item.</p>
            </form>
        <?php endif; ?>
        <p><a href=".?action=show_add_item">Add Item</a></p>
        <p><a href=".?action=empty_cart">Empty Cart</a></p>

</body>
</html>
