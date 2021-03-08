<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="wrapper">

        <form action="." method="post">
            <h1>Volunteer Manager</h1>
            <h1>Enter Login Information</h1>
            <input type="hidden" name="action" value="login" />
            <label>Email:</label>
            <input type="text" class="form-input" name="email" value="">
            <?php If ($emailError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($emailError) ?></p>
            <?php } ?>
            <br><br>

            <label>Password:</label>
            <input type="password" class="form-input" name="password" value="">
            <?php If ($passwordError != '') { ?>
                <p class="error"><?php echo htmlspecialchars($passwordError) ?></p>
            <?php } ?>
            <br><br>
            <input type="submit" class="form-button" value="Submit">

            <br><br>
            <p><a class="link" href="index.php?action=viewRegistration">Register</a></p>
    </div>
</body>

</html>