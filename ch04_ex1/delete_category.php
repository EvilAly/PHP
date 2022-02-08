<?php

//intial access to the database
require_once('database.php');

//set the category variable
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

//Delete the category from the database
if ($category_id != false) {
    $query = 'DELETE FROM categories
            WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();
}

//Display the Category page 
include('category_list.php');
