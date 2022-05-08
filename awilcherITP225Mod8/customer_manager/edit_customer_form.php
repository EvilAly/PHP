<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Customer, Donor, Volunteer, or Employee</h1>
    <form action="index.php" method="post" id="aligned">          
        <input type="hidden" name="action" value="update_customer">

        <input type="hidden" name="custID"           
               value="<?php echo htmlspecialchars($customer['custID']); ?>">

        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($customer['firstName']) ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($customer['lastName']) ?>"><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']) ?>"><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']) ?>"><br>



        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']) ?>"><br>

        <label>State:</label>
        <select name="state">
            <?php foreach ($states as $state) : ?>
                <?php $selected = ($state['stateName'] == $customer['state']) ? "selected" : NULL; ?>
                <option <?php echo $selected; ?> value="<?php echo $state['stateName']; ?>">
                    <?php echo $state['stateName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Zip:</label>
        <input type="text" name="zip" value="<?php echo htmlspecialchars($customer['zip']) ?>"><br>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']) ?>"><br>

        <label>Donor Status:</label>
        <select name="donor">
            <?php foreach ($donors as $donor) : ?>
                <?php $selected = ($donor['code'] == $customer['memCode']) ? "selected" : NULL; ?>
                <option <?php echo $selected; ?> value="<?php echo $donor['code']; ?>">
                    <?php echo $donor['type']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        
        <label>Employee Status:</label><br>
        <?php $checked = $customer['employee'] == "Yes" ? "checked" : NULL; ?>
        <input type="radio" name="employee" value="No" checked>Not an Employee<br>
        <input type="radio" name="employee" value="Yes" <?php echo $checked; ?>>Employee<br>


        <?php $vols = explode("-", $customer['volunteer']); ?>
        <br>
        <label>Volunteers as:</label><br>
        <?php $isChecked = in_array("tours", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="tours"> Tour Guide<br>
        <?php $isChecked = in_array("speaker", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="speaker"> Speaker<br>
        <?php $isChecked = in_array("ehelper", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="ehelper"> Event Helper<br>
        <?php $isChecked = in_array("contributors", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="contributors"> Newsletter Contributors<br>
        <?php $isChecked = in_array("curators", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="curators"> Plant Collection Curators<br>
        <?php $isChecked = in_array("ghelper", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="ghelper"> Garden Helpers<br>
        <?php $isChecked = in_array("sphelper", $vols) ? 'checked="checked"' : null; ?>
        <input type="checkbox" name="vol[]" <?= $isChecked; ?> value="sphelper"> Specific Project Helpers<br>
        <br>            



        <label>&nbsp;</label>
        <input type="submit" value="Update customer"><br>
    </form>


    <p class="last_paragraph">
        <a href="index.php?action=list_customers">View Customers List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>