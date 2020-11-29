<?php
include_once 'common-functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Continue to process the data
    $errors = array();

    // Store all additional data in the session in case the file must be reloaded again in process.php

    $countryCode = isset($_POST['countryCode']) ? $_POST['countryCode']: null;
    $_SESSION['countryCode'] = $countryCode;

    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber']: null;
    $_SESSION['phoneNumber'] = $phoneNumber;

    $recoveryEmailAddress = isset($_POST['recoveryEmailAddress']) ? $_POST['recoveryEmailAddress'] : null;
    $_SESSION['recoveryEmailAddress'] = $recoveryEmailAddress;

    $birthdayMonth = isset($_POST['birthdayMonth']) ? $_POST['birthdayMonth']: null;
    $_SESSION['birthdayMonth'] = $birthdayMonth;

    $birthdayDay = isset($_POST['birthdayDay']) ? $_POST['birthdayDay']: null;
    $_SESSION['birthdayDay'] = $birthdayDay;

    $birthdayYear = isset($_POST['birthdayYear']) ? $_POST['birthdayYear']: null;
    $_SESSION['birthdayYear'] = $birthdayYear;

    $gender = isset($_POST['gender']) ? $_POST['gender']: null;
    $_SESSION['gender'] = $gender;

    // Now I will validate to make sure all fields are not empty!

    if (is_null($countryCode) || empty($countryCode)) {
        array_push($errors, 'Country Code is required.');
    }
    if (is_null($phoneNumber) || empty($phoneNumber)) {
        array_push($errors, 'Phone Number is required.');
    }
    if (is_null($recoveryEmailAddress) || empty($recoveryEmailAddress)) {
        array_push($errors, 'Recovery Email Address is required.');
    }
    if (is_null($birthdayMonth) || empty($birthdayMonth)) {
        array_push($errors, 'Birthday month is required.');
    }
    if (is_null($birthdayYear) || empty($birthdayYear)) {
        array_push($errors, 'Birthday year is required.');
    }
    if (is_null($birthdayDay) || empty($birthdayDay)) {
        array_push($errors, 'Birthday day is required.');
    }
    if (is_null($gender) || empty($gender)) {
        array_push($errors, 'Gender is required.');
    }

    setSessionErrors($errors);
    // Reach here means no errors, proceed to write to the users.txt file

}
?>
<!DOCTYPE html>

<!---------------------------------------------------------------------------------->
<!-- Assignment 3-->
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
<!--------------------------------------------------------------------------------->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create your Google Account</title>
    <link rel="stylesheet" type="text/css" href="register.css?v=1">
</head>
<body>
<h4>
    <?php echo isset($_SESSION['outcomeMessage']) ? $_SESSION['outcomeMessage'] : ''; ?>
</h4>
</body>
</html>
