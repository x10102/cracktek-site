<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CrackTek Industries</title>
        <link rel="stylesheet" href="styles/projects.css">
        <link rel="stylesheet" href="styles/navbar.css">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
        <style>
            :root {
                --text-color: white;
            }
        </style>
    </head>
    <body>
        <div id="navbar">
            <?php require_once("navbar.php");?>    
        </div>
        <h1>Naše Projekty</h1>
        <div class="pr-view-main">
            <a href="projects/m01.php">
                <div class="pr-view-item">
                    <h2>Model//01</h2>
                    <img src="images/model01_web_full.png" height="350">
                    <p>První projekt našich hardwarových laboratoří. Skvělý doplněk na cosplay nebo skrytí identity před policií. UwU zdar.</p>
                </div>
            </a>
            <a href="projects/m02.php">
                <div class="pr-view-item">
                    <h2>Model//02</h2>
                    <img src="images/model02_web_full.png" height="350">
                    <p>George Lucas se má co učit. S láskou vyrobeno ze zbytků zdroje a náhodného kusu plexiskla.</p>
                </div>
            </a>
            <div class="pr-view-item">
                <h2>???</h2>
                <img src="images/nagatoro.jpg" height="350">
                <p>COMING SOON</p>
            </div>
            <div class="pr-view-item">
                <h2>???</h2>
                <img src="images/nagatoro.jpg" height="350">
                <p>COMING SOON</p>
            </div>
        </div>
    </body>
</html>