<?php include '../view/header.php'; ?>
<main>
    <h1>List of Employees</h1>

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


            <th></th>
            <th></th>
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

                <td><form action="." method="post">
                        <input type="hidden" name="action" value="delete_customer">
                        <input type="hidden" name="custID" value="<?php echo htmlspecialchars($customer['custID']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action" value="edit_customer">
                        <input type="hidden" name="custID" value="<?php echo htmlspecialchars($customer['custID']); ?>">
                        <input type="submit" value="Edit">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Person</a></p>

    <p><a href="?action=search_donors">Donors</a></p>
    <p><a href="?action=find_vols">Volunteers</a></p>
    <p><a href="?action=list_customers">Full List</a></p>






</main>
<?php include '../view/footer.php'; ?>

