<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobInstance
 *
 * @author tyler
 */
class JobInstance {

    private $id, $startTime, $endTime, $volunteerName;

    public function __construct($startTime = '', $endTime = '', $volunteerName = '') {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->volunteerName = $volunteerName;
    }

    function getVolunteerName() {
        return $this->volunteerName;
    }

    function setVolunteerName($volunteerName): void {
        $this->volunteerName = $volunteerName;
    }

    function getId() {
        return $this->id;
    }

    function getStartTime() {
        return $this->startTime;
    }

    function getEndTime() {
        return $this->endTime;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setStartTime($startTime): void {
        $this->startTime = $startTime;
    }

    function setEndTime($endTime): void {
        $this->endTime = $endTime;
    }

}
