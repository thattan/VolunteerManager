<?php

class JobDB {

    public static function add_jobType($jobType, $eventId, $organizationId) {
        $db = Database::getDB();

        $query = 'INSERT INTO jobtype
                 (jobName, eventID, organizationID)
              VALUES
                 (:jobName, :eventID, :organizationID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':jobName', $jobType->getJob_name());
        $statement->bindValue(':eventID', $eventId);
        $statement->bindValue(':organizationID', $organizationId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_jobInstance($jobInstance, $eventID, $jobTypeID) {
        $db = Database::getDB();

        $query = 'INSERT INTO jobinstance
                 (startTime, endTime, jobTypeID, volunteerName, eventID)
              VALUES
                 (:startTime, :endTime, :jobTypeID, :volunteerName, :eventID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':startTime', $jobInstance->getStartTime());
        $statement->bindValue(':endTime', $jobInstance->getEndTime());
        $statement->bindValue(':jobTypeID', $jobTypeID);
        $statement->bindValue(':volunteerName', $jobInstance->getVolunteerName());
        $statement->bindValue(':eventID', $eventID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_job_types_by_eventId($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM jobtype WHERE eventID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        
        $jobTypes = $results;
        
        return $jobTypes;
    }

    public static function get_job_instances_by_eventId($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM jobinstance WHERE eventID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $jobInstances = $results;
        
        return $jobInstances;
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
