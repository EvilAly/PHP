<?php
//get data from the request
$product_description = filter_input(INPUT_POST, 'product_description');
$list_price = filter_input(INPUT_POST,'list_price', FILTER_VALIDATE_FLOAT);
$discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);
define('SALES_TAX', 8);

//calculate discount amount & price, along with sales tax & total
$discount_amount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount_amount;
$sales_tax_amt = $discount_price * SALES_TAX * .01;
$sales_total = $discount_price + $sales_tax_amt;

//format lines
$list_price_f = '$'.number_format($list_price,2);
$discount_percent_f = $discount_percent.'%';
$discount_amount_f = '$'.number_format($discount_amount,2);
$discount_price_f = '$'. number_format($discount_price,2);
$sales_tax_amt_f = '$'.number_format($sales_tax_amt,2);
$sales_total_f = '$'.number_format($sales_total,2);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Product Discount Calculator</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Product Discount Calculator</h1>

            <label>Product Description:</label>
            <span><?php echo htmlspecialchars($product_description); ?></span><br>

            <label>List Price:</label>
            <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

            <label>Standard Discount:</label>
            <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

            <label>Discount Amount:</label>
            <span><?php echo $discount_amount_f; ?></span><br>

            <label>Discount Price:</label>
            <span><?php echo $discount_price_f; ?></span><br>
            
            <br>
            
            <label>Sales Tax Rate:</label>
            <span><?php echo SALES_TAX.'%'; ?></span><br>
            
            <label>Sales Tax Amount:</label>
            <span><?php echo $sales_tax_amt_f; ?></span><br>
            
            <label>Sales Total:</label>
            <span><?php echo $sales_total_f; ?></span><br>
        </main>
    </body>
</html>