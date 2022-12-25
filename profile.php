<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE HTML>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrackTek Industries</title>
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --text-color: white;
        }
    </style>
</head>
<body>

<?php

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['login_disabled'] == 'true') {
        echo '<div id="login-result"> This feature has been disabled by administrator </div>';
        die();
    }

    $users_file = fopen("data/users.json", "r+") or die("Došlo k chybě. Zkuste to prosím znovu později nebo kontaktujte administrátora. (File access error)");
    $users = json_decode(fread($users_file, filesize("data/users.json")), $assoc=true);

    fclose($users_file);

    if($_SERVER['REQUEST_METHOD'] == "GET") {
        if(array_key_exists($_GET['name'], $users)) {
            echo "<h1 id=\"profile-title\">Profil uživatele: ".$_GET['name']."</h1>";
        } else {
            echo "<h1 id=\"profile-title\">Uživatel nebyl nalezen</h1>";
        }
    }

?>

</body>