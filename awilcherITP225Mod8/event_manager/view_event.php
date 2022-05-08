<?php include '../view/header.php'; ?>
<main>
    <h1>Event Details</h1>
    <form action="index.php" method="post" id="aligned">          
        <input type="hidden" name="action" value="update_event">

        <input type="hidden" name="eventID"           
               value="<?php echo htmlspecialchars($event['eventID']); ?>">

        <label>Event Name:</label>
        <?php echo htmlspecialchars($event['eventName']) ?> <br>

        <label>Date:</label>
        <?php echo htmlspecialchars($event['dateOfEvent']) ?><br>

        <label>Time:</label>
        <?php echo htmlspecialchars($event['timeOfEvent']) ?><br>

        <label>Location:</label>
        <?php echo htmlspecialchars($event['location']) ?><br>


        <label>Description:</label>
        <?php echo htmlspecialchars($event['description']) ?><br>

        <label>Workers:</label><br>
        <?php $workers = explode("-", $event['workers']); ?>
        <?php foreach ($workers as $work) : ?>
            <?php echo $work; ?><br>
        <?php endforeach; ?>


        <br>
    </form>


    <p class="last_paragraph">
        <a href="index.php?action=list_events">View Event List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>