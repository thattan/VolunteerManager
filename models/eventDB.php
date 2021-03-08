<?php

class EventDB {

    public static function add_event($event, $orgId) {
        $db = Database::getDB();

        $query = 'INSERT INTO event
                 (fk_organization_id, event_name, event_date, created_date, volunteers_needed)
              VALUES
                 (:orgId, :eventName, :eventDate, :createdDate, :volunteersNeeded)';
        $date1 = $event->getEvent_date();
        $date2 = $event->getCreated_date();
        /* @var $date1 DateTime */
        /* @var $date2 DateTime */
        
        $statement = $db->prepare($query);
        $statement->bindValue(':orgId', $orgId);
        $statement->bindValue(':eventName', $event->getEvent_name());
        $statement->bindValue(':eventDate', $date1->format("Y-m-d H:i:s"));
        $statement->bindValue(':createdDate', $date2->format("Y-m-d H:i:s"));
        $statement->bindValue(':volunteersNeeded', $event->getVolunteers_needed());
        $statement->execute();
        $statement->closeCursor();
        
        $eventId = $db->lastInsertId();
        return $eventId;
    }

    public static function update_event($event, $orgId) {
        $db = Database::getDB();

        $query = 'UPDATE event 
                  SET fk_organization_id = :orgId, 
                  event_name = :eventName, 
                  event_date = :eventDate, 
                  created_date = :createdDate, 
                  volunteers_needed = :volunteersNeeded
                  WHERE pk_id = :id';
        $date1 = $event->getEvent_date();
        $date2 = $event->getCreated_date();
        /* @var $date1 DateTime */
        /* @var $date2 DateTime */
        $statement = $db->prepare($query);
        $statement->bindValue(':orgId', $orgId);
        $statement->bindValue(':eventName', $event->getEvent_name());
        $statement->bindValue(':eventDate', $date1->format("Y-m-d H:i:s"));
        $statement->bindValue(':createdDate', $date2);
        $statement->bindValue(':volunteersNeeded', $event->getVolunteers_needed());
        $statement->bindValue(':id', $event->getId());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_event_by_id($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM event WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();

        $event = new Event(
                $results['event_name'], $results['event_date'],
                $results['created_date'], $results['volunteers_needed']);
        $event->setId($results['pk_id']);
        return $event;
    }

    public static function get_events_by_organization($orgId) {
        $db = Database::getDB();
        
        $query = 'SELECT * FROM event WHERE fk_organization_id = :orgId';
        $statement = $db->prepare($query);
        $statement->bindValue(':orgId', $orgId);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    public static function delete_event($id) {
        $db = Database::getDB();
        $query = 'DELETE FROM event '
             . 'WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

}
