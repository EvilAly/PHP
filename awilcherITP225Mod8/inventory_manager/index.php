<?php

require('../model/database.php');
require('../model/cart_db.php');

$inventory = getInventory();
include('inventory_list.php');


?>