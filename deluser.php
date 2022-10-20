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

    session_start();

    if(!isset($_SESSION["login"])) {
        echo '<div class="login-result"><h2>Pro přístup k této stránce se musíte přihlásit.</h2></div>';
        die();
    }

    if(!$_SESSION['is_admin']) {
        echo '<div class="login-result"><h2>CHYBA: Pro přístup k této stránce nemáte dostatečná oprávnění.</h2></div>';
        die();
    }

    $users_file = fopen("data/users.json", "r+") or die("Unable to open users file");
    $users = json_decode(fread($users_file, filesize("data/users.json")), $assoc=true);

    fclose($users_file);

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
            
        foreach(array_keys($users) as $user) {
            echo "<option value=$user>$user</option>";
        }

        echo '<input id="loginbtn" type="submit" value="Odebrat">
            </form>';
    }
    ?>

    
    
</body>
</html>