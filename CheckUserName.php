<?php
// ------------------------------------------------------------------------------
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
// -----------------------------------------------------------------------------
include_once ('read-file.php');

class CheckUserName
{
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function doesExist()
    {
        $parseLine = readFileToArray('users.txt');
        for ($i = 0; $i < count($parseLine); $i++) {
            if ($parseLine[$i] != null) {
                if ($this->username == $parseLine[$i])
                    return true;
            }
        }
        return false;
    }

}
