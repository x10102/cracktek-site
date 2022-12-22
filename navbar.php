<?php

$urls = array(
    'index.php' => 'Hlavní Strana',
    'contact.php' => 'Kontakty',
    'projects.php' => 'Projekty',
    'personal.php' => 'Profil Majitele'
);

$urls_user = array(
    'login.php' => 'Přihlášení'
);

$urls_admin = array(
    'users.php' => 'Správa Uživatelů',
);

if(@$_SERVER['login_disabled'] != 'true') {
    $urls = array_merge($urls, $urls_user);
}

if(@$_SESSION['is_admin']) {
    $urls = array_merge($urls, $urls_admin);
};

$idx = 0;
foreach($urls as $link => $title) {
    if(basename($_SERVER['PHP_SELF']) != $link) {
        echo "<a href=\"$link\">$title</a>";
    } else {
        echo "<span style=\"font-weight: 600;\">$title</span>";
    }
    if(++$idx != count($urls)) {
        echo ' / ';
    }
}

?>