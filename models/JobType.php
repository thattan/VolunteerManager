<?php
class JobType {
    private $id, $job_name;

    public function __construct($job_name = '') {
        $this->job_name = $job_name;
    }
    function getId() {
        return $this->id;
    }

    function getJob_name() {
        return $this->job_name;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setJob_name($job_name): void {
        $this->job_name = $job_name;
    }

}
?>