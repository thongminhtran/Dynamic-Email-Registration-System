<?php
/**
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