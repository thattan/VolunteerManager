<?php

class AssignmentDB {
    
    public static function add_assignment($assignment, $eventId) {
        $db = Database::getDB();

        $query = 'INSERT INTO assignment
                 (fk_event_id, assignment_name, volunteer_number, created_date)
              VALUES
                 (:eventId, :assignmentName, :volunteerNumber, :createdDate)';
        $statement = $db->prepare($query);
        $statement->bindValue(':eventId', $eventId);
        $statement->bindValue(':assignmentName', $assignment->getAssignment_name());
        $statement->bindValue(':volunteerNumber', $assignment->getVolunteer_number());
        $statement->bindValue(':createdDate', $assignment->getCreated_date());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function update_assignment($assignment) {
        $db = Database::getDB();

        $query = 'UPDATE assignment 
                  SET assignment_name = :assignmentName, 
                  volunteer_number = :volunteerNumber, 
                  created_date = :createdDate
                  WHERE pk_id LIKE :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':assignmentName', $assignment->getAssignment_name());
        $statement->bindValue(':volunteerNumber', $assignment->getVolunteer_number());
        $statement->bindValue(':createdDate', $assignment->getCreated_date());
        $statement->bindValue(':id', $assignment->getId());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_assignment_by_id($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM assignment WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();

        $assignment = new Assignment(
                $results['pk_id'], $results['assignment_name'],
                $results['volunteer_number'], $results['created_date']);

        return $assignment;
    }

    public static function delete_assignment($id) {
        $db = Database::getDB();
        $query = 'DELETE FROM assignment
              WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }
}
