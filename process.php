<?php
include_once ('CheckUserName.php');
// ------------------------------------------------------------------------------
// Assignment (include number)
// todo fill your name here
// Written by: (include your name (s) and student id(s))
// For SOEN 287 Section (your section) – Fall 2020
// -----------------------------------------------------------------------------

session_start();
// Initialize errors
$errors = array();
// Get all values from register form
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
$username = isset($_POST['username']) ? $_POST['username']: null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;

// Now I will validate fields by fields
if (empty($firstName)) {array_push($errors, 'First name is required.');}
// todo: Continue to validate other empty fields: lastName, ....

if (!is_null($username)) {
    $checkUserName = new CheckUserName($username);
    if (!$checkUserName->check()) {
        array_push($errors, "This userID already exists!");
    } else {
        $_SESSION['checkUserIDMessage'] = "This userID is available";
    }
}
if ($password !== $confirmPassword) {array_push($errors, 'Password and Confirm password do not match!');}

//The password must contain at least two uppercase
//characters, 1 lowercase character, 1 special character from {!, @, #, $, %, ^, &},
//1 digit and a minimum length of 8 characters.
// todo: validate if format of an password is correct here using the variable password

if (count($errors) > 0) {
    $errorMessage = '';
    foreach($errors as $error) {
        $errorMessage .= $errorMessage == '' ? $error : "<br>".$error;
    }
    $_SESSION['errors'] = $errorMessage;
     header('Location: index.php');
}

?>
