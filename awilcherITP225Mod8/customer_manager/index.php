<?php

require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customers';
    }
}

if ($action == 'list_customers') {
    // Get Customer data
    $customers = get_customers();

    // Display the customer list
    include('customer_list.php');
}


//delete a customer
if ($action == 'delete_customer') {
    $custID = filter_input(INPUT_POST, 'custID');
    delete_customer($custID);
    header("Location: .");
}
//add a customer
else if ($action == 'show_add_form') {
    $states = get_states();
    $donors = get_donations();
    include('customer_add.php');
} else if ($action == 'add_customer') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $emp = filter_input(INPUT_POST, 'employee');
    $email = filter_input(INPUT_POST, 'email');
    $donate = filter_input(INPUT_POST, 'donor');
    $vols = filter_input(INPUT_POST, 'vol', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $volunteer = implode("-", $vols);

    // Validate the inputs
    if (empty($firstName) || empty($lastName) ||
            empty($address) || empty($phone) ||
            empty($city) || empty($state) ||
            empty($zip)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_customer($firstName, $lastName, $address, $phone, $city, $state, $zip, $emp, $email, $donate, $volunteer);
        header("Location: .");
    }
}
else if ($action == 'find_vols') {
    $customers = get_vols();
    include('find_volunteers.php');
}
//edit a customer
else if ($action == 'edit_customer') {
    $custID = filter_input(INPUT_POST, 'custID', FILTER_VALIDATE_INT);
    $donors = get_donations();
    $states = get_states();

    if (!isset($custID)) {
        $error = "Missing or incorrect customer id.";
        include('../errors/error.php');
    } else {
        $customer = get_customer($custID);
        include('edit_customer_form.php');
    }
} else if ($action == 'search_donors') {
    if (isset($_POST['donor'])) {
        $code = filter_input(INPUT_POST, 'donor');
    } else {
        $code = 0;
    }
    $customers = get_donors($code);
    $donors = get_donations();
    // Display the product list
    include('find_donors.php');
}
else if ($action == 'update_customer') {
    $custID = filter_input(INPUT_POST, 'custID', FILTER_VALIDATE_INT);
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $emp = filter_input(INPUT_POST, 'employee');
    $email = filter_input(INPUT_POST, 'email');
    $donate = filter_input(INPUT_POST, 'donor');
    $vols = filter_input(INPUT_POST, 'vol', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $volunteer = implode("-", $vols);

    if (empty($firstName) || empty($lastName) ||
            empty($address) || empty($phone) ||
            empty($city) || empty($state) ||
            empty($zip)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_customer($firstName, $lastName, $address, $phone, $city, $state, $zip, $emp, $email, $custID, $donate, $volunteer);
        header("Location: .");
    }
}
else if ($action == 'show_employees'){
    // Get Customer data
    $customers = get_employees();

    // Display the customer list
    include('employee_list.php');
}

?>