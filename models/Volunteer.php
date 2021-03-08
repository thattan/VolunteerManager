<?php
class Volunteer {
    private $id, $first_name, $last_name, $email, $phone,   
            $created_date;

    public function __construct($first_name = '', $last_name = '', $email = '', $phone = '', $created_date = '') {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->created_date = $created_date;
    }

    function getId() {
        return $this->id;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getCreated_date() {
        return $this->created_date;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setFirst_name($first_name): void {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name): void {
        $this->last_name = $last_name;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPhone($phone): void {
        $this->phone = $phone;
    }

    function setCreated_date($created_date): void {
        $this->created_date = $created_date;
    } 

}
?>