<?php
/**
 * Created by PhpStorm.
 * User: Scott
 * Date: 2/16/2018
 * Time: 2:40 PM
 */

/**
 * Class PremiumMember represents a member of the dating site with premium
 * attributes
 *
 * In addition to the member's first name, last name, age, gender,
 * phone number, email address, state, the gender they're seeking,
 * and their biography, PremiumMembers also store indoor and
 * outdoor interests.
 *
 * @author Scott Medlock
 * @copyright 2018
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;


    /**
     * PremiumMember constructor.
     *
     * @param $fname first name
     * @param $lname last name
     * @param $age age
     * @param $gender gender
     * @param $phone phone number
     * @param $email email address
     * @param $state state
     * @param $seeking seeking male or female
     * @param $bio biography
     * @param $inDoorInterests indoor interests
     * @param $outDoorInterests outdoor interests
     */
    function __construct($fname, $lname, $age, $gender, $phone, $email, $state,
                         $seeking, $bio, $inDoorInterests, $outDoorInterests)
    {
        parent::__construct($fname, $lname, $age, $gender, $phone,
                                    $email, $state, $seeking, $bio);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;
    }

    /**
     * gets the indoor interests of the premium member
     *
     * @return inDoorInterests indoor interests of the premium member
     */
    public function getInDoorInterests() {
        return $this->_inDoorInterests;
    }

    /**
     * sets the indoor interests of the premium member
     *
     * @param $inDoorInterests indoor interests of the premium member
     */
    public function setInDoorInterests($inDoorInterests) {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * gets the outdoor interests of the premium member
     *
     * @return outDoorInterests outdoor interests of the premium member
     */
    public function getOutDoorInterests() {
        return $this->_outDoorInterests;
    }

    /**
     * sets the outdoor interests of the premium member
     *
     * @param $outDoorInterests outdoor interests of the premium member
     */
    public function setOutDoorInterests($outDoorInterests) {
        $this->_outDoorInterests = $outDoorInterests;
    }
}