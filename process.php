<?php
include_once('CheckUserName.php');
include_once('register.php');
include_once ('GetCountryCode.php');
include_once ('Calendar.php');
// ------------------------------------------------------------------------------
// Assignment 3
// Written by: Thong Minh Tran  -  ID: 40072745
// For SOEN 287 Section Q – Fall 2020
// -----------------------------------------------------------------------------
/**
 * Solving the logic when something hit process.php post button
 */
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    register();
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

<form method="post" action="outcome.php" id="registerForm">
    <div class="container">
        <h4><?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : ''; ?>
            <?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : ''; ?>, Welcome to Google.
            <br><small><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>@gmail.com</small>
        </h4>
        <br>
        <small class="width-100">
            Your Phone Number
        </small>
        <div class="input-group">
            <div class="input-group-prepend">
                <?php
                    $getCountryCode = new GetCountryCode();
                ?>
                <select name="countryCode" style="margin:auto;" required>
                    <option value="null">Please select country code</option>
                    <?php
                        foreach($getCountryCode->countryCodes as $countryCode) {
                    ?>
                        <option value="<?php echo $countryCode; ?>"><?php echo $countryCode ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <input type="text" placeholder="Phone number" name="phoneNumber" required>
            <br>
            <small class="notice">We'll use your number for account security. It won't be visible to others.</small>
        </div>
        <div class="input-group">
            <input type="email" class="width-100" placeholder="Recovery email address" name="recoveryEmailAddress" required>
            <br>
            <small class="notice">We'll use it to keep your account secure.</small>
        </div>
        <br>
        <small class="width-100">
            Your birthday
        </small>
        <?php
        $calendar = new Calendar();
        ?>
        <div class="input-group">
            <div class="input-group-prepend">
                <select name="birthdayMonth" required>
                    <option value="null">Please select your birthday month</option>
                    <?php
                    foreach($calendar->months as $month) {
                        ?>
                        <option value="<?php echo $month; ?>"><?php echo $month ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <select name="birthdayDay" required>
                <option value="null">Please select your birthday day</option>
                <?php
                foreach($calendar->days as $day) {
                    ?>
                    <option value="<?php echo $day; ?>"><?php echo $day ?></option>
                    <?php
                }
                ?>
            </select>
            <select name="birthdayYear" required>
                <option value="null">Please select your birthday year</option>
                <?php
                foreach($calendar->years as $year) {
                    ?>
                    <option value="<?php echo $year; ?>"><?php echo $year ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <br>
        <small class="width-100">
            Your Gender
        </small>
        <select name="gender" required>
           <option value="rather_not_say">Rather not to say</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>
        <button type="submit" class="registerbtn">Submit</button>
        <button type="button" id="backButton" class="button">Go back</button>
        <?php include('errors.php'); ?>
    </div>
</form>
<script>
    var backButton = document.getElementById('backButton');
    backButton.addEventListener("click", function() {
        window.history.back();
    });
</script>
</body>
</html>