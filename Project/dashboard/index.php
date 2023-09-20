<?php include '../admin_check.php' ?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMV GymLap</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/pannels.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/hamburger.js"></script>
</head>

<body>
    <?php include '../head.php';?>

    <main class="main">
        <!-- Include Bootstrap CSS -->

        <div class="container" style="--font-color: #000;">
            <div class="grid-box">
                <a href="/accounts/" class="panelLink">
                    <div class="panel" draggable="false">Benutzerkonten</div>
                </a>
                <div class="panel" draggable="false">Panel 2</div>
                <div class="panel" draggable="false">Panel 3</div>
                <div class="panel" draggable="false">Panel 4</div>
                <div class="panel" draggable="false">Panel 5</div>
                <div class="panel" draggable="false">Panel 6</div>
                <div class="panel" draggable="false">Panel 7</div>
            </div>
        </div>
    </main>

    <?php include '../footer.php' ?>
</body>

</html>
