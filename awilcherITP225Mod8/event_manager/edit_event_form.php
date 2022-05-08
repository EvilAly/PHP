<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Event</h1>
    <form action="index.php" method="post" id="aligned">          
        <input type="hidden" name="action" value="update_event">

        <input type="hidden" name="eventID"           
               value="<?php echo htmlspecialchars($event['eventID']); ?>">

        <label>Event Name:</label>
        <input type="text" name="eventName" value="<?php echo htmlspecialchars($event['eventName']) ?>"><br>

        <label>Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($event['dateOfEvent']) ?>" ><br>

        <label>Time:</label>
        <input type="text" name="time" value="<?php echo htmlspecialchars($event['timeOfEvent']) ?>" ><br>

        <label>Location:</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($event['location']) ?>" ><br>


        <label>Description:</label>
        <textarea type="text" name="description" rows="4" cols="50"><?php echo htmlspecialchars($event['description'])?></textarea><br>

        <label>Employees/Volunteers</label><br>
        
        <?php foreach ($customers as $customer) : ?>
        
            <input type="checkbox" name="workers[]" value="<?php echo $customer['FullName'] ; ?>">
            <?php echo $customer['FullName']; ?>
            <br>
        <?php endforeach; ?>
        <br>
        
        
        <label>&nbsp;</label>
        <input type="submit" value="Update event"><br>
    </form>


    <p class="last_paragraph">
        <a href="index.php?action=list_events">View Event List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>