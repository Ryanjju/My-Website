<?php
    // try to delete all session variables
    try {
        session_destroy();
    }
    catch (Exception $e) {
        // do nothing
    }

    session_start();
    session_destroy();
    setcookie('remember_login', '', time() - 3600, '/'); // deactivate remember_login cookie
    header('Location: /login/'); // redirect to login page
    exit;
?>
