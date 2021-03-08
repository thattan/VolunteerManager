<?php

class OrganizationDB {

    public static function add_organization($organization) {
        $db = Database::getDB();

        $query = 'INSERT INTO organization
                 (organization_name, email, phone, password, created_date, contact_person_name)
              VALUES
                 (:orgName, :email, :phone, :password, :created_date, :contactName)';
        $date = $organization->getCreated_date();
        /* @var $date DateTime */
        $statement = $db->prepare($query);
        $statement->bindValue(':orgName', $organization->getOrganization_name());
        $statement->bindValue(':email', $organization->getEmail());
        $statement->bindValue(':phone', $organization->getPhone());
        $statement->bindValue(':password', $organization->getPassword());
        $statement->bindValue(':created_date', $date->format("Y-m-d H:i:s"));
        $statement->bindValue(':contactName', $organization->getContact_person_name());
        $statement->execute();
        $statement->closeCursor();
        
        $orgId = $db->lastInsertId();
        return $orgId;
    }

    public static function select_unique_org_email($email) {
        $db = Database::getDB();

        $queryUser = 'SELECT * FROM organization
                      WHERE email = :email';
        $statement = $db->prepare($queryUser);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $org = $statement->fetch();
        if ($org > 0) {
            $tempOrgEmail = $org['email'];
        } else {
            $tempOrgEmail = '';
        }
        $statement->closeCursor();
        return $tempOrgEmail;
    }

    public static function update_organization($organization) {
        $db = Database::getDB();

        $query = 'UPDATE organization 
                  SET organization_name = :organizationName, 
                  email = :email, 
                  phone = :phone, 
                  password = :password, 
                  created_date = :createdDate,
                  contact_person_name = :contactName
                  WHERE pk_id LIKE :id';
        $date = $organization->getCreated_date();
        /* @var $date DateTime */
        $statement = $db->prepare($query);
        $statement->bindValue(':organizationName', $organization->getOrganization_name());
        $statement->bindValue(':email', $organization->getEmail());
        $statement->bindValue(':phone', $organization->getPhone());
        $statement->bindValue(':password', $organization->getPassword());
        $statement->bindValue(':createdDate', $date);
        $statement->bindValue(':contactName', $organization->getContact_person_name());
        $statement->bindValue(':id', $organization->getId());
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_organization_by_id($id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM organization WHERE pk_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();

        $organization = new Organization(
                $results['organization_name'], $results['email'],
                $results['phone'], $results['password'], $results['created_date'],
                $results['contact_person_name']);
        $organization->setId($results['pk_id']);
        return $organization;
    }

        public static function get_organization_by_email($email) {
        $db = Database::getDB();

        $query = 'SELECT * FROM organization WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();

        $organization = new Organization(
                $results['organization_name'], $results['email'],
                $results['phone'], $results['password'], $results['created_date'],
                $results['contact_person_name']);
        $organization->setId($results['pk_id']);
        return $organization;
    }
    
}
