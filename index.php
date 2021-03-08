<?php

// Volunteer Manager

require_once 'models/Organization.php';
require_once 'models/organizationDB.php';
require_once 'models/eventDB.php';
require_once 'models/Event.php';
require_once 'models/database.php';
require_once 'models/volunteerDB.php';
require_once 'models/Volunteer.php';

session_start();
date_default_timezone_set('America/Chicago');

$action = filter_input(INPUT_GET, 'action');
if ($action == null) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == null) {
        $action = 'initialLogin';
    }
}

function validateDate($date)
{
    $format = 'Y-m-d H:i:s';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
    // from https://stackoverflow.com/questions/14504913/verify-valid-date-using-phps-datetime-class
}

switch ($action) {
    case 'initialLogin':
        $_SESSION['organization'] = '';
        $email = '';
        $password = '';
        $emailError = '';
        $passwordError = '';
        include './views/login.php';
        die();
        break;
    
    case 'login':
        $_SESSION['organization'] = '';
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $emailError = '';
        $passwordError = '';
        $error = FALSE;
        $organization = null;
        $existingEmail = '';
        if ($email === '') {
            $emailError = 'You must enter an email address.';
            $error = TRUE;
        }

        if ($password == '' && $_SESSION['organization'] == '') {
            $passwordError = 'You must enter a password.';
            $error = TRUE;
        }

        if ($email != '') {
            $existingEmail = OrganizationDB::select_unique_org_email($email);
        }

        if ($existingEmail != '') {
            $organization = OrganizationDB::get_organization_by_email($email);
            $oldPassword = $organization->getPassword();
            $isPassword = password_verify($password, $oldPassword);
            
            if ($isPassword == FALSE) {
                $error = TRUE;
                $emailError= "Email or Password is incorrect";
            } 

            if ($error == FALSE) {
                $_SESSION['organization'] = $organization;
                include './views/viewOrganization.php';
            } else {
                $emailError = "Cannot be found";
                include './views/login.php';
            }
        } else {
            $emailError= "Email or Password is incorrect";
            include './views/login.php';
        }
        die();
        break;

    case 'viewRegistration':
        $organizationNameError = '';
        $emailError = '';
        $phoneError = '';
        $contactPersonError = '';
        $passwordError = '';
        $isRegister = TRUE;
        $organization = New Organization();
        include './views/organization.php';
        die();
        break;

    case 'addOrganization':
        $organizationName = '';
        $email = '';
        $phone = '';
        $contactPerson = '';
        $organizationNameError = '';
        $emailError = '';
        $phoneError = '';
        $contactPersonError = '';
        $passwordError = '';
        $password = '';
        $error = FALSE;
        $organizationName = filter_input(INPUT_POST, 'organizationName');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $contactPerson = filter_input(INPUT_POST, 'contactPerson');
        $password = filter_input(INPUT_POST, 'password');

        If ($organizationName != '') {
            
        } else {
            $organizationNameError = 'Organization Name cannot be empty';
            $error = TRUE;
        }

        If ($email != '') {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Must be a valid email';
                $error = TRUE;
            }
        } else {
            $emailError = 'Email cannot be empty';
            $error = TRUE;
        }

        If ($password != '') {
            if ($_SESSION['organization'] == '') {
                if (!preg_match('/[A-Z]/', $password)) {
                    $errorMessagePassword = 'Password must have uppercase letter';
                    $errorBoolean = FALSE;
                }
                if (!preg_match('/[a-z]/', $password)) {
                    $passwordError = 'Password must have a lowercase letter';
                    $errorBoolean = FALSE;
                }

                if (!preg_match('/[0-9]/', $password)) {
                    $passwordError = 'Password must have a number';
                    $errorBoolean = FALSE;
                }

                if (!preg_match('/(?=.*[[:punct:]])/', $password)) {
                    $passwordError = 'Password must have punctuation';
                    $errorBoolean = FALSE;
                }
                if (strlen(trim($password)) < 9) {
                    $passwordError = 'Password must be at least 9 characters long';
                    $errorBoolean = FALSE;
                }
            }
        } else {
            if ($_SESSION['organization'] == '') {
                $passwordError = 'Password cannot be empty';
                $error = TRUE;
            }
        }

        If ($phone != '') {
            if (strlen(trim($phone)) != 10) {
                $phoneError = "Phone number must be 10 digits";
                $error = TRUE;
            } else if (!is_numeric($phone)) {
                $phoneError = "Phone number must be 10 numbers";
                $error = TRUE;
            }
        } else {
            $phoneError = 'Phone Number cannot be empty';
            $error = TRUE;
        }

        If ($contactPerson != '') {
            
        } else {
            $contactPersonError = 'Contact Person cannot be empty';
            $error = TRUE;
        }

        If ($email != '') {
            $tempEmail = OrganizationDB::select_unique_org_email($email);
            if ($tempEmail != '') {
                if ($_SESSION['organization'] != '') {
                    $oldOrganization = $_SESSION['organization'];
                    $oldEmail = $oldOrganization->getEmail();
                    if ($oldEmail != $email) {
                        $error = TRUE;
                        $emailError = 'This email is already in use';
                    }
                } else {
                    $error = TRUE;
                    $emailError = 'This email is already in use';
                }
            }
        }
        
        If ($error == FALSE && $_SESSION['organization'] == '') {
            $isRegister = FALSE;
            $created_date = New DateTime();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $organization = New Organization($organizationName, $email, $phone,
                    $passwordHash, $created_date, $contactPerson);
            $orgId = OrganizationDB::add_organization($organization);
            $organization->setId($orgId);
            $organization = OrganizationDB::get_organization_by_id($orgId);
            $_SESSION['organization'] = $organization;
            include './views/viewOrganization.php';
        } else if ($error == FALSE && $_SESSION['organization'] != '') {
            $oldOrganization = $_SESSION['organization'];
            $organization = New Organization($organizationName, $email, $phone,
                    $oldOrganization->getPassword(), $oldOrganization->getCreated_date(), $contactPerson);
            $organization->setId($oldOrganization->getId());
            OrganizationDB::update_organization($organization); 
            $organization = OrganizationDB::get_organization_by_id($organization->getId());
            $_SESSION['organization'] = $organization;
            include './views/viewOrganization.php';
        } else {
            $organization = New Organization($organizationName, $email, $phone,
                $password, '', $contactPerson);
            $isRegister = TRUE;
            include './views/organization.php';
        }
        die();
        break;
        
    case 'editOrganization':
        $organizationNameError = '';
        $emailError = '';
        $phoneError = '';
        $contactPersonError = '';
        $passwordError = '';
        $isRegister = FALSE;
        $organization = $_SESSION['organization'];
        include './views/organization.php';
        die();
        break;
    
    case 'viewOrganization':
        $organization = $_SESSION['organization'];
        $_SESSION['event'] = '';
        $_SESSION['volunteer'] = '';
        include './views/viewOrganization.php';
        die();
        break;
    
    case 'viewEvents':
        $_SESSION['event'] = '';
        $organization = $_SESSION['organization'];
        $events = EventDB::get_events_by_organization($organization->getId());
        include './views/events.php';
        die();
        break;

    case 'viewAddEvent':
        $event = New Event();
        $eventNameError = '';
        $eventDateError = '';
        $volunteersNeededError = '';
        include './views/event.php';
        die();
        break;

    case 'editEvent':
        $eventId = filter_input(INPUT_GET, 'eventId');
        $event = EventDB::get_event_by_id($eventId);
        $eventNameError = '';
        $eventDateError = '';
        $volunteersNeededError = '';
        $_SESSION['event'] = $event;
        include './views/event.php';
        die();
        break;

    case 'addEvent':
        $eventName = filter_input(INPUT_POST, 'eventName');
        $eventDate = filter_input(INPUT_POST, 'eventDate');
        $volunteersNeeded = filter_input(INPUT_POST, 'volunteersNeeded');
        $eventNameError = '';
        $eventDateError = '';
        $volunteersNeededError = '';
        $error = FALSE;

        if ($eventName != '') {
            
        } else {
            $eventNameError = "Event name cannot be empty";
            $error = TRUE;
        }

        if ($eventDate != '') {
            $validDate = validateDate($eventDate);
            if ($validDate == FALSE) {
                $error = TRUE;
                $eventDateError = "Date must be valid and in (Y-m-d H:i:s) format";
            }
        } else {
            $eventDateError = "Event date cannot be empty";
            $error = TRUE;
        }
        if ($volunteersNeeded != '') {
            
        } else {
            $volunteersNeededError = "Volunteers needed cannot be empty";
            $error = TRUE;
        }

        if ($error == FALSE && $_SESSION['event'] == '') {
            $createdDate = New DateTime();
            $eventDate = New DateTime($eventDate);
            $organization = $_SESSION['organization'];
            $orgId = $organization->getId();
            $event = New Event($eventName, $eventDate, $createdDate, $volunteersNeeded);
            $eventId = EventDB::add_event($event, $orgId);
            $event = EventDB::get_event_by_id($eventId);
            $_SESSION['event'] = $event;
            $volunteers = null;
            include './views/viewEvent.php';
        } else if ($error == FALSE && $_SESSION['event'] != '') {
            $organization = $_SESSION['organization'];
            $oldEvent = $_SESSION['event'];
            $orgId = $organization->getId();
            $eventDate = New DateTime($eventDate);
            $event = New Event($eventName, $eventDate, $oldEvent->getCreated_date(), $volunteersNeeded);
            $event->setId($oldEvent->getId());
            EventDB::update_event($event, $orgId);
            $event = EventDB::get_event_by_id($event->getId());
            $_SESSION['event'] = $event;
            $volunteers = VolunteerDB::get_volunteers_by_eventId($event->getId());
            include './views/viewEvent.php';
        }else {
            $event = New Event($eventName, $eventDate, '', $volunteersNeeded);
            include './views/event.php';
        }
        die();
        break;

    case 'viewVolunteers':
        $organization = $_SESSION['organization'];
        $_SESSION['volunteer'] = '';
        $orgId = $organization->getId();
        $volunteers = VolunteerDB::get_volunteers_by_orgId($orgId);
        include './views/volunteers.php';
        die();
        break;

    case 'viewAddVolunteer':
        $volunteer = New Volunteer();
        $firstNameError = '';
        $lastNameError = '';
        $emailError = '';
        $phoneError = '';
        $_SESSION['volunteer'] = '';
        include './views/volunteer.php';
        die();
        break;

    case 'addVolunteer':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $firstNameError = '';
        $lastNameError = '';
        $emailError = '';
        $phoneError = '';
        $error = FALSE;
        if ($firstName != '') {
            
        } else {
            $firstNameError = "First name cannot be empty";
            $error = TRUE;
        }

        if ($lastName != '') {
            
        } else {
            $lastNameError = "Last name cannot be empty";
            $error = TRUE;
        }

        if ($email != '') {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Must be a valid email';
                $error = TRUE;
            }
        } else {
            $emailError = "Email cannot be empty";
            $error = TRUE;
        }

        if ($phone != '') {
            if (strlen(trim($phone)) != 10) {
                $phoneError = "Phone number must be 10 digits";
                $error = TRUE;
            } else if (!is_numeric($phone)) {
                $phoneError = "Phone number must be 10 numbers";
                $error = TRUE;
            }
        } else {
            $phoneError = "Phone number cannot be empty";
            $error = TRUE;
        }
        
        if ($error == FALSE && $_SESSION['volunteer'] == '') {
            $createdDate = New DateTime();
            $volunteer = New Volunteer($firstName, $lastName, $email, $phone, $createdDate);
            $organization = $_SESSION['organization'];
            $orgId = $organization->getId();
            $volunteerId = VolunteerDB::add_volunteer($volunteer, $orgId);
            $volunteer->setId($volunteerId);
            $volunteers = VolunteerDB::get_volunteers_by_orgId($orgId);
            include './views/volunteers.php';
        } else if ($error == FALSE && $_SESSION['volunteer'] != '') {
            $oldVolunteer = $_SESSION['volunteer'];
            $volunteer = New Volunteer($firstName, $lastName, $email, $phone, $oldVolunteer->getCreated_date());
            $volunteer->setId($oldVolunteer->getId());
            $organization = $_SESSION['organization'];
            $orgId = $organization->getId();
            VolunteerDB::update_volunteer($volunteer);
            $volunteers = VolunteerDB::get_volunteers_by_orgId($orgId);
            include './views/volunteers.php';
        } else {
            $volunteer = New Volunteer($firstName, $lastName, $email, $phone, '');
            include './views/volunteer.php';
        }
        die();
        break;

    case 'firstVolunteerSearch':
        $organization = $_SESSION['organization'];
        $event = $_SESSION['event'];
        $orgId = $organization->getId();
        $volunteers = VolunteerDB::get_volunteers_by_orgId($orgId);
        $searchString = "";
        include './views/addVolunteers.php';
        die();
        break;
    
    case 'addVolunteerToEvent':
        $event = $_SESSION['event'];
        $eventId = $event->getId();
        $volunteerId = filter_input(INPUT_GET, 'volunteerId');
        VolunteerDB::add_volunteer_to_event($volunteerId, $eventId);
        $volunteers = VolunteerDB::get_volunteers_by_eventId($eventId);
        include './views/viewEvent.php';
        die();
        break;
    
    case 'viewEvent':
        $eventId = filter_input(INPUT_GET, 'eventId');
        $event = EventDB::get_event_by_id($eventId);
        $_SESSION['event'] = $event;
        $volunteers = VolunteerDB::get_volunteers_by_eventId($event->getId());
        include './views/viewEvent.php';
        die();
        break;      
    
    case 'editVolunteer':
        $firstNameError = '';
        $lastNameError = '';
        $emailError = '';
        $phoneError = '';
        $volunteerId = filter_input(INPUT_GET, 'volunteerId');
        if ($volunteerId == '') {
            $volunteerId = filter_input(INPUT_POST, 'volunteerId');
        }
        $volunteer = VolunteerDB::get_volunteer_by_id($volunteerId);
        $_SESSION['volunteer'] = $volunteer;
        include './views/volunteer.php';
        die();
        break;        
        
    case 'viewVolunteer':
        $volunteerId = filter_input(INPUT_GET, 'volunteerId');
        $volunteer = VolunteerDB::get_volunteer_by_id($volunteerId);
        $_SESSION['volunteer'] = $volunteer;
        include './views/viewVolunteer.php';
        die();
        break;
    
    case 'deleteVolunteer':
        $volunteerId = filter_input(INPUT_GET, 'volunteerId');
        $organization = $_SESSION['organization'];
        VolunteerDB::delete_volunteer_from_eventvolunteers($volunteerId);
        VolunteerDB::delete_volunteer($volunteerId);
        $volunteers = VolunteerDB::get_volunteers_by_orgId($organization->getId());
        include './views/volunteers.php';
        die();
        break;
    
    case 'deleteEvent':
        $eventId = filter_input(INPUT_GET, 'eventId');
        $organization = $_SESSION['organization'];
        VolunteerDB::delete_event_from_eventvolunteers($eventId);
        EventDB::delete_event($eventId);
        $events = EventDB::get_events_by_organization($organization->getId());
        include './views/events.php';
        die();
        break;
    
    case 'removeVolunteer':
        $event = $_SESSION['event'];
        $volunteerId = filter_input(INPUT_GET, 'volunteerId');
        VolunteerDB::remove_volunteer_from_event($event->getId(), $volunteerId);
        $volunteers = VolunteerDB::get_volunteers_by_eventId($event->getId());
        include './views/viewEvent.php';
        die();
        break;
    
    case 'logout':
        $_SESSION['organization'] = '';
        $_SESSION['event'] = '';
        $emailError = '';
        $passwordError = '';
        include './views/login.php';
        die();
        break;
}
?>