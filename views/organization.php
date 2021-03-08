<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Organization Information</title>
        <link href="nav.css" rel="stylesheet" type="text/css" />
        <link href="main.css" rel="stylesheet" type="text/css" />

    </head>
    <?php
    If ($isRegister == FALSE) {
        include("./views/nav.php");
    }
    ?>
    <body>
        <div class="wrapper-center">
            <form action="." method="post">
                <input type="hidden" name="action" value="addOrganization"></input>
                <h1>Enter Organization Information</h1>

                <label>Organization Name:</label>
                <br>
                <input type="text" class="form-input" name="organizationName" value="<?php echo htmlspecialchars($organization->getOrganization_name()) ?>">
                <?php If ($organizationNameError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($organizationNameError) ?></p>
                <?php } ?>

                <br><br>
                <label>Email Address:</label>
                <br>
                <input type="text" class="form-input" name="email" value="<?php echo htmlspecialchars($organization->getEmail()) ?>">
                <?php If ($emailError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($emailError) ?></p>
                <?php } ?>
                <br><br>
                <?php If ($isRegister == TRUE) { ?>
                    <label>Password:</label>
                    <br>
                    <input type="text" class="form-input" name="password" value="<?php echo htmlspecialchars($organization->getPassword()) ?>">
                    <?php If ($passwordError != '') { ?>
                        <div class="error"><?php echo htmlspecialchars($passwordError) ?></div>
                    <?php } ?>
                    <br><br>
                <?php } ?>
                <label>Phone Number:</label>
                <br>
                <input type="text" class="form-input" name="phone" value="<?php echo htmlspecialchars($organization->getPhone()) ?>">
                <?php If ($phoneError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($phoneError) ?></p>
                <?php } ?>
                <br><br>

                <label>Contact Person Name:</label>
                <br>
                <input type="text" class="form-input" name="contactPerson" value="<?php echo htmlspecialchars($organization->getContact_person_name()) ?>">
                <?php If ($contactPersonError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($contactPersonError) ?></p>
                <?php } ?>
                <br><br>

                <input type="submit" class="form-button" value="Submit">
            </form>
        </div>
    </body>

</html>