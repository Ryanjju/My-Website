<?php
session_start();

$privs = ['admin', 'owner'];

// Überprüfen, ob der Benutzer angemeldet und ein Admin ist
if (
    !isset($_SESSION['status'], $_SESSION['loggedin'], $_SESSION['privileges']) ||
    $_SESSION['status'] != 'success' ||
    $_SESSION['loggedin'] != true ||
    $_SESSION['privileges'] != in_array( $_SESSION['privileges'], $privs)
) {
    // Überprüfen, ob der "remember_login"-Cookie existiert und gültig ist
    if (isset($_COOKIE['remember_login']) && $_COOKIE['remember_login'] === 'true') {
        header('Location: /dashboard/');
        exit;
    }

    // Benutzer ist nicht angemeldet oder kein Admin und hat keinen gültigen "remember_login"-Cookie
    header('Location: /error/necessary_priv.php');
    exit;
}

// Überprüfen, ob der "remember_login"-Cookie existiert und gültig ist
if (isset($_COOKIE['remember_login']) && $_COOKIE['remember_login'] === 'true') {
    // Benutzer ist bereits angemeldet und der "remember_login"-Cookie ist gültig
    // Das Dashboard anzeigen
    exit;
}
?>
