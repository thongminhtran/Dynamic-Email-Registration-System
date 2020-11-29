<?php
include_once ('read-file.php');

class GetCountryCode
{
    public $countryCodes;

    public function __construct()
    {
        $this->countryCodes = readFileToArray('country.txt');
    }
}