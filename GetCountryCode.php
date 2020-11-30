<?php
/**
<!-- Assignment 3 -->
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
 * This class is to use common functions where will be accessed by multiple classes, and where we don't know it is belonged to.
 * In order to display country with code for phone number, I download the country.txt from the Internet,
 * read it from the file and display as an array
 */
include_once('process-file.php');
class GetCountryCode
{
    public $countryCodes;

    public function __construct()
    {
        $this->countryCodes = readFileToArray('country.txt');
    }
}