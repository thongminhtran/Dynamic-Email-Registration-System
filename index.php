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
<?php
session_start();
?>
<form method="post" action="process.php">
    <div class="container">
        <h1>Create your Google Account</h1>
        <input type="text" placeholder="First Name" id="firstName" name="firstName"
               value="<?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : ''; ?>" required>
        <!-- Insert session in the form so if I refresh the page, it will display similar to firstname-->
        <input type="text" placeholder="Last Name" id="lastName" name="lastName"
               value="<?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : ''; ?>" required>

        <div class="input-group">
            <input type="text" placeholder="Username" id="userName" name="username"
                   value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
            <div class="input-group-append">
                <div class="input-group-text">@gmail.com</div>
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
               value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>" required>
        <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword"
               value="<?php echo isset($_SESSION['confirmPassword']) ? $_SESSION['confirmPassword'] : ''; ?>" required>
        <br>
        <small>Use 8 or more characters with a mix of letters, numbers & symbols.</small>
        <br>
        <button type="submit" class="registerbtn">Next</button>
        <?php include('errors.php'); ?>
    </div>
    <div class="container register">
        Already have an account? <a href="#">Sign in instead</a>
    </div>
</form>
</body>
</html>
