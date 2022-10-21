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

    $u_all = $db->query("SELECT ID FROM users");
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

        $name = strtolower($_POST['username']);
        $pass = $_POST['password'];
        if (empty($name) || empty($pass)) {
            echo "Invalid parameters";
            die();
        } else {
        
            if(!array_key_exists($name, $users)) {
                $users[$name] = array("password" => password_hash($pass, 0), 
                    "is_admin" => $_POST['perms'] === "admin");
                fclose($users_file);
                $users_file = fopen("data/users.json", "w+") or die("Unable to open users file");
                fwrite($users_file, json_encode($users));
                fclose($users_file);
                echo "User $name added successfully";
            } else {
                echo "User already exists!";
            }
            
        }

        echo '</div>';

    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo '<form id="loginform" action="/adduser.php" method="post">
            <h1>Přidat uživatele</h1>
            <input type="text" placeholder="Uživatelské jméno" name="username" required>
            <input type="password" placeholder="Heslo" name="password" required>
            <label for="perms">Oprávnění:</label>
            <select id="perms" name="perms">
                <option value="user">Uživatel</option>
                <option value="admin">Administrátor</option>
            </select>
            <input id="loginbtn" type="submit" value="Přidat">
            </form>';
    }
    ?>

    
    
</body>
</html>