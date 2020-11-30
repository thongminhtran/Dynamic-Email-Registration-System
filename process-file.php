<?php
/**
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
 * Read file from file name and return a string
 */
function readFileToArray($fileName)
{
    $file = fopen($fileName, "r");
    if (is_null($file)) {
        echo("No ".$fileName." exists! Exit.");
        die();
    }
    $parseLine = [];
    while (!feof($file)) {
       $parseLine[] = fgets($file);
    }
    return $parseLine;
}
function writeToFile($fileName, $line)
{
    file_put_contents($fileName, "\n", FILE_APPEND);
    file_put_contents($fileName, $line, FILE_APPEND);
}