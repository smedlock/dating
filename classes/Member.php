<?php
/**
 * Created by PhpStorm.
 * User: Scott
 * Date: 2/16/2018
 * Time: 2:15 PM
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
    protected $seeking
    protected $bio

    function __construct($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
        $this->state = $state;
        $this->seeking = $seeking;
        $this->bio = $bio;
    }

    public function getFName()
    {
        return $this->fname;
    }

    public function setFName($fname)
    {
        $this->fname = $fname;
    }

    public function getLName()
    {
        return $this->lname;
    }

    public function setLName($lname)
    {
        $this->lname = $lname;
    }

    public function getAge()
    {
        return $this->Age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getSeeking()
    {
        return $this->seeking;
    }

    public function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }
}