<?php include '../view/header.php'; ?>
<main>
    <h1>Current Inventory List</h1>

    <!-- display a table of customers -->
    <table>
        <tr>
            <th>Plant ID</th>
            <th>Common Name</th>
            <th>Number in Stock</th>
             <th>Price Each</th>
             <th>Total Value</th>
        </tr>
        <?php foreach ($inventory as $item) : ?>
        <tr>
            <td style="text-align:center"><?php echo htmlspecialchars($item['plantID']); ?></td>
            <td><?php echo htmlspecialchars($item['commonName']); ?></td>
             <td style="text-align:center"><?php echo htmlspecialchars($item['numInStock']); ?></td>
            <td style="text-align:right"><?php echo htmlspecialchars($item['price']); ?></td>
            <td style="text-align:right"><?php echo htmlspecialchars($item['value']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!--<p><a href="?action=show_add_form">Add Customer</a></p>-->

</main>
<?php include '../view/footer.php'; ?>

