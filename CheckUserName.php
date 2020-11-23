<?php
// ------------------------------------------------------------------------------
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
// -----------------------------------------------------------------------------


class CheckUserName
{
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function doesExist()
    {
        // todo: read a file here and validate if $this->username is in the file (finished)
        $users_data = $this->readFile();
        $string = preg_replace('/\s+/', '', $users_data);
        $parseLine = explode("<br/>", $string);
        for ($i = 0; $i < count($parseLine); $i++) {
            if ($parseLine[$i] != null) {
                if ($this->username == $parseLine[$i])
                    return true;
            }
        }
        return false;
    }

    public function readFile()
    {
        $file = fopen("users.txt", "r");
        $users_data = "";
        while (!feof($file)) {
            $users_data .= fgets($file) . "<br/>";
        }
        fclose($file);
        return $users_data;
    }
}
