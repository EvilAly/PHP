<?php

/*
  This is where you need to add the functions that inserts orders and updates inventory.
 * HINT:  What I would do is after you insert the order, within the SAME function, I would call the function to update the inventory!  
 * You don't re ally need to return anything to the index page at this point (we just don't have enough time to go through all of that!) So it
 * won't necessarily return a list of anthing.
 */

function inventoryList() {
    //function to create an array of product id's and available quantities
    global $db;

    $query = 'SELECT plantID, numInStock FROM inventory';
    $statement = $db->prepare($query);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}

function getInventory() {
    global $db;

    $query = 'SELECT plants.plantID, plants.commonName, inventory.numInStock, inventory.price, (numInStock * price) AS value
              FROM plants, inventory
              WHERE plants.plantID = inventory.plantID';
    $statement = $db->prepare($query);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}

function insertOrder($date, $custID, $cart) {
    global $db;
    $total = murach\cart\get_subtotal($cart);
    $query = 'INSERT INTO orders
                 (orderDate, custID, orderTotal)
              VALUES
                 (:date, :custID, :total)';
    $statement = $db->prepare($query);
    //bind your values
    $statement->bindValue(':date', $date);
    $statement->bindValue(':custID', $custID);
    $statement->bindValue(':total', $total);
    $statement->execute();
    $statement->closeCursor();
    //CALL the updateInventory function here!!
    updateInventory($cart);
}

function getLastOrder() {
    global $db;
    $query = 'SELECT * FROM orders ORDER BY orderID';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    $lastOrder = 1;
    foreach ($orders as $order):
        $lastOrder = $order;
    endforeach;
    return $lastOrder;
}

function updateInventory($cart) {
    global $db;
    foreach ($cart as $item) :
        $qty = get_quantity($item);
        $inStock = $qty[0];
    
        $remain = $inStock['numInStock'] - (int) $item['qty'];

        $query = 'UPDATE inventory INNER JOIN plants
            ON inventory.plantID = plants.plantID
              SET  numInStock = :qty
              WHERE plants.commonName = :plantID';
        $statement = $db->prepare($query);
        //bind your values
        $statement->bindValue(':qty', $remain);
        $statement->bindValue(':plantID', $item['name']);
        $statement->execute();
        $statement->closeCursor();
    endforeach;
}

function get_plants_cart() {
    global $db;
    $query = 'SELECT distinct p.plantID, p.commonName, i.price 
             FROM inventory i, plants p
             WHERE i.plantID = p.plantID
             AND i.numInStock>0
             ORDER BY p.commonName';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_quantity($item) {
    global $db;
    $query = 'SELECT i.numInStock 
            FROM inventory i
            INNER JOIN plants p
            ON i.plantID = p.plantID
            WHERE p.commonName = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $item['name']);
    $statement->execute();
    $qty = $statement->fetchAll();
    $statement->closeCursor();
    return $qty;
}

