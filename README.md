<div>

# Readme

</div>


## 1. Vorwort

Hier in diesem Repository ist mein Projekt für eine Webseite. Die
Webseite ist für ein fiktives Unternehmen namens \"Saver Energy,\"
welches auch ursprünglich eine Idee für meinen Businessplan war und
PV-Anlagen verkaufen sollte. Das Projekt nutze ich, um mich
auszuprobieren, neue Ideen umzusetzen und eventuell auch mal als Vorlage
für eine spätere eigene Firma.

## 2. Technische Umsetzung


### 2.1. Vorbereitung

Um die Webseite im vollen Umfang ausführen zu können, habe ich diese
Programme benutzt:

-   Visual Studio Code (macOS) - zum Programmieren
-   XAMPP (macOS) - zum Hosten einer Datenbank auf dem LocalHost
-   Safari (macOS) - oder ein anderer beliebiger Browser
-   Sequel Pro (macOS) - zum Verwalten der Datenbank

Zum Bauen der Webseite habe ich folgende Sprachen benutzt:

-   HTML
-   CSS
-   PHP
-   JavaScript

### 2.2. Installation

Installation von Sequel Pro:

-   Download Sequel Pro - Webseite [hier](https://www.sequelpro.com/)
-   Installieren von Sequel Pro - den Anweisungen auf dem Bildschirm
    folgen

Installation von XAMPP:

-   Download XAMPP - Webseite
    [hier](https://www.apachefriends.org/de/index.html)
-   Installieren von XAMPP - den Anweisungen auf dem Bildschirm folgen

Installation von Visual Studio Code:

-   Download Visual Studio Code - Webseite
    [hier](https://code.visualstudio.com/)
-   Installieren von Visual Studio Code - den Anweisungen auf dem
    Bildschirm folgen

### 2.3. Setup

Setup von Visual Studio Code:

-   (Öffnen von Visual Studio Code)
-   Auf Erweiterungen klicken (`⌘` + `Shift` + `X` oder `Strg` +
    `Shift` + `X`)
-   PHP Extension Pack installieren

Setup Datenbank

-   Öffenen von XAMPP → Starten von Apache und MySQL
-   Öffnen von Sequel Pro → Verbinden mit der Datenbank
    -   Host: LocalHost (`127.0.0.1`)
    -   Username: root
    -   Password: (leer lassen)
-   Importieren der Datenbank
    -   Öffnen der Datenbank
    -   Auf **Importieren** klicken
    -   Die Datei **database.sql** auswählen
    -   Auf **Ausführen** klicken



## 3. Code - Erklärung

Die Webseite ist wie folgt aufgebaut:

Ordner Anzeigen

```tree
root/
├── accounts/
|   ├── accounts/
|   |   ├── index.php
|   |
|   ├── index.php
|
├── css/
|   ├── style.css
|   ├── hamburger.css
|   ├── pannels.css
|
├── dashboard/
|   ├── index.php
|
├── error/
|   ├── neccerary_priv.php
|
├── js/
|   ├── cookies.js
|   ├── hamburger.js
|
├── login/
|   ├── db_connection.php
|   ├── index.php
|   ├── login_query.php
|
├── logout/
|   ├── index.php (Im nachhinein betrachtet nicht schlau)
|
├── admin_check.php
|
├── favicon.ico
|
├── footer.php
|
├── head_main.php
|
├── head.php
|
├── index.php
|
└── README.me 
```

Wie man erkennen kann, wurde ein eigener ordner für jeden SubFolder
erstellt, eigendlich ganz normal. **Index.php** wird genutzt, dass man
nur die URL des Ordners eingaben muss und nicht inde.php hinterschreiben
muss.

```php
<header class="header">
    <div class="container">
        <div id="menu-toggle" class="hamburger">
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
        </div>
        <div class="header__logo">
            <a href="/" class="logo__link">Saver Energy</a>
        </div>
        <nav id="menu-nav" class="header__nav">
            <a href="/" class="nav__link">Home</a>
            <a href="#" class="nav__link">Über uns</a>
            <a href="#" class="nav__link">Kontakt</a>
            <?php
            // check if user is logged in 
            if (isset($_SESSION['status'], $_SESSION['loggedin']) && $_SESSION['status'] === 'success' && $_SESSION['loggedin'] === true) {
                // user is logged in 
                echo "<a href='/logout/' class='nav__link'>Logout</a>";
                echo "<a href='/dashboard/' class='nav__link'>Dashboard</a>";
            } else {
                // user is not logged in 
                echo "<a href='/login/' class='nav__link'>Login</a>";
            }
            ?>
        </nav>
    </div>
</header>
```

Dies ist die **head.php** Datei. Ich habe mich dazu entschlossen die
head.php Datei zu erstellen, da ich sonst in jeder Datei den selben Code
hätte. Dies ist nicht nur unübersichtlich, sondern auch nicht gut für
die Wartbarkeit. In der head.php Datei ist der Code für den Header, die
Navigation und die Verlinkungen. In der **head_main.php** Datei ist der
Code für den Header, die Navigation und die Verlinkungen.  Das gleiche
Prinzip ist auch in der **footer.php** Datei, wo der Code für den Footer
ist, und bei der **admin_check.php** Datei wo der Code für die
Überprüfung des Benutzerstatus ist.


**head_main.php**

```php
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/pannels.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/hamburger.js"/></script>
```

**footer.php**

```php
<footer class="footer">
    <div class="container">
        <nav class="nav--footer">
            <a href="#" rel="noopener noreferrer" class="nav__link">Impressum</a>
            <a href="#" rel="noopener noreferrer" class="nav__link">Datenschutz</a>
            <a href="#" rel="noopener noreferrer" class="nav__link">Cookies</a>
        </nav>
        <p class="footer__text">© 2023 Ryan Junge. Alle Rechte vorbehalten.</p>
    </div>
</footer>
```

**admin_check.php**

```php
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
```

## 4. Die Webseite

Die Webseite präsentiert sich in ihrer Grundstruktur als eine einfache,
aber dennoch effektive Plattform, die speziell für nicht technisch versierte Benutzer
interessant sein dürfte. Hier sind die Schlüsselmerkmale und
Funktionalitäten:

-   **Übersichtliche Struktur:** Die Webseite verfügt über eine
    übersichtliche Startseite, auf der die Anwender schnell die
    benötigten Informationen finden können.
-   **Einheitliches Design:** Sowohl der Header als auch der Footer sind
    auf allen Seiten einheitlich gestaltet. Dies erleichtert die
    Navigation und sorgt für Konsistenz im gesamten Webangebot.
-   **Mobile Optimierung:** Die Webseite wurde größtenteils für die
    mobile Ansicht optimiert, was besonders praktisch ist, wenn
    ein User unterwegs ist oder sein Handy benutzt und auf die Informationen zugreifen
    möchten.
-   **Sicherer Login:** Die Login-Funktion ist robust gegenüber
    Sicherheitsbedrohungen wie SQL-Injections geschützt, was für
    Informatiker von hoher Bedeutung ist, um sensible Daten zu schützen.
-   **Automatischer Login mit Cookie:** User können sich auf der
    Webseite über einen Cookie automatisch einloggen, wenn sie sich
    zuvor mit diesem angemeldet haben. Das spart Zeit und erleichtert
    den Zugang.
-   **Administrationsoberfläche:** Das Dashboard fungiert als
    Administrationsoberfläche, die Administratoren erweiterte
    Kontrollmöglichkeiten bietet. Hier können sie eine Liste aller
    Benutzer anzeigen lassen und detaillierte Informationenu zu einzelnen
    Benutzern abrufen.
-   **Zugangsbeschränkung für Admins:** Der Zugriff auf die
    Administrationsoberfläche ist durch ein standardisiertes
    Überprüfungsskript gesichert und steht nur Administratoren zur
    Verfügung.

