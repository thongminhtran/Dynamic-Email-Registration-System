<!DOCTYPE html>

<!---------------------------------------------------------------------------------->
<!-- Assignment 3-->
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
<!-- Display the success or error message on this outcome page-->
<!--------------------------------------------------------------------------------->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create your Google Account</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=1">
</head>
<body>
<div class="container">
    <?php
    include_once 'common-functions.php';
    include_once 'process-file.php';
    include_once 'PHPMailerTemplate/mailerTemplate.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Continue to process the data
        $errors = array();

        // Store all additional data in the session in case the file must be reloaded again in process.php

        $countryCode = isset($_POST['countryCode']) ? $_POST['countryCode'] : null;
        setSessionUser('countryCode', $countryCode);
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : null;
        setSessionUser('phoneNumber', $phoneNumber);
        $recoveryEmailAddress = isset($_POST['recoveryEmailAddress']) ? $_POST['recoveryEmailAddress'] : null;
        setSessionUser('recoveryEmailAddress', $recoveryEmailAddress);
        $birthdayMonth = isset($_POST['birthdayMonth']) ? $_POST['birthdayMonth'] : null;
        setSessionUser('birthdayMonth', $birthdayMonth);
        $birthdayDay = isset($_POST['birthdayDay']) ? $_POST['birthdayDay'] : null;
        setSessionUser('birthdayDay', $birthdayDay);
        $birthdayYear = isset($_POST['birthdayYear']) ? $_POST['birthdayYear'] : null;
        setSessionUser('birthdayYear', $birthdayYear);
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        setSessionUser('gender', $gender);
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
        // make sure delete errors first
        unset($_SESSION['errors']);
        if (count($errors) > 0) {
            setSessionErrors($errors);
            error_log("Go back at " . __FILE__ . " line " . __LINE__);
            go('index.php');
        }

        // Reach here means no errors, proceed to write to the users.txt file
        $user = getSessionUser();
        try {
            writeToFile('users.txt', $user->toString());
            sendWelcomeEmail($user);
            ?>
            <div class="alert alert-success">
                User account has been created successfully.
            </div>
            <?php
        } catch (\Exception $e) {
            ?>
            <div class="alert alert-danger">
                <?php
                echo($e->getMessage());
                ?>
            </div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
