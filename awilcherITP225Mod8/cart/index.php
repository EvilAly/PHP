<?php

// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require('../model/database.php');
require('../model/cart_db.php');
// Include cart functions
require_once('cart.php');

// Get the cart array from the session
if (empty($_SESSION['cart13']) || !isset($_SESSION['cart13'])) {
    $cart = array();
} else {
    $cart = $_SESSION['cart13'];
}


//determine the action
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_cart';
    }
}

$products = get_plants_cart();

// Add or update cart as needed
switch ($action) {
    case 'add':
        $key = filter_input(INPUT_POST, 'productkey');
        $quantity = filter_input(INPUT_POST, 'itemqty');

        murach\cart\add_item($cart, $key, $quantity);

        $_SESSION['cart13'] = $cart;
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach ($new_qty_list as $key => $qty) {
            if ($cart[$key]['qty'] != $qty) {
                murach\cart\update_item($cart, $key, $qty);
            }
        }
        $_SESSION['cart13'] = $cart;
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'show_add_item':
        include('add_item_view.php');
        break;
    case 'empty_cart':
        $cart = array();
        $_SESSION['cart13'] = $cart;
        include('cart_view.php');
        break;

    //you need a case statement in here that inserts an order!


    case 'insert_order':
        //you'll need to call the functions in your cart_db.php (yes you have to write them!)
        $date = date('Y-m-d'); //code for today's date
        $custID = filter_input(INPUT_POST, 'custID');
        insertOrder($date, $custID, $cart);

        //then once the database has been updated, you'll need to empty the cart like so
        $cart = array();
        $_SESSION['cart13'] = $cart;
        //then include the cart view page 
        include('cart_view.php');
        break;
}
?>