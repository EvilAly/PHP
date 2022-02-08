<?php
require('database.php');

//get the product ID from the page you just submitted
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

//now build out a query that will select all the information from the products table for THAT particular product.
$query = 'SELECT *
          FROM products
          WHERE productID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id); 
$statement->execute(); //execute that statement
$product = $statement->fetch(); //get the info
$statement->closeCursor(); //close the cursor


?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product_form.php" method="post"
              id="edit_product_form">
            
            
            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
            
            <label>Category ID:</label>
            <input type="category_id" name="category_id" value="<?php echo $product['categoryID']; ?>"><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo htmlspecialchars($product['productCode']); ?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['productName']); ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice']; ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Update Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>