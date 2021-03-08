<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Volunteer Information</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    include("./views/nav.php");
    ?>
    <body>
        <div  class="wrapper-center">
            <form action="." method="post">
                <input type="hidden" name="action" value="addVolunteer"></input>
                <h1>Enter Volunteer Information</h1>

                <label>First Name:</label>
                <br>
                <input type="text" class="form-input" name="firstName" value="<?php echo htmlspecialchars($volunteer->getFirst_name()) ?>">
                <?php If ($firstNameError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($firstNameError) ?></p>
                <?php } ?>
                <br><br>
                <label>Last Name:</label>
                <br>
                <input type="text" class="form-input" name="lastName" value="<?php echo htmlspecialchars($volunteer->getLast_name()) ?>">
                <?php If ($lastNameError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($lastNameError) ?></p>
                <?php } ?>
                <br><br>
                <label>Email Address:</label>
                <br>
                <input type="text" class="form-input" name="email" value="<?php echo htmlspecialchars($volunteer->getEmail()) ?>">
                <?php If ($emailError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($emailError) ?></p>
                <?php } ?>
                <br><br>

                <label>Phone Number:</label>
                <br>
                <input type="text" class="form-input" name="phone" value="<?php echo htmlspecialchars($volunteer->getPhone()) ?>">
                <?php If ($phoneError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($phoneError) ?></p>
                <?php } ?>
                <br><br>

                <input type="submit" class="form-button" value="Submit">
            </form>
        </div>
    </body>

</html>