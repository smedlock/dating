<?php
/**
 * Created by PhpStorm.
 * User: Scott
 * Date: 2/16/2018
 * Time: 2:15 PM
 */

/**
 * Class Member represents a member of the dating site
 *
 * This will store a member's first name, last name, age, gender, phone number,
 * email address, state, the gender they're seeking, and their biography.
 *
 * @author Scott Medlock
 * @copyright 2018
 */
class Member
{
    protected $fname;
    protected $lname;
    protected $age;
    protected $gender;
    protected $phone;
    protected $email;
    protected $state;
    protected $seeking;
    protected $bio;

    /**
     * Member constructor.
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
     */
    function __construct($fname, $lname, $age, $gender,$phone,
                                $email, $state, $seeking, $bio)
    {
        $this->setFName($fname);
        $this->setLName($lname);
        $this->age = $age;
        $this->gender = $gender;
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->state = $state;
        $this->seeking = $seeking;
        $this->bio = $bio;
    }

    /**
     * gets the first name of the member
     *
     * @return fname first name of the member
     */
    public function getFName()
    {
        return $this->fname;
    }

    /**
     * sets the first name of the member. The name must contain only letters.
     *
     * @param $fname the first name to update the member to
     */
    public function setFName($fname)
    {
        $regex = '/^[a-z]+$/i';
        if (preg_match($regex, $fname)) {
            $this->fname = $fname;
        } else {
            $this->fname = '';
        }
    }

    /**
     * gets the last name of the member
     *
     * @return lname last name of the member
     */
    public function getLName()
    {
        return $this->lname;
    }

    /**
     * sets the last name of the member. The name must contain only letters.
     *
     * @param $lname the last name to update the member to
     */
    public function setLName($lname)
    {
        $regex = '/^[a-z]+$/i';
        if (preg_match($regex, $lname)) {
            $this->lname = $lname;
        } else {
            $this->lname = '';
        }
    }

    /**
     * gets the age of the member
     *
     * @return age the age of the member
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * sets the age of the member
     *
     * @param $age the new age to update the member to
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * gets the gender of the member
     *
     * @return gender the gender of the member
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * sets the gender of the member
     *
     * @param $gender the gender to update the member to
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * gets the phone number of the member
     *
     * @return phone the phone number of the member
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * sets the phone number of the member. The phone number must be of
     * the format 'xxx-xxx-xxxx'.
     *
     * @param $phone the phone number to update for the member
     */
    public function setPhone($phone)
    {
        $regex = '/^\d{3}-?\d{3}-?\d{4}$/i';
        if (preg_match($regex, $phone)) {
            $this->phone = $phone;
        } else {
            $this->phone = '';
        }
    }

    /**
     * gets the email address of the member
     *
     * @return email the email address of the member
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * sets the email address for the member. The email must be valid.
     * A valid email contains any non-white space characters before '@',
     * then a domain that is alphabetic followed by a single period and
     * 3 more alphabetic characters.
     *
     * @param $email the email address to update for the member
     */
    public function setEmail($email)
    {
        $regex = '/^\S+@[a-z]+.[a-z]{3}$/i';
        if (preg_match($regex, $email)) {
            $this->email = $email;
        } else {
            $this->email = '';
        }
    }

    /**
     * Gets the state the member is from
     *
     * @return state the state the member is from
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * sets the state for the member
     *
     * @param $state the state to update for the member
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * gets the gender that the member is seeking
     *
     * @return seeking the gender that the member is seeking
     */
    public function getSeeking()
    {
        return $this->seeking;
    }

    /**
     * sets the gender that the member is seeking
     *
     * @param $seeking the gender that the member is seeking
     */
    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    /**
     * gets the biography of the member
     *
     * @return bio the biography of this member
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * sets the biography of the member
     *
     * @param $bio the biography to set for the member
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
}