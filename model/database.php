<?php
/**
 * Created by PhpStorm.
 * User: Scott
 * Date: 3/2/2018
 * Time: 8:59 AM
 */

/*
sql statement for creating Members table

CREATE TABLE Members (
    member_id int NOT NULL AUTO_INCREMENT,
    fname varchar(30) NOT NULL,
    lname varchar(40) NOT NULL,
    age tinyint NOT NULL,
    gender varchar(10),
    phone varchar(20) NOT NULL,
    email varchar(60),
    state varchar(30),
    seeking varchar(10),
    bio varchar(2000),
    premium tinyint NOT NULL,
    image varchar(100),
    interests varchar(500),
    PRIMARY KEY (member_id)
);
 */

/**
 * Class Database is stores a database connection to the Members table
 *
 * This will add rows to the table and also get all of the rows.
 *
 * @author Scott Medlock
 * @copyright 2018
 */
class Database
{

    private $cnxn; // PDO object

    /**
     * Database constructor.
     */
    function __construct()
    {
        try {
            //Instantiate a database object
            $this->cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Adds a row to the members table. Returns the added row.
     *
     * @param $fname first name
     * @param $lname last name
     * @param $age age
     * @param $gender gender
     * @param $phone phone
     * @param $email email
     * @param $state state
     * @param $seeking gender seeking
     * @param $bio biography
     * @param $premium premium
     * @param $image profile picture
     * @param $interests member interests
     * @return array returns the added row
     */
    public function addRow($fname, $lname, $age, $gender, $phone, $email, $state,
                                    $seeking, $bio, $premium, $image, $interests)
    {
        //1. define the query
        $sql = "INSERT INTO Members (fname, lname, age, gender, phone, email, state,
                                            seeking, bio, premium, image, interests)
                VALUES (:fname, :lname, :age, :gender, :phone, :email, :state,
                        :seeking, :bio, :premium, :image, :interests)";

        //2. prepare the statement
        $statement = $this->cnxn->prepare($sql);

        //3. bind parameters
        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_INT);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }

    /**
     * Retrieves the entire Members table.
     *
     * @return array the members table
     */
    public function selectStar() {
        //1. define the query
        $sql = "SELECT * FROM Members ORDER BY lname";

        //2. prepare the statement
        $statement = $this->cnxn->prepare($sql);

        //3. bind parameters

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //print_r($result);
        return $result;
    }
}