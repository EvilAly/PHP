<?php include '../view/header.php'; ?>
<main>
    <h1>Volunteer List</h1>
    
    <!-- display a table of customers -->
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            
            <th>Tour Guide</th>
            <th>Speaker</th>
            <th>Event Helper</th>
            <th>Newspaper Contributor</th>
            <th>Collection Curators</th>
            <th>Garden Helpers</th>
            <th>Project Helper</th>

        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName']); ?></td>
                <td><?php echo htmlspecialchars($customer['lastName']); ?></td>
                <td><?php echo htmlspecialchars($customer['phone']); ?></td>
                
                <?php $vols = explode('-', $customer['volunteer']); ?>
                <?php $isAvail = in_array("tours", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("speaker", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("ehelper", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("contributors", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("curators", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("ghelper", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                <?php $isAvail = in_array("sphelper", $vols) ? 'X' : ''; ?>
                <td><?php echo $isAvail; ?></td>
                

            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=list_customers">View Full List</a></p>
    <br>




</main>
<?php include '../view/footer.php'; ?>

