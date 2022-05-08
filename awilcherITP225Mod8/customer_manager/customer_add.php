
<?php include '../view/header.php'; ?>
<main>
    <h1>Add Customer, Donor, Volunteer, or Employee</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="add_customer">

        <!-- You fill in the labels and fields for YOUR customers here! (DO NOT PUT THE ID - THAT SHOULD BE AUTO INCREMENT FIELD IN DATABASE!) -->

        <label>First Name:</label>
        <input type="text" name="firstName"><br>

        <label>Last Name:</label>
        <input type="text" name="lastName"><br>

        <label>Phone:</label>
        <input type="tel" name="phone"><br>

        <label>Address:</label>
        <input type="text" name="address"><br>



        <label>City:</label>
        <input type="text" name="city"><br>

        <label>State:</label>
        <select name="state">
            <?php foreach ($states as $state) : ?>
                <option value="<?php echo $state['stateName']; ?>">
                    <?php echo $state['stateName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Zip:</label>
        <input type="text" name="zip"><br>
        
        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Donor Status:</label>
        <select name="donor">
            <?php foreach ($donors as $donor) : ?>
                <option value="<?php echo $donor['code']; ?>">
                    <?php echo $donor['type']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        
        <label>Employee Status:</label><br>
        <input type="radio" name="employee" value="No" checked>Not an Employee<br>
        <input type="radio" name="employee" value="Yes">Employee<br>
        
        <br>
        <label>Volunteers as:</label><br>
        <input type="checkbox" name="vol[]" value="tours"> Tour Guide<br>
        <input type="checkbox" name="vol[]" value="speaker"> Speaker<br>
        <input type="checkbox" name="vol[]" value="ehelper"> Event Helper<br>
        <input type="checkbox" name="vol[]" value="contributors"> Newsletter Contributors<br>
        <input type="checkbox" name="vol[]" value="curators"> Plant Collection Curators<br>
        <input type="checkbox" name="vol[]" value="ghelper"> Garden Helpers<br>
        <input type="checkbox" name="vol[]" value="sphelper"> Specific Project Helpers<br>
        <br>


        <input type="submit" value="Add customer"><br>
    </form>
    <p><a href="?action=list_customers">View Customer List</a></p>

</main>
<?php include '../view/footer.php'; ?>