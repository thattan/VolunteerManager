<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>View Jobs</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="nav.css" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    </head>
    <?php include("./views/nav.php"); ?>
    <body>
        <div class="wrapper">
            <form action="." method="post">
                <input type="hidden" name="action" value="viewAddJobType"></input>
                <input type="submit" class="form-button" value="Add Job Type"></input>
                <br>
                <h3>Job Names:</h3>
                <?php if ($jobTypes != null) { ?>
                    <?php foreach ($jobTypes as $jt) : ?>
                        <div class="jobtype">
                            <p class="jobname"><?php echo htmlspecialchars($jt['jobName']) ?></p>
                            <a class="plus" href="index.php?action=viewAddJobInstance&jobTypeID=<?php echo htmlspecialchars($jt['pk_id']) ?>">ADD</a>
                            <!--    
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-plus-circle plus" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            -->
                        </div>

                        <?php if ($jobInstances != null) { ?>

                            <div class="jobinstance">
                                <table class="instance-table">

                                    <?php
                                    $count = 0;
                                    foreach ($jobInstances as $ji) :

                                        if ($ji['jobTypeID'] == $jt['pk_id']) {
                                            ?>
                                            <?php if ($count == 0) { ?>
                                                <tr>
                                                    <th>Volunteer Name</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($ji['volunteerName'])
                                            ?></td>
                                                <td><?php echo htmlspecialchars($ji['startTime']) ?></td>
                                                <td><?php echo htmlspecialchars($ji['endTime']) ?></td>
                                            </tr>
                                        <?php } ?>   
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                <?php } ?>
            </form>
        </div>
    </body>

</html>