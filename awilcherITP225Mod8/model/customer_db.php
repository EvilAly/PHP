<?php


function get_states() {
    global $db;
    $query = 'SELECT *
              FROM states
              ORDER BY stateID';
    $statement = $db->prepare($query);
    $statement->execute();
    $states = $statement->fetchAll();
    $statement->closeCursor();
    return $states;
}

function get_donations() {
    global $db;
    $query = 'SELECT *
              FROM donors
              ORDER BY code';
    $statement = $db->prepare($query);
    $statement->execute();
    $donate = $statement->fetchAll();
    $statement->closeCursor();
    return $donate;        
}


function get_customers() {
    global $db;
    $query = 'SELECT * FROM customers
              ORDER BY lastName, firstName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function get_employees() {
    global $db;
    $query = 'SELECT * FROM customers
            WHERE employee = "Yes"
              ORDER BY lastName, firstName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

//get a customer by id
function get_customer($custID) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE custID = :custID';
    $statement = $db->prepare($query);
    $statement->bindValue(':custID', $custID);   
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}


//delete a customer
function delete_customer($custID) {
    global $db;
    $query = 'DELETE FROM customers
              WHERE custID = :custID';
    $statement = $db->prepare($query);
    $statement->bindValue(':custID', $custID); 
    $statement->execute();
    $statement->closeCursor();
    
}

function get_donors($code) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE memCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function get_vols(){
    global $db;
    $query = 'SELECT * FROM customers
              WHERE volunteer <> "NULL"';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

//add a customer
function add_customer($firstName, $lastName, $address, $phone, $city, $state, $zip, $emp, $email, $donate, $volunteer) {
  global $db;
    $query = 'INSERT INTO customers 
                (firstName, lastName, email, address, phone, city, state, zip, employee, memCode, volunteer) 
              VALUES (:firstName, :lastName, :email, :address, :phone, :city, :state, :zip, :emp, :code, :vol)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':emp', $emp);
    $statement->bindValue(':code', $donate);
    $statement->bindValue(':vol', $volunteer);
    $statement->execute();
    $statement->closeCursor();
    
}

//update a customer
function update_customer($firstName, $lastName, $address, $phone, $city, $state, $zip, $emp, $email, $custID, $donate, $volunteer) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :first,
                  lastName = :last,
                  address = :address,
                  phone = :phone,
                  city = :city,
                  state = :state,
                  zip = :zip,
                  email = :email,
                  employee = :emp,
                  memCode = :donate,
                  volunteer = :vol
              WHERE custID = :custID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':first', $firstName);
    $statement->bindValue(':last', $lastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':emp', $emp);
    $statement->bindValue(':donate', $donate);
    $statement->bindValue(':vol', $volunteer);
    $statement->bindValue(':custID', $custID); 
    $statement->execute();
    $statement->closeCursor();
}

?>

