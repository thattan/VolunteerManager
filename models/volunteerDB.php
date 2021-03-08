<?php

class VolunteerDB {

    public static function add_volunteer($volunteer, $orgId) {
        $db = Database::getDB();

        $query = 'INSERT INTO volunteer
                 (fk_organization_id, first_name, last_name, email, phone, created_date)
              VALUES
                 (:orgId, :fName, :lName, :email, :phone, :createdDate)';
        $date = $volunteer->getCreated_Date();
        /* @var $date DateTime */
        $statement = $db->prepare($query);
        $statement->bindValue(':orgId', $orgId);
        $statement->bindValue(':fName', $volunteer->getFirst_name());
        $statement->bindValue(':lName', $volunteer->getLast_name());
        $statement->bindValue(':email', $volunteer->getEmail());
        $statement->bindValue(':phone', $volunteer->getPhone());
        $statement->bindValue(':createdDate', $date->format("Y-m-d H:i:s"));
        $statement->execute();
        $statement->closeCursor();
        
        $volunteerId = $db->lastInsertId();
        return $volunteerId;
    }

    public static function select_unique_volunteer_email($email) {
        $db = Database::getDB();

        $query = 'SELECT * FROM volunteer
                      WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $volunteer = $statement->fetch();
        if ($volunteer > 0) {
            $tempVolunteerEmail = $volunteer['email'];
        } else {
            $tempVolunteerEmail = '';
        }
        $statement->closeCursor();
        return $tempVolunteerEmail;
    }

    public static function update_volunteer($volunteer) {
        $db = Database::getDB();

        $query = 'UPDATE volunteer 
                  SET first_name = :firstName, 
                  last_name = :lastName, 
                  email = :email, 
                  phone = :phone, 
                  created_date = :createdDate
                  WHERE pk_id = :id';
        $date = $volunteer->getCreated_Date();
        /* @var $date DateTime */
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $volunteer->getFirst_name());
        $statement->bindValue(':lastName', $volunteer->getLast_name());
        $statement->bindValue(':email', $volunteer->getEmail());
        $statement->bindValue(':phone', $volunteer->getPhone());
        $statement->bindValue(':createdDate', $date);
        $statement->bindValue(':id', $volunteer->getId());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_volunteer_by_id($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM volunteer WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();

        $volunteer = new Volunteer(
                $results['first_name'],
                $results['last_name'], $results['email'], $results['phone'],
                $results['created_date']);
        $volunteer->setId($results['pk_id']);
        return $volunteer;
    }

    public static function delete_volunteer($id) {
        $db = Database::getDB();
        $query = 'DELETE FROM volunteer
              WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

    
    public static function get_volunteers_by_orgId($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM volunteer WHERE fk_organization_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;

    }
    
    public static function get_volunteers_by_eventId($eventId) {
        $db = Database::getDB();

        $query = 'SELECT ev.fk_volunteer_id, v.pk_id, v.first_name, v.last_name, v.email, v.phone '
                . 'FROM eventvolunteers ev INNER JOIN volunteer v ON ev.fk_volunteer_id = v.pk_id '
                . 'WHERE ev.fk_event_id = :eventId';
        $statement = $db->prepare($query);
        $statement->bindValue(':eventId', $eventId);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    public static function add_volunteer_to_event($volunteerId, $eventId) {
        $db = Database::getDB();

        $query = 'INSERT INTO eventvolunteers
                 (fk_event_id, fk_volunteer_id)
              VALUES
                 (:eventId, :volunteerId)';
        $statement = $db->prepare($query);
        $statement->bindValue(':eventId', $eventId);
        $statement->bindValue(':volunteerId', $volunteerId);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function remove_volunteer_from_event($eventId, $volunteerId) {
        $db = Database::getDB();
        
        $query = 'DELETE FROM eventvolunteers '
                . 'WHERE fk_event_id = :eventId AND fk_volunteer_id = :volunteerId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':eventId', $eventId);
        $statement->bindValue(':volunteerId', $volunteerId);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function delete_volunteer_from_eventvolunteers($volunteerId) {
        $db = Database::getDB();
        
        $query = 'DELETE FROM eventvolunteers '
                . 'WHERE fk_volunteer_id = :volunteerId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':volunteerId', $volunteerId);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function delete_event_from_eventvolunteers($eventId) {
        $db = Database::getDB();
        
        $query = 'DELETE FROM eventvolunteers '
                . 'WHERE fk_event_id = :eventId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':eventId', $eventId);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
