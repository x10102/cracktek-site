<!DOCTYPE HTML>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <title>uwu</title>
    <link rel="stylesheet" href="styles/login.css">
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
    <script src="navbar.js"></script>    
    </div>

    <?php

    const STATUS_LOGOUT = 0;
    const STATUS_REQ_ERROR = 1;
    const STATUS_AUTH_FAIL = 2;
    
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['login_disabled'] == 'true') {
        echo '<div id="login-result"> This feature has been disabled by administrator </div>';
        die();
    }

    /*
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $hostname = $_SERVER['dbhost'];
        $database = $_SERVER['dbschema'];
        $db_user = $_SERVER['dbuser'];
        $db_pass = $_SERVER['dbpasswd'];

        $db = mysqli_connect($hostname, $db_user, $db_pass, $database);
        if($db === false) {
            echo "Error: could not connect to database";
            die();
        }

        $result = $db->query("SELECT ID from users");
        if(empty($result)) {
            $query = "CREATE TABLE users ( 
                ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(64) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                admin INT(1) NOT NULL,
                AVATAR MEDIUMBLOB,
                MOTTO VARCHAR(300))";
            $db->query($query);
        }

        echo '<div id="login-result">';

        if (isset($_POST['logout'])) {
            session_unset();
            // We destroy the session after refresh and displaying the logout message
            $_SESSION['login_status'] = STATUS_LOGOUT;
            header("Location: ".$_SERVER['REQUEST_URI']);
            die();
        }

        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            $_SESSION['login_status'] = STATUS_REQ_ERROR;
            header("Location: ".$_SERVER['REQUEST_URI']);
            die();
        }
        
        $name = strtolower($_POST['username']);
        $pass = $_POST['password'];

        $stmt = $db->prepare("SELECT password, admin FROM users WHERE username=?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        var_dump($result);

        if($result->num_rows !== 1) {
            echo "<h2> Neznámý uživatel nebo nesprávné heslo. </h2>";
            $_SESSION['login_status'] = STATUS_AUTH_FAIL;
            header("Location: ".$_SERVER['REQUEST_URI']);
        }

        $usr = $result->fetch_assoc();

        if(!password_verify($pass, $usr['password'])) {
            echo "<h2> Neznámý uživatel nebo nesprávné heslo. </h2>";
            $_SESSION['login_status'] = STATUS_AUTH_FAIL;
            header("Location: ".$_SERVER['REQUEST_URI']);
        } else {

            // Always regenerate session ID when changing auth state
            session_regenerate_id();

            $_SESSION["login"] = TRUE;
            $_SESSION["user"] = $name;
            $_SESSION["is_admin"] = $usr['admin'];

            unset($_POST);

            echo "<h2> Uživatel $name se přihlásil.</h2><br>";
            echo "<i> (Heslo: $pass)</i>";

            header("Location: ".$_SERVER['REQUEST_URI']);
        }
              

        echo '</div>';

    } else if ($_SERVER["REQUEST_METHOD"] == "GET") {


        if(isset($_SESSION['login']) && $_SESSION['login']) {
            echo '<div id="login-result"><h2>Jste přihlášen jako '.$_SESSION['user'].'.</h2>
            <form id="logoutform" action="/login.php" method="post">
            <input type="hidden" name="logout" value=true>
            <input id="loginbtn" type="submit" value="Odhlásit se"></div>';
            return;
        }

        echo '<form id="loginform" action="/login.php" method="post">
            <h1>Přihlášení Uživatele</h1>
            <input type="text" placeholder="Uživatelské jméno" name="username" required>
            <input type="password" placeholder="Heslo" name="password" required>
            <input id="loginbtn" type="submit" value="Přihlásit">';

        if(isset($_SESSION['login_status'])) {
            switch($_SESSION['login_status']) {
                case STATUS_AUTH_FAIL:
                    echo '<span class="loginfail">Nesprávné uživatelské jméno nebo heslo.</span>';
                    break;

                case STATUS_REQ_ERROR:
                    echo '<span class="loginfail">Došlo k chybě. Zkuste to prosím znovu později nebo kontaktujte administrátora.</span>';
                    break;

                case STATUS_LOGOUT:
                    echo '<span class="loginsuccess">Uživatel odhlášen.</span>';
                    session_destroy();
                    break;

            }
            unset($_SESSION['login_status']);
        }

        echo '</form>';
    }
    ?>

    
    
</body>
</html>