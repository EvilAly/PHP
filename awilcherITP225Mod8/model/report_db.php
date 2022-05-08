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

function get_plants() {
    global $db;
    $query = 'SELECT * FROM plants WHERE ((zones = "5-7" OR zones = "6-8") AND color LIKE "%white%")';
    $statement = $db->prepare($query);
    $statement->execute();
    $plants = $statement->fetchAll();
    $statement->closeCursor();
    return $plants;
}

function get_reorders() {
    global $db;
    $query = 'SELECT p.commonName, i.numInStock, i.price
            FROM inventory i, plants p
            WHERE i.plantID = p.plantID 
            AND i.numInStock <= 12 ORDER BY p.commonName;';
    $statement = $db->prepare($query);
    $statement->execute();
    $plants = $statement->fetchAll();
    $statement->closeCursor();
    return $plants;
}