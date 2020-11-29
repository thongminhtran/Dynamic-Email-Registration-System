<?php
function goNext($file) {
    header('Location: /' .$file);
}
function goBack(){
    header('Location: /');
}
function setSessionErrors($errors) {
    if (count($errors) > 0) {
        $errorMessage = '';
        foreach ($errors as $error) {
            $errorMessage .= $errorMessage == '' ? $error : "<br>" . $error;
        }
        $_SESSION['errors'] = $errorMessage;
        goBack();
    }
}