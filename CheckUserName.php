<?php
// ------------------------------------------------------------------------------
// Assignment (include number)
// todo fill your name here
// Written by: (include your name (s) and student id(s))
// For SOEN 287 Section (your section) – Fall 2020
//
class CheckUserName
{
    public $username;
    public function __construct($username)
    {
        $this->username = $username;
    }

    public function doesExist()
    {
        // todo: read a file here and validate if $this->username is in the file

        return true;
    }
}