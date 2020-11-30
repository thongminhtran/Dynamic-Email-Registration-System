<?php
/**
 * Assignment 3
<!-- Written by: Thong Minh Tran  -  ID: 40072745-->
<!-- For SOEN 287 Section Q – Fall 2020-->
 * This class is to use common functions where will be accessed by multiple classes, and where we don't know it is belonged to.
 */
include_once "User.php";
function go($file) {
    error_log('Go function with file '.$file);
    header('Location: /' .$file);
}
function setSessionErrors($errors) {
    $errorMessage = '';
    foreach ($errors as $error) {
        $errorMessage .= $errorMessage == '' ? $error : "<br>" . $error;
    }
    error_log("errors ".$errorMessage);
    $_SESSION['errors'] = $errorMessage;
    error_log($_SESSION['errors']);
}
function setSessionUser($key, $value) {
    $user = isset($_SESSION['user']) ? $_SESSION['user']: new User();
    $user->$key = $value;
    $_SESSION['user'] = $user;
}
function getSessionUser() {
    return isset($_SESSION['user']) ? $_SESSION['user']: new User();
}