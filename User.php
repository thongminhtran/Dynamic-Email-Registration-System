<?php
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
// This class is grouping all information about the user, so it will be easily accessible
include_once ('process-file.php');
define("DELIMITER", " ");
define("MINIMUM_LENGTH", 8);
define("MINIMUM_LENGTH_ERROR", "Password must have at least " .MINIMUM_LENGTH. " characters!");
define("AT_LEAST_ONE_DIGIT", "Password must have at least one digit");
define("AT_LEAST_SPECIAL_CHAR", "Password must have one special character from {!, @, #, $, %, ^, &}");
define("AT_LEAST_LOWERCASE_CHAR", "Password must have at least one lowercase character.");
define("AT_LEAST_TWO_UPPER_CHARS", "Password must have at least two uppercase character");
class User
{
    public $firstName;
    public $lastName;
    public $username;
    public $password;
    public $countryCode;
    public $phoneNumber;
    public $recoveryEmailAddress;
    public $birthdayMonth;
    public $birthdayDay;
    public $birthdayYear;
    public $gender;
    public static function isUsernameValid($username)
    {
        $parseLines = readFileToArray('users.txt');
        foreach($parseLines as $parseLine) {
            error_log("parseLine ".$parseLine);
            $pieces = explode(DELIMITER, $parseLine);
            error_log("pieces ". json_encode($pieces));
            // userID = $pieces[0]
            if ($username == $pieces[0]) {
                return false;
            }
        }

        return true;
    }
    public static function checkValidPassword($password)
    {
        // Check if password has at least 8 characters
        if (strlen($password) < MINIMUM_LENGTH) {
            return MINIMUM_LENGTH_ERROR;
        }
        // Check if password has at least one digit character
        if (!preg_match("#[0-9]+#", $password)) {
            return AT_LEAST_ONE_DIGIT;
        }
        // Check if password has at least one special character from {!, @, #, $, %, ^, &}
        if (!preg_match("/[!@#$%^&]/", $password)) {
            return AT_LEAST_SPECIAL_CHAR;
        }

        // Check if password has at least one lowercase character
        if (!preg_match("#[a-z]+#", $password)) {
            return AT_LEAST_LOWERCASE_CHAR;
        }
        // Check if password has at least two uppercase character
        if (!preg_match("/^(?=(?:.*?[A-Z]){2})/", $password)) {
            return AT_LEAST_TWO_UPPER_CHARS;
        }
        return null;
    }
    /**
     * This is to parse an object user to a string, so I can write it to users.txt later
     */
    public function toString()
    {
        return $this->username." "
            .$this->firstName." "
            .$this->lastName." "
            .$this->password." "
            // because I read from country.txt, sometimes it reads \n or \r which are special chars.
            . trim(preg_replace('/\s\s+/', ' ',$this->countryCode))." "
            .$this->phoneNumber." "
            .$this->recoveryEmailAddress." "
            .$this->birthdayMonth." "
            .$this->birthdayDay." "
            .$this->birthdayYear." "
            .$this->gender;
    }
}