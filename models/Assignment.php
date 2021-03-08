<?php
class Assignment {
    private $id, $assignment_name, $volunteer_number,    
            $created_date;

    public function __construct($id, $assignment_name, $volunteer_number, $created_date) {
        $this->id = $id;
        $this->assignment_name = $assignment_name;
        $this->volunteer_number = $volunteer_number;
        $this->created_date = $created_date;

    }

    function getId() {
        return $this->id;
    }

    function getAssignment_name() {
        return $this->assignment_name;
    }

    function getVolunteer_number() {
        return $this->volunteer_number;
    }

    function getCreated_date() {
        return $this->created_date;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setAssignment_name($assignment_name): void {
        $this->assignment_name = $assignment_name;
    }

    function setVolunteer_number($volunteer_number): void {
        $this->volunteer_number = $volunteer_number;
    }

    function setCreated_date($created_date): void {
        $this->created_date = $created_date;
    }


}
?>