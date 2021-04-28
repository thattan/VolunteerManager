<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Job Instance</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    include("./views/nav.php");
    ?>
    <body>
        <div class="wrapper-center">
            <form action="." method="post">
                <input type="hidden" name="action" value="addJobInstance"></input>
                <input type="hidden" name="jobTypeID" value="<?php echo htmlspecialchars($jobTypeID)?>"></input>            
                <h1>Enter Job Instance Info</h1>

                <label>Volunteer Name:</label>
                <br>
                <input type="text" class="form-input" name="volunteerName" value="<?php echo htmlspecialchars($jobInstance->getVolunteerName()) ?>">
                <?php If ($volunteerNameError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($volunteerNameError) ?></p>
                <?php } ?>
                <br><br>

                <label>Start Time:</label>
                <br>
                <input type="text" class="form-input" name="startTime" value="<?php echo htmlspecialchars($jobInstance->getStartTime()) ?>">
                <?php If ($startTimeError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($startTimeError) ?></p>
                <?php } ?>
                <br><br>

                <label>End Time:</label>
                <br>
                <input type="text" class="form-input" name="endTime" value="<?php echo htmlspecialchars($jobInstance->getEndTime()) ?>">
                <?php If ($endTimeError != '') { ?>
                    <p class="error"><?php echo htmlspecialchars($endTimeError) ?></p>
                <?php } ?>
                <br><br>

                <input type="submit" class="form-button" value="Submit">
            </form>
        </div>
    </body>

</html>