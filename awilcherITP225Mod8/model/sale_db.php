<?php

function get_sales() {
    global $db;
    $query = 'SELECT * FROM sales
              ORDER BY saleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $sales = $statement->fetchAll();
    $statement->closeCursor();
    return $sales;
}

//get a sale by id
function get_sale($saleID) {
    global $db;
    $query = 'SELECT * FROM sales
              WHERE saleID = :saleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':saleID', $saleID);
    $statement->execute();
    $sale = $statement->fetch();
    $statement->closeCursor();
    return $sale;
}


//delete a sale
function delete_sale($sale_id) {
    global $db;
    $query = 'DELETE FROM sales
              WHERE saleID = :sale_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':sale_id', $sale_id);
    $statement->execute();
    $statement->closeCursor();
}

//add a sale
function add_sale($memberEndDate,$memberStartDate, $publicEndDate, $publicStartDate,$saleName){
    global $db;
    $query = 'INSERT INTO sales
                 (memberEndDate,memberStartDate,publicEndDate,
                 publicStartDate,saleName)
              VALUES
                 (:memberEndDate,:memberStartDate,:publicEndDate,
                 :publicStartDate,:saleName)';

    $statement = $db->prepare($query);
    $statement->bindValue(':memberEndDate', $memberEndDate);    
    $statement->bindValue(':memberStartDate', $memberStartDate);    
    $statement->bindValue(':publicEndDate', $publicEndDate);
    $statement->bindValue(':publicStartDate', $publicStartDate);
    $statement->bindValue(':saleName', $saleName);
    $statement->execute();
    $statement->closeCursor(); 
}

//update a sale
function update_sale($memberEndDate,$memberStartDate, $publicEndDate, $publicStartDate,$saleID,$saleName){
    global $db;
    $query = 'UPDATE sales
              SET saleName = :saleName,
                  memberStartDate = :memberStartDate,
                  memberEndDate = :memberEndDate,
                  publicStartDate = :publicStartDate,
                  publicEndDate = :publicEndDate
              WHERE saleID = :saleID';
    $statement = $db->prepare($query);
    $statement->bindValue(':saleName', $saleName);
    $statement->bindValue(':memberStartDate', $memberStartDate);
    $statement->bindValue(':memberEndDate', $memberEndDate);
    $statement->bindValue(':publicStartDate', $publicStartDate);
    $statement->bindValue(':publicEndDate', $publicEndDate);  
    $statement->bindValue(':saleID', $saleID);
    $statement->execute();
    $statement->closeCursor(); 
}


?>