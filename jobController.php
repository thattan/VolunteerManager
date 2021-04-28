<?php

$action = filter_input(INPUT_GET, 'action');
if ($action == null) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == null) {
        $action = 'viewJobs';
    }
}

switch ($action) {
    case 'viewJobs':
        include '../VolunteerManager/views/viewJobs.php';
        die();
        break;
}

?>