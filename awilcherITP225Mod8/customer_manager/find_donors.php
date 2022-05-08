<?php include '../view/header.php'; ?>
<main>
    <h1>Customer List</h1>
    <form action='index.php' method="POST">
        <label>Donor Status:</label>
        <select name="donor">
            <?php foreach ($donors as $donor) : ?>
                <?php $selected = ($donor['code'] == $code) ? "selected" : NULL; ?>
                <option <?php echo $selected; ?> value="<?php echo $donor['code']; ?>">
                    <?php echo $donor['type']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="action" value="search_donors">
        <input type="submit" value="Search"><br>
    </form>


    <!-- display a table of customers -->
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Address</th>

            <th>City</th>
            <th>State</th>

            <th>Zip</th>

        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName']); ?></td>
                <td><?php echo htmlspecialchars($customer['lastName']); ?></td>
                <td><?php echo htmlspecialchars($customer['phone']); ?></td>
                <td><?php echo htmlspecialchars($customer['address']); ?></td>

                <td><?php echo htmlspecialchars($customer['city']); ?></td>
                <td><?php echo htmlspecialchars($customer['state']); ?></td>
                <td><?php echo htmlspecialchars($customer['zip']); ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=list_customers">View Customer List</a></p>
    <br>




</main>
<?php include '../view/footer.php'; ?>

