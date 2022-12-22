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
        <link rel="stylesheet" href="styles/style.css" type="text/css">
        <link rel="stylesheet" href="styles/navbar.css" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet" type="text/css">
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
        <div class="page-main">
            <div class="title-big">
                <h1><b>CrackTek Industries</b></h1>
            </div>
            <div class="motto-box">
                <span>Technologie</span>
                <div class="motto-spacer"></div>
                <span>Crack</span>
                <div class="motto-spacer"></div>
                <span>Světový Mír</span>
            </div>
            <div class="para-block">
                <h2>Kdo jsme</h2>
                <p>Jsme CrackTek Industries. Tvoříme technologie budoucnosti, ale už teď! Jak to děláme? Nikdo neví a vědět to nemusíte, naše inovace vám změní život!</p>
            </div>
            <div class="para-block">
                <h2>Co děláme</h2>
                <p>Většina naší práce je přísně utajená a k dokumentaci mají přístup pouze autorizovaní zaměstnanci. Některé z mnoha našich aktivit však zahrnují: </p>
                <ul>
                    <li>Posouvání technologií České Republiky na vyšší úroveň</li>
                    <li>Kontrola populace divokých tygrů v Ústí nad Labem</li>
                    <li>Prodej smaženého sýru v nebezpečných zónách</li>
                    <li>Vyhledání a zničení <b>Tebe, ty hajzle!</b> Ne nemyslím tebe, mluvím na Toho Za Tebou.</li>
                </ul>
            </div>
            <div class="para-block">
                <h2>Práce u nás</h2>
                <p>Takže, vy chcete pracovat v nejprestižnějším technologickém startupu České Republiky? Skvěle! Práce u nás nikdy není nudná, každý den objevíte něco nového, co jste nikdy vidět nechtěli! Neváhejte a pošlete svůj životopis ještě dnes. Můžeme vám nabídnout: </p>
                <ul>
                    <li>Nástupní plat <i>237 + 8i</i> ████/hod</li>
                    <li><span class="redacted">[CHYBA PŘENOSU]</span> stravování na místě</li>
                    <li>Exotická pracoviště o kterých budete vyprávět svým vnoučatům (pokud vám nějaká zůstanou)</li>
                    <li>Podvody na daních</li>
                    <li>Kebab zdarma :3</li>
                </ul>
            </div>
            <div class="para-block">
                <p>Zní vám to úžasně? My víme! Zde je pár věcí, které by měl každý náš zaměstnanec mít: </p>
                <ul>
                    <li>Nejlépe výšku dělitelnou sedmi a rozhodně ne výšku dělitelnou 23</li>
                    <li>Chuť k práci</li>
                    <li>Byt / dům / karavan postavený před rokem 1973</li>
                    <li>Znalosti Latiny minimálně na úrovni B2</li>
                    <li>Schopnost uvařit špagety za dobu menší než 480 vteřin</li>
                    <li><span class="redacted">[VYMAZÁNO]</span></li>
                </ul>
                </div>
        </div>
    </body>
</html>