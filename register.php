<?php
/** All our functions as below */
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
// This is solving the register method logic (make the process.php not too long)
include_once ('common-functions.php');
function register()
{
    // Initialize errors
    $errors = array();
// Store all passing data from the form and store in the session
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
    setSessionUser('firstName', $firstName);
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
    setSessionUser('lastName', $lastName);
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    setSessionUser('username', $username);
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    setSessionUser('password', $password);
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
// Default is no checking user id
    $checkId = isset($_POST['checkId']) ? $_POST['checkId'] : '0';
// Now I will validate fields by fields
// Make sure all variables are not empty!
    if (is_null($username) || empty($username)) {
        if ($checkId == '1') {
            $_SESSION['checkUserIDMessage'] = "Username is required";
            error_log(" go back ".__FILE__." line ".__LINE__);
            go('index.php'); // It is a checkID button triggered, so Of course we must go back!
            return;
        } else {
            array_push($errors, 'Username is required');
        }
    }

    if (is_null($firstName) || empty($firstName)) {
        array_push($errors, 'First name is required.');
    }
// Validate other empty fields: lastName, ....

    if (is_null($lastName) || empty($lastName)) {
        array_push($errors, 'Last name is required');
    }
    if (is_null($password) || empty($password)) {
        array_push($errors, 'Password is required');
    }
    if (is_null($confirmPassword) || empty($confirmPassword)) {
        array_push($errors, 'Confirm Password is required');
    }

    if (!is_null($username) && !empty($username)) {
        if (!User::isUsernameValid($username)) {
            error_log('Username is not valid '.$username);
            array_push($errors, "This userID already exists! Please choose another one.");
            $_SESSION['checkUserIDMessage'] = "This userID already exists! Please choose another one.";
        } else {
            error_log('Username is valid '.$username);
            $_SESSION['checkUserIDMessage'] = "This userID is available";
        }
        if ($checkId == '1') {
            // This is the check ID trigger button, of course we must go back
            error_log("Go back ".__FILE__." at line ".__LINE__);
            go('index.php');
            return;
        }
    }

    if ($password !== $confirmPassword) {
        array_push($errors, 'Password and Confirm password do not match!');
    }

//The password must contain at least two uppercase
//characters, 1 lowercase character, 1 special character from {!, @, #, $, %, ^, &},
//1 digit and a minimum length of 8 characters.
// Validate if format of an password is correct here using the variable password
    $passwordValidateMessage = User::checkValidPassword($password);
    if (!is_null($passwordValidateMessage)) {
        array_push($errors, $passwordValidateMessage);
    }

    if (count($errors) > 0) {
        setSessionErrors($errors);
        error_log("Go back ".__FILE__." at line ".__LINE__);
        go('index.php');
        return;
    }
    go('process.php');
}