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
        <div class="wrapper">
            <div class="left">
                <form action="." method="post">
                    <h1><?php echo htmlspecialchars($event->getEvent_name()) ?></h1>
                    <br>
                    <label>Event Date: <?php echo htmlspecialchars($event->getEvent_date()) ?></label><br><br>
                    <label>Volunteers Needed: <?php echo htmlspecialchars($event->getVolunteers_needed()) ?></label><br><br>
                    <label>Created Date: <?php echo htmlspecialchars($event->getCreated_date()) ?></label><br>
                </form>
            </div>
            <div class="right">
                <div class="left">
                    <h2>Volunteers:</h2>
                </div>
                <div class="right">
                    <div class="left" style="margin-top: 2%;">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="firstVolunteerSearch">
                            <input type="submit" class="form-button-duo" value="Add Volunteer">
                        </form>
                    </div>
                    <div class="right">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="viewAssignments">
                            <input type="submit" class="form-button-duo" value="Add Assignment">
                        </form>   
                    </div>
                </div>
                <br>
                <?php If ($volunteers != null) { ?>
                    <h1>Choose Volunteer:</h1>
                    <br>
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
                                    <th><a href="index.php?action=editVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id']) ?>">Edit</a> |
                                        <a href="index.php?action=viewVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id']) ?>">View</a> |
                                        <a href="index.php?action=removeVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id']) ?>">Remove</a></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h3>Please add volunteers</h3>
                <?php } ?>
            </div>
        </div>
    </body>

</html>