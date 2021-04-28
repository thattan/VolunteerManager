<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Job Type</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
        include("./views/nav.php");
    ?>
    <body>
        <div class="wrapper-center">
        <form action="." method="post">
            <input type="hidden" name="action" value="addJobType"></input>
            <h1>Enter Job Type Info</h1>

            <label>Job Name:</label>
            <br>
            <input type="text" class="form-input" name="jobName" value="<?php echo htmlspecialchars($jobType->getJob_Name()) ?>">
            <?php If ($jobNameError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($jobNameError) ?></p>
            <?php } ?>
            <br><br>

            <input type="submit" class="form-button" value="Submit">
        </form>
            </div>
    </body>

</html>