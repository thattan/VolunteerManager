<?php
class Event {
    private $id, $event_name, $event_date, $created_date, 
            $volunteers_needed;

    public function __construct($event_name = '', $event_date = '', $created_date = '', $volunteers_needed = '') {
        $this->event_name = $event_name;
        $this->event_date = $event_date;
        $this->created_date = $created_date;
        $this->volunteers_needed = $volunteers_needed;
    }
    function getId() {
        return $this->id;
    }

    function getEvent_name() {
        return $this->event_name;
    }

    function getEvent_date() {
        return $this->event_date;
    }

    function getCreated_date() {
        return $this->created_date;
    }

    function getVolunteers_needed() {
        return $this->volunteers_needed;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setEvent_name($event_name): void {
        $this->event_name = $event_name;
    }

    function setEvent_date($event_date): void {
        $this->event_date = $event_date;
    }

    function setCreated_date($created_date): void {
        $this->created_date = $created_date;
    }

    function setVolunteers_needed($volunteers_needed): void {
        $this->volunteers_needed = $volunteers_needed;
    }



}
?>