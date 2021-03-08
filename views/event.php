<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Event Information</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
        include("./views/nav.php");
    ?>
    <body>
        <div class="wrapper-center">
        <form action="." method="post">
            <input type="hidden" name="action" value="addEvent"></input>
            <h1>Enter Event Information</h1>

            <label>Event Name:</label>
            <br>
            <input type="text" class="form-input" name="eventName" value="<?php echo htmlspecialchars($event->getEvent_name()) ?>">
            <?php If ($eventNameError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($eventNameError) ?></p>
            <?php } ?>
            <br><br>
            <label>Event Date: (Ex: 2020-01-01 08:30:00)</label>
            <br>
            <input type="text" class="form-input" name="eventDate" value="<?php echo htmlspecialchars($event->getEvent_date()) ?>">
            <?php If ($eventDateError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($eventDateError) ?></p>
            <?php } ?>
            <br><br>
            <label>Volunteers Needed:</label>
            <br>
            <input type="text" class="form-input" name="volunteersNeeded" value="<?php echo htmlspecialchars($event->getVolunteers_needed()) ?>">
            <?php If ($volunteersNeededError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($volunteersNeededError) ?></p>
            <?php } ?>
            <br><br>

            <input type="submit" class="form-button" value="Submit">
        </form>
            </div>
    </body>

</html>