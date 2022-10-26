<!DOCTYPE HTML>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>uwu</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/usermgmt.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --text-color: white;
        }
    </style>
</head>
<body>

<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['login_disabled'] == 'true') {
        echo '<div id="login-result"> This feature has been disabled by administrator </div>';
    } 

    $hostname = $_SERVER['dbhost'];
    $database = $_SERVER['dbschema'];
    $db_user = $_SERVER['dbuser'];
    $db_pass = $_SERVER['dbpasswd'];

    $db = mysqli_connect($hostname, $db_user, $db_pass, $database);
    if($db === false) {
        echo "Error connecting to database: ".mysqli_connect_error();
        die();
    }

    // Allow access without permissions if there are no user accounts yet

    $u_all = $db->query("SELECT * FROM users");
    $no_users = $u_all->num_rows === 0;

    if(!isset($_SESSION["login"]) && !$no_users) {
        echo '<div class="login-result"><h2>Pro přístup k této stránce se musíte přihlásit.</h2></div>';
        die();
    }

    if(!$_SESSION['is_admin'] && !$no_users) {
        echo '<div class="login-result"><h2>CHYBA: Pro přístup k této stránce nemáte dostatečná oprávnění.</h2></div>';
        die();
    }


    if($_SERVER['REQUEST_METHOD'] == "GET") {
        echo '
<h1 id="title">Správa Uživatelů</h1>
<table id="usrtable">
    <tr id="heading">
        <th></th>
        <th>ID</th>
        <th>Jméno</th>
        <th>Oprávnění</th>
    </tr>';

    $users = $u_all->fetch_all(MYSQLI_ASSOC);
    foreach($users as $user) {
        $id = $user['ID'];
        $chb_name = "chb".$id;
        $username = $user['username'];
        $perms = $user['admin'] == 1 ? "Administrátor" : "Uživatel"; 
        echo "<tr>
            <td><input type=\"checkbox\" name=\"$chb_name\"></input></td><td>$id</td><td>$username</td><td>$perms</td></tr>";
    }

        echo '</table>';
    }

?>

</body>
</html>