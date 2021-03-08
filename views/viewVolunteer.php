<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Volunteer Information</title>
    <link href="nav.css" rel="stylesheet" type="text/css" />
    <link href="main.css" rel="stylesheet" type="text/css" />
</head>
    <?php
        include("./views/nav.php");
    ?>
<body>
    <div class="wrapper-center">
        <form action="." method="post">
            <input type="hidden" name="action" value="editVolunteer"></input>
            <input type="hidden" name="volunteerId" value="<?php echo htmlspecialchars($volunteer->getId());?>"></input>
            <h1>Volunteer Information</h1>
            <label>Volunteer Id: <?php echo htmlspecialchars($volunteer->getId())?></label>
            <br><br>
            <label>First Name: <?php echo htmlspecialchars($volunteer->getFirst_name())?></label>
            <br><br>
            <label>Last Name: <?php echo htmlspecialchars($volunteer->getLast_name()) ?></label>
            <br><br>
            <label>Email Address: <?php echo htmlspecialchars($volunteer->getEmail()) ?></label>
            <br><br>
            <label>Phone Number: <?php echo htmlspecialchars($volunteer->getPhone()) ?></label>
            <br><br>
            <label>Created Date: <?php echo htmlspecialchars($volunteer->getCreated_date()) ?></label>
            <br><input type="submit" style="margin-top: 2%;" class="form-button" value="Edit">
        </form>
    </div>
</body>

</html>