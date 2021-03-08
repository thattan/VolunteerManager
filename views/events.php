<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Event Information</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="nav.css" rel="stylesheet" type="text/css" />
</head>
<?php include("./views/nav.php"); ?>
<body >
    <div class="wrapper">
    <form action="." method="post">
        <h1>Manage Events:</h1>
        <input type="hidden" name="action" value="viewAddEvent">
        <input type="submit" class="form-button" value="Create New"><br>
        <?php If ($events != null) { ?>
        <h1>Choose Event:</h1>
        
        <table class="content-table">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Created Date</th>
                    <th>Volunteers Needed</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($event['pk_id'])?></td>
                    <td><?php echo htmlspecialchars($event['event_name'])?></td>
                    <td><?php echo htmlspecialchars($event['event_date'])?></td>
                    <td><?php echo htmlspecialchars($event['created_date'])?></td>
                    <td><?php echo htmlspecialchars($event['volunteers_needed']) ?></td>
                    <th><a href="index.php?action=editEvent&eventId=<?php echo htmlspecialchars($event['pk_id']);?>">Edit</a> |
                        <a href="index.php?action=viewEvent&eventId=<?php echo htmlspecialchars($event['pk_id']);?>">View</a> |
                        <a href="index.php?action=deleteEvent&eventId=<?php echo htmlspecialchars($event['pk_id']);?>">Delete</a></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php }  else {?>
        <h3>Please create an event</h3>
        <?php } ?>
        <br>
    </form>
        </div>
</body>

</html>