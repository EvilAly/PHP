<?php include '../view/header.php'; ?>
<main>
    <h1>Event List</h1>

    <!-- display a table of customers -->
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Event Time</th>
            <th>Location</th>
            

            <th></th>
            <th></th>
        </tr>
        <?php foreach ($events as $event) : ?>
            <tr>
                <td><?php echo htmlspecialchars($event['eventName']); ?></td>

                <?php
                $sqltime = strtotime(($event['dateOfEvent']));
                $formatTime = date("F d", $sqltime);
                ?>
                <td><?php echo $formatTime; ?></td>
                <td><?php echo htmlspecialchars($event['timeOfEvent']); ?></td>
                <td><?php echo htmlspecialchars($event['location']); ?></td>


                <td><form action="." method="post">
                        <input type="hidden" name="action" value="view_event">
                        <input type="hidden" name="eventID" value="<?php echo htmlspecialchars($event['eventID']); ?>">
                        <input type="submit" value="View Details">
                    </form></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action" value="delete_event">
                        <input type="hidden" name="eventID" value="<?php echo htmlspecialchars($event['eventID']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                <td><form action="." method="post">
                        <input type="hidden" name="action" value="edit_event">
                        <input type="hidden" name="eventID" value="<?php echo htmlspecialchars($event['eventID']); ?>">
                        <input type="submit" value="Edit">
                    </form></td>
            </tr>
<?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Event</a></p>

</main>
<?php include '../view/footer.php'; ?>

