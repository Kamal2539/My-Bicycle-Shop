# My-Bicycle-Shop
Introduction: The online shopping cart system is a web-based application developed using PHP and MySQL. This system allows users to view a list of items, add items to their shopping cart, and manage the quantity of items in the cart. The project's goal is to give consumers an excellent shopping experience by incorporating necessary functions such dynamic updates, cart management, and item presentation.

Features:
a.	User:
i.	Item Display:
1.	A user-friendly interface to view a list of available items.
2.	Each item displays relevant details like name, description, and price.

ii.	Shopping Cart Management:
1.	Users can add items to their shopping cart.
2.	Cart management includes the ability to increase or decrease the quantity of items in the cart.
3.	Users can view the total cost of items in their cart.

b.	Admin
i.	View all products.
ii.	Add/ Remove products.
iii.	View all user’s orders.

Resources Used:
a.	Programming Language: PHP
b.	Database: MySQL
c.	Front-end: HTML, CSS

Database:
a.	Products (ID, categoryId, productName, productPrice, stock).
b.	Orders (customerId, product, price, quantity, subtotal).
c.	Idpass (customerID, Password, Name, Email).
d.	Category (catID, categoryName).

PHP Files:
a.	index.php: Displays the home page.
b.	cart.php: Manages the shopping cart operations (add, remove, update).
c.	products.php: Displays all products.
d.	order.php: Displays all the orders.

Adding Items to Cart:
a.	When a user clicks the "Add to Cart" button, the system adds the selected item to the cart using Session.

Cart Management:
a.	The user can view their shopping cart by navigating to the cart.php page.
b.	The cart page displays the added items with options to increase, decrease, or remove items.
c.	Quantity and total price are dynamically updated based on user actions.

Conclusion: The Online Shopping Cart System is a functional and user-friendly project that allows users to browse items, add them to their carts, and manage their purchases.

