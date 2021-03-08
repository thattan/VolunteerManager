<?php
class Organization {
    private $id, $organization_name, $email, $phone, $password, 
            $created_date, $contact_person_name;

    public function __construct($organization_name = '', $email = '', $phone = '', $password = '', $created_date = '', $contact_person_name = '') {
        $this->organization_name = $organization_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->created_date = $created_date;
        $this->contact_person_name = $contact_person_name;
    }

    function getId() {
        return $this->id;
    }

    function getOrganization_name() {
        return $this->organization_name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getPassword() {
        return $this->password;
    }

    function getCreated_date() {
        return $this->created_date;
    }

    function getContact_person_name() {
        return $this->contact_person_name;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setOrganization_name($organization_name): void {
        $this->organization_name = $organization_name;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPhone($phone): void {
        $this->phone = $phone;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setCreated_date($created_date): void {
        $this->created_date = $created_date;
    }

    function setContact_person_name($contact_person_name): void {
        $this->contact_person_name = $contact_person_name;
    }


    

}
?>