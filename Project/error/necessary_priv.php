<?php
session_start();

// check if user is already logged in
if (isset($_SESSION['status']) && $_SESSION['status'] === 'success' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // check if "remember_login" cookie exists
    if (isset($_COOKIE['remember_login'])) {
        if ($_COOKIE['remember_login'] === 'true') {
            header('Location: /dashboard/');
            exit;
        }
    }
    // user is already logged in and "remember_login" cookie is not set, show home page
    // Note: you may want to redirect to a different page if the user is already logged in but the cookie is not set
    // to prevent potential security risks
} else {
    // check if "remember_login" cookie exists
    if (isset($_COOKIE['remember_login'])) {
        if ($_COOKIE['remember_login'] === 'true') {
            header('Location: /error/dashboard.php');
            exit;
        } else {
            header('Location: /login/');
            exit;
        }
    } else {
        // user is not logged in and no "remember_login" cookie exists, show home page
    }
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMV GymLap</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/hamburger.js"></script>
</head>

<body>
    <?php include '../head.php';?>

    <main class="main">
        <div class="container">
            <h1 class="main__title" style="text-align: center">Error 403</h1>
            <p style="text-align: center;">You do not have the necessary privileges to access this page.</p>
        </div>
    </main>

    <?php include '../footer.php' ?>
</body>

</html>
