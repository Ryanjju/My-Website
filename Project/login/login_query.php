<?php
// Überprüfen, ob das Anmeldeformular gesendet wurde
if (isset($_POST['username']) && isset($_POST['password'])) {

    // Sanitize user input
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Versuchen, den Benutzer in der Datenbank zu finden
    try {
        // Verwenden Sie ein vorbereitetes Statement mit Platzhaltern, um SQL-Injection-Angriffe zu verhindern
        $stmt = $connection->prepare("SELECT * FROM $table WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        // the password is test and the hash is $2y$10$YCFsXZ0Z1h8X9Z1Z9Q
        // if it would be checked with the password_verify function it would return true

        if ($result->num_rows > 0) {
            // Benutzer gefunden, Passwort überprüfen
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {  // the hash of test is $2y$10$YCFsXZ0Z1h8X9Z1Z9Q
                // Passwort stimmt überein, Session-Variablen setzen
                $_SESSION['username'] = $username;
                $_SESSION['status'] = 'success';
                $_SESSION['privileges'] = $row['privileges'];
                $_SESSION['loggedin'] = true;

                // Setzen eines Cookies zur Erinnerung an die Anmeldung
                if (isset($_POST['remember_login']) && $_POST['remember_login'] === 'true') {
                    setcookie('remember_login', true, time() + (86400 * 30), '/'); // Cookie läuft nach 30 Tagen ab
                }

                // Zur Dashboard-Seite weiterleiten
                header('Location: /dashboard/');
                exit;
            } else {
                // Passwort stimmt nicht überein, Fehlermeldung anzeigen
                $error_message = 'Benutzername oder Passwort ungültig!';
            }
        } else {
            // Benutzer nicht gefunden, Fehlermeldung anzeigen
            $error_message = 'Benutzername oder Passwort ungültig!';
        }
    } catch (Exception $e) {
        // Fehlermeldung anzeigen
        $error_message = 'Benutzername oder Passwort ungültig!';
    }
}
?>
