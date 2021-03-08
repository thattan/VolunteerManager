<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Organization Information</title>
    <link href="nav.css" rel="stylesheet" type="text/css" />
    <link href="main.css" rel="stylesheet" type="text/css" />
</head>
    <?php
        include("./views/nav.php");
    ?>
<body>
    <div class="wrapper-center">
        <form action="." method="post">
            <input type="hidden" name="action" value="editOrganization"></input>
            <h1>Organization Information</h1>

            <label>Organization Name: <?php echo htmlspecialchars($organization->getOrganization_name())?></label>
            <br><br>
            <label>Email Address: <?php echo htmlspecialchars($organization->getEmail()) ?></label>
            <br><br>
            <label>Phone Number: <?php echo htmlspecialchars($organization->getPhone()) ?></label>
            <br><br>
            <label>Contact Person Name: <?php echo htmlspecialchars($organization->getContact_person_name()) ?></label>
            <br><br>
            <label>Created Date: <?php echo htmlspecialchars($organization->getCreated_date()) ?></label>
            <br><input type="submit" style="margin-top: 2%;" class="form-button" value="Edit">
        </form>
    </div>
</body>

</html>