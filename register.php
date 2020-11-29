<?php
/** All our functions as below */
include_once ('common-functions.php');
function register()
{
    // Initialize errors
    $errors = array();
// Store all passing data from the form and store in the session
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
    $_SESSION['firstName'] = $firstName;
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
    $_SESSION['lastName'] = $lastName;
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $_SESSION['username'] = $username;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $_SESSION['password'] = $password;
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
    $_SESSION['confirmPassword'] = $confirmPassword;
// Default is no checking user id
    $checkId = isset($_POST['checkId']) ? $_POST['checkId'] : '0';

// Now I will validate fields by fields
// Make sure all variables are not empty!
    if (is_null($username) || empty($username)) {
        if ($checkId == '1') {
            $_SESSION['checkUserIDMessage'] = "Username is required";
            goBack(); // It is a checkID button triggered, so Of course we must go back!
        }
        array_push($errors, 'Username is required');
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
        $checkUserName = new CheckUserName($username);
        if ($checkUserName->doesExist()) {
            array_push($errors, "This userID already exists! Please choose another one.");
            $_SESSION['checkUserIDMessage'] = "This userID already exists! Please choose another one.";
        } else {
            $_SESSION['checkUserIDMessage'] = "This userID is available";
        }
        if ($checkId == '1') {
            // This is the check ID trigger button, of course we must go back
            goBack();
        }
    }
    if ($password !== $confirmPassword) {
        array_push($errors, 'Password and Confirm password do not match!');
    }

//The password must contain at least two uppercase
//characters, 1 lowercase character, 1 special character from {!, @, #, $, %, ^, &},
//1 digit and a minimum length of 8 characters.
// Validate if format of an password is correct here using the variable password
    $passwordValidateMessage = isValidPassword($password);
    if (!is_null($passwordValidateMessage)) {
        array_push($errors, $passwordValidateMessage);
    }
    setSessionErrors($errors);
    goNext('process.php');
}


function isValidPassword($password)
{
    $minimum_length = 8;
    // Check if password has at least 8 characters
    if (strlen($password) < $minimum_length) {
        return 'Password must have at least ' . $minimum_length . ' characters!';
    }
    // Check if password has at least one digit character
    if (!preg_match("#[0-9]+#", $password)) {
        return 'Password must have at least one digit';
    }
    // Check if password has at least one special character from {!, @, #, $, %, ^, &}
    if (!preg_match("/[!@#$%^&]/", $password)) {
        return 'Password must have one special character from {!, @, #, $, %, ^, &}';
    }

    // Check if password has at least one lowercase character
    if (!preg_match("#[a-z]+#", $password)) {
        return 'Password must have at least one lowercase character.';
    }
    // Check if password has at least two uppercase character
    if (!preg_match("/^(?=(?:.*?[A-Z]){2})/", $password)) {
        return 'Password must have at least two uppercase character';
    }
    return null;
}