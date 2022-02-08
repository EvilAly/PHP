<?php
// Get the product data
$category_name = filter_input(INPUT_POST, 'categoryName');

// Validate inputs
if ($category_name == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the category to the database  
    $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $category_name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>