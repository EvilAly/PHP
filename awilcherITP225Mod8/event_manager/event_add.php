
<?php include '../view/header.php'; ?>
<main>
    <h1>Add Event</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="add_event">

        <label>Event Name:</label>
        <input type="text" name="eventName" placeholder="Name of the Event" required><br>

        <label>Date:</label>
        <input type="date" name="date"><br>

        <label>Time:</label>
        <input type="text" name="time" placeholder="i.e. 3PM - 6PM" required><br>

        <label>Location:</label>
        <input type="text" name="location" placeholder="Where to attend" required><br>

        <label>Description:</label>
        <textarea type="text" name="description" rows="4" cols="50" placeholder="Tell me more"></textarea><br>

        <label>Employees/Volunteers</label><br>
        <?php foreach ($customers as $customer) : ?>
            <input type="checkbox" name="workers[]"value="<?php echo $customer['FullName']; ?>">
            <?php echo $customer['FullName']; ?>
            </br>
        <?php endforeach; ?>
        <br>



        <input type="submit" value="Add Event"><br>
    </form>
    <p><a href="?action=list_events">View Event List</a></p>

</main>
<?php include '../view/footer.php'; ?>