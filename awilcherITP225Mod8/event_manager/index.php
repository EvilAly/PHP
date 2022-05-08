<?php

require('../model/database.php');
require('../model/event_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_events';
    }
}

if ($action == 'list_events') {
    // Get product data
    $events= get_events();

    // Display the product list
    include('event_list.php');
} 

//add an event
else if ($action == 'show_add_form') {
    $customers = get_customers();
    include('event_add.php');
} 

//delete an event
if ($action == 'delete_event') {
    $eventID = filter_input(INPUT_POST, 'eventID');
    delete_event($eventID);
    header("Location: .");
}

//add an event
else if ($action == 'add_event') {
    $eventName = filter_input(INPUT_POST, 'eventName');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    $location = filter_input(INPUT_POST, 'location' ); 
    $description = filter_input(INPUT_POST, 'description' );
    $work = filter_input(INPUT_POST, 'workers', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $workers = implode("-", $work);
   
    // Validate the inputs
     if ( empty($eventName) || empty($date) || 
             empty($time) || empty($location) || 
            empty($description) ) {
        $error = "Invalid event data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_event($eventName, $date, $time, $location, $description, $workers);
        header("Location: .");
    }
}

//edit an event
else if ($action == 'edit_event'){
    $eventID = filter_input(INPUT_POST, 'eventID', FILTER_VALIDATE_INT);
    
     if (!isset($eventID)) {
        $error = "Missing or incorrect event id.";
        include('../errors/error.php');
    } else { 
       $event = get_event($eventID);
        $customers = get_customers();
       include('edit_event_form.php');
    }
       
    
} else if ($action == 'update_event') {
    
    $eventID = filter_input(INPUT_POST, 'eventID',FILTER_VALIDATE_INT);
    $eventName = filter_input(INPUT_POST, 'eventName');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    $location = filter_input(INPUT_POST, 'location' ); 
    $description = filter_input(INPUT_POST, 'description' );
    $work = filter_input(INPUT_POST, 'workers', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $workers = implode("-", $work);
       
      if ( empty($eventName) || empty($date) || 
             empty($time) || empty($location) || 
            empty($description) || empty($eventID) ) {
        $error = "Invalid event data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        edit_events($eventName, $date, $time, $location, $description, $eventID, $workers);
        header("Location: .");
    }
}
else if ($action == 'view_event') {
    $eventID = filter_input(INPUT_POST, 'eventID', FILTER_VALIDATE_INT);
    
     if (!isset($eventID)) {
        $error = "Missing or incorrect event id.";
        include('../errors/error.php');
    } else { 
       $event = get_event($eventID);
       include('view_event.php');
    }
}

?>