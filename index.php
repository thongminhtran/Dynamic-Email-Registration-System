<!DOCTYPE html>

<!---------------------------------------------------------------------------------->
<!-- Assignment 3-->
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
<!-- This is the first page if we run the server: php -S localhost:1111-->
<!--------------------------------------------------------------------------------->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create your Google Account</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=1">
</head>
<body>
<?php
include_once ('common-functions.php');
session_start();
$user = getSessionUser();
?>
<form method="post" action="process.php" id="registerForm">
    <div class="container">
        <h1>Create your Google Account</h1>
        <?php if (isset($_SESSION['errors'])) { ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors'];
            ?>
        </div>
        <?php
        }
        ?>
        <input type="text" placeholder="First Name" id="firstName" name="firstName"
               value="<?php echo !is_null($user->firstName) ? $user->firstName: ''; ?>" required>

        <input type="text" placeholder="Last Name" id="lastName" name="lastName"
               value="<?php echo !is_null($user->lastName) ? $user->lastName: ''; ?>" required>

        <div class="input-group">
            <input type="text" placeholder="Username" id="userName" name="username"
                   value="<?php echo !is_null($user->username) ? $user->username: '';?>" required>
            <div class="input-group-append">
                <div class="input-group-text">@gmail.com</div>
                <input type="hidden" id="checkIdValue" name="checkId" value="0">
                <button type="button" id="checkId">Check ID</button>
            </div>
        </div>

        <?php
        if (isset($_SESSION['checkUserIDMessage'])) {
            ?>
            <small class="error">
                <?php
                echo $_SESSION['checkUserIDMessage'];
                ?>
            </small>
            <?php
            unset($_SESSION['checkUserIDMessage']);
        }
        ?>
        <small>You can use letters, numbers & periods.</small>
        <br>

        <input type="password" placeholder="Password" id="password" name="password"
               value="<?php echo !is_null($user->password) ? $user->password: ''; ?>" required>

        <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required>
        <br>
        <small>Use 8 or more characters with a mix of letters, numbers & symbols.</small>
        <br>
        <button type="submit" class="registerbtn">Next</button>
    </div>
    <div class="container register">
        Already have an account? <a href="#">Sign in instead</a>
    </div>
</form>
<script>
    var registerForm = document.getElementById('registerForm');
    var checkIdInput = document.getElementById('checkIdValue');
    var checkIdButton = document.getElementById('checkId');
    checkIdButton.addEventListener("click", function() {
       // CheckID button is clicked.
        checkIdInput.setAttribute('value', '1');
        registerForm.submit();
    });
</script>
</body>
</html>
