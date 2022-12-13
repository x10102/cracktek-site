<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE HTML>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>uwu</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/usermgmt.css">
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

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

    if($_SERVER['login_disabled'] == 'true') {
        echo '<div id="login-result"> This feature has been disabled by administrator </div>';
        die();
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

    $u_all = $db->query("SELECT username FROM users");
    $no_users = $u_all->num_rows === 0;

    if(!isset($_SESSION["login"]) && !$no_users) {
        echo '<div class="login-result"><h2>Pro přístup k této stránce se musíte přihlásit.</h2></div>';
        die();
    }

    if(!$_SESSION['is_admin'] && !$no_users) {
        echo '<div class="login-result"><h2>CHYBA: Pro přístup k této stránce nemáte dostatečná oprávnění.</h2></div>';
        die();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        echo '<div id="login-result">';

        $name = strtolower($_POST['user']);
        if (empty($name)) {
            echo "Invalid parameters";
            die();
        } else {
            
            if(array_key_exists($name, $users)) {
                unset($users[$name]);
                $users_file = fopen("data/users.json", "w+") or die("Unable to open users file");
                fwrite($users_file, json_encode($users));
                fclose($users_file);
                echo "User $name deleted successfully";
            } else {
                echo "User doesn't exist!";
            }
            
        }

        echo '</div>';

    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo '<form id="loginform" action="/deluser.php" method="post">
            <h1>Odebrat uživatele</h1>
            <select id="userlist" name="user">';
            
        foreach($u_all->fetch_all(MYSQLI_NUM) as $user) {
            echo "<option value=$user[0]>$user[0]</option>";
        }

        echo '<input id="loginbtn" type="submit" value="Odebrat">
            </form>';
    }
    ?>

    
    
</body>
</html>