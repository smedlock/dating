<?php
/**
 * Created by PhpStorm.
 * User: Scott
 * Date: 2/16/2018
 * Time: 2:40 PM
 */

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $inDoorInterests, $outDoorInterests)
    {
        parent::__construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;
    }

    public function getInDoorInterests() {
        return $this->_inDoorInterests;
    }

    public function setInDoorInterests($inDoorInterests) {
        $this->_inDoorInterests = $inDoorInterests;
    }

    public function getOutDoorInterests() {
        return $this->_outDoorInterests;
    }

    public function setOutDoorInterests($outDoorInterests) {
        $this->_outDoorInterests = $outDoorInterests;
    }
}