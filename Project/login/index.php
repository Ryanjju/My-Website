<!DOCTYPE html>
<html lang="de">
<script>
    // if safari want to aks if password should be saved repress this message
    $(document).ready(function () {
        $('input[type=password]').attr('autocomplete', 'new-password');
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryan</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/hamburger.js"></script>
</head>

<body>
    <?php include '../head.php'; ?>

    <!-- Login -->
    <?php
    session_start();
    require 'db_connection.php';
    require 'login_query.php';
    ?>

    <main class="main">
        <div class="container">
            <div class="login">
                <h1 class="login__title">Anmelden</h1>
                <!-- login with fingerprint -->
                <form id="login-form" class="login__form" method="POST">
                    <input type="text" name="username" placeholder="Benutzername" class="modern-textinput" required>
                    <input type="password" name="password" placeholder="Passwort" class="modern-textinput" required>
                    <button type="submit" class="modern-button">Anmelden</button>

                    <button type="submit" class="modern-button" onclick="location.href = 'fingerprint.php';">Mit
                        Fingerabdruck anmelden</button>
                </form>
                <?php if (isset($error_message)): ?>
                <p style="color: red; font-size: 14px;">
                    <?php echo $error_message; ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include '../footer.php' ?>
</body>

</html>