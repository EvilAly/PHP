<?php

function get_events() {
    global $db;
    $query = 'SELECT *
              FROM events
              ORDER BY YEAR(dateOfEvent), MONTH(dateOfEvent), DAY(dateOfEvent)';
    $statement = $db->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}

//delete an event
function delete_event($eventID) {
    global $db;
    $query = 'DELETE FROM events
              WHERE eventID = :eventID';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventID', $eventID);
    $statement->execute();
    $statement->closeCursor();
}

//add a customer
function add_event($eventName, $date, $time, $location, $description, $workers) {
    global $db;
    $query = 'INSERT INTO events 
                (eventName, dateOfEvent, timeOfEvent, location, description, workers) 
              VALUES (:eventName, :dateOfEvent, :timeOfEvent, :location, :description, :workers)';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventName', $eventName);
    $statement->bindValue(':dateOfEvent', $date);
    $statement->bindValue(':timeOfEvent', $time);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':workers', $workers);
    $statement->execute();
    $statement->closeCursor();
}

//get an event by id
function get_event($eventID) {
    global $db;
    $query = 'SELECT * FROM events
              WHERE eventID = :eventID';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventID', $eventID);
    $statement->execute();
    $event = $statement->fetch();
    $statement->closeCursor();
    return $event;
}

//update an event
function edit_events($eventName, $date, $time, $location, $description, $eventID, $workers) {
    global $db;
    $query = 'UPDATE events
              SET eventName = :eventName,
                  dateOfEvent = :date,
                  timeOfEvent = :time,
                  location = :location,
                  description = :description,
                  workers = :workers
              WHERE eventID = :eventID';
    $statement = $db->prepare($query);
    $statement->bindValue(':eventName', $eventName);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':time', $time);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':workers', $workers);
    $statement->bindValue(':eventID', $eventID);
    $statement->execute();
    $statement->closeCursor();
}

function get_customers() {
    global $db;
    $query = 'SELECT CONCAT(firstName, " ", lastName) 
             AS FullName FROM customers
             WHERE employee = "Yes" OR volunteer IS NOT NULL
             ORDER BY lastName, firstName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}
?>

