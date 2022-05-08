<?php


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




function get_plants() {
    global $db;
    $query = 'SELECT * FROM plants
              ORDER BY commonName';
    $statement = $db->prepare($query);
    $statement->execute();
    $plants = $statement->fetchAll();
    $statement->closeCursor();
    return $plants;
}

//get a plant by id
function get_plant($plant_id) {
    global $db;
    $query = 'SELECT * FROM plants
              WHERE plantID = :plant_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':plant_id', $plant_id);
    $statement->execute();
    $plant = $statement->fetch();
    $statement->closeCursor();
    return $plant;
}


//delete a plant
function delete_plant($plant_id) {
    global $db;
    $query = 'DELETE FROM plants
              WHERE plantID = :plant_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':plant_id', $plant_id);
    $statement->execute();
    $statement->closeCursor();
}

//add a plant
function add_plant($botanical_name, $common_name, $heightMinInches, $heightMaxInches, 
                $spreadInches, $zones,$seasonalInterest, $pestProblems,
                $culture,$propagation,$uses,$pronunciation,$origin,$family,
                $type, $image, $color,$source,$vendor,$edible,$container){
    global $db;
    $query = 'INSERT INTO plants
                 (botanicalName, commonName, heightMinInches, heightMaxInches,
                 spreadInches, zones, seasonalInterest,pestProblems,culture,
                 propagation, uses, pronunciation, origin, family, 
                 type, image, color, source, vendor, edible, container)
              VALUES
                 (:botanical_name, :common_name, :heightMinInches, :heightMaxInches,
                 :spreadInches, :zones, :seasonalInterest,:pestProblems,:culture,
                 :propagation, :uses, :pronunciation, :origin, :family, 
                 :type, :image, :color, :source, :vendor, :edible, :container)';
    $statement = $db->prepare($query);
    $statement->bindValue(':botanical_name', $botanical_name);
    $statement->bindValue(':common_name', $common_name);
    $statement->bindValue(':heightMinInches', $heightMinInches);
    $statement->bindValue(':heightMaxInches', $heightMaxInches);
    $statement->bindValue(':spreadInches', $spreadInches);
    $statement->bindValue(':zones', $zones);
    $statement->bindValue(':seasonalInterest', $seasonalInterest);
    $statement->bindValue(':pestProblems', $pestProblems);
    $statement->bindValue(':culture', $culture);
    $statement->bindValue(':propagation', $propagation);
    $statement->bindValue(':uses', $uses);
    $statement->bindValue(':pronunciation', $pronunciation);
    $statement->bindValue(':origin', $origin);
    $statement->bindValue(':family', $family);
    $statement->bindValue(':type', $type); 
    $statement->bindValue(':image', $image);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':source', $source);
    $statement->bindValue(':vendor', $vendor);
    $statement->bindValue(':edible', $edible);
    $statement->bindValue(':container', $container);
    
    $statement->execute();
    $statement->closeCursor(); 
}

//update a plant
function update_plant($plant_id, $botanical_name, $common_name, $heightMinInches, $heightMaxInches, 
                $spreadInches, $zones,$seasonalInterest, $pestProblems,
                $culture,$propagation,$uses,$pronunciation,$origin,$family,
                $type, $image, $color,$source,$vendor,$edible,$container) {
    global $db;
    $query = 'UPDATE plants
              SET botanicalName = :botanical_name,
                  commonName = :common_name,
                  heightMinInches = :heightMinInches,
                  heightMaxInches = :heightMaxInches,
                  spreadInches = :spreadInches,
                  zones = :zones,
                  seasonalInterest = :seasonalInterest,
                  pestProblems = :pestProblems,
                  culture = :culture,
                  propagation = :propagation,
                  uses = :uses,
                  pronunciation = :pronunciation,
                  origin = :origin,
                  family = :family,
                  type = :type,
                  image = :image,
                  color = :color,
                  source = :source,
                  vendor = :vendor,
                  edible = :edible,
                  container = :container
                  
              WHERE plantID = :plant_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':botanical_name', $botanical_name);
    $statement->bindValue(':common_name', $common_name);
    $statement->bindValue(':heightMinInches', $heightMinInches);
    $statement->bindValue(':heightMaxInches', $heightMaxInches);
    $statement->bindValue(':spreadInches', $spreadInches);
    $statement->bindValue(':zones', $zones);
    $statement->bindValue(':seasonalInterest', $seasonalInterest);
    $statement->bindValue(':pestProblems', $pestProblems);
    $statement->bindValue(':culture', $culture);
    $statement->bindValue(':propagation', $propagation);
    $statement->bindValue(':uses', $uses);
    $statement->bindValue(':pronunciation', $pronunciation);
    $statement->bindValue(':origin', $origin);
    $statement->bindValue(':family', $family);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':source', $source);
    $statement->bindValue(':vendor', $vendor);
    $statement->bindValue(':edible', $edible);
    $statement->bindValue(':container', $container);
    
    $statement->bindValue(':plant_id', $plant_id);
    $statement->execute();
    $statement->closeCursor(); 
}

function plantsReport() {
    global $db;
    $query = 'SELECT botanicalName, commonName, color, zones, type
    FROM plants
    WHERE zones LIKE \'%7%\' AND color LIKE \'%white%\' AND type = \'Perennial\' ';
    $statement = $db->prepare($query);  
    $statement->execute();
    $plants = $statement->fetchAll();
    $statement->closeCursor();
    return $plants;
    
}

?>