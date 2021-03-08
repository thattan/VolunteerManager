<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Volunteer List</title>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <link href="nav.css" rel="stylesheet" type="text/css" />
</head>
<?php include("./views/nav.php"); ?>
<body >
    <div class="wrapper">
    <form action="." method="post">
        <h1>Manage Volunteers:</h1>
        <input type="hidden" name="action" value="viewAddVolunteer">
        <input type="submit" class="form-button" value="Create New"><br>
        <?php If ($volunteers != null) { ?>
        <h1>Choose Volunteer:</h1>
        
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
                    <td><?php echo htmlspecialchars($volunteer['pk_id'])?></td>
                    <td><?php echo htmlspecialchars($volunteer['first_name'])?></td>
                    <td><?php echo htmlspecialchars($volunteer['last_name'])?></td>
                    <td><?php echo htmlspecialchars($volunteer['email'])?></td>
                    <td><?php echo htmlspecialchars($volunteer['phone']) ?></td>
                    <th><a href="index.php?action=editVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id'])?>">Edit</a> |
                        <a href="index.php?action=viewVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id'])?>">View</a> |
                        <a href="index.php?action=deleteVolunteer&volunteerId=<?php echo htmlspecialchars($volunteer['pk_id'])?>">Delete</a></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php }  else {?>
        <h3>Please add volunteers</h3>
        <?php } ?>
    </form>
        </div>
</body>

</html>