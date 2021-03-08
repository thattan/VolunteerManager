<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Event Information</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
    </head>
    <?php include("./views/nav.php"); ?>
    <body>
        <div class="wrapper">
            <form action="." method="post">
                <h1>Add Volunteer To <?php echo htmlspecialchars($event->getEvent_name())?>:</h1><br>
                <input type="hidden" name="action" value="searchVolunteers">
                <?php If ($volunteers != null) { ?>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Volunteer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($volunteers as $volunteer) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($volunteer['pk_id']) ?></td>
                                    <td><?php echo htmlspecialchars($volunteer['first_name']) ?></td>
                                    <td><?php echo htmlspecialchars($volunteer['last_name']) ?></td>
                                    <td><?php echo htmlspecialchars($volunteer['email']) ?></td>
                                    <td><?php echo htmlspecialchars($volunteer['phone']) ?></td>
                                    <th><a href="index.php?action=addVolunteerToEvent&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id']); ?>">Add</a></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h3>Please add volunteers</h3>
                <?php } ?>
            </form>
        </div>
    </body>

</html>