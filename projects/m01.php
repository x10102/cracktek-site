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
    <link rel="stylesheet" href="../styles/projectpage.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --text-color: white;
        }
    </style>
</head>
<body>
    <div id="navbar">
        <?php require_once("../navbar.php");?>    
    </div>
    <h1>MODEL//01</h1>
    <img id="img-main" src="../images/mask_crack_big.png" alt="model 01" width="700">
    <h2>Jak se to stalo</h2>
    <p>Seděl jsem ve vlaku ze školy, poslouchal nejspíš Sum 41 nebo nějaký šílený vocaloid remix a přemýšlel o kravinách. Jedna z těch kravin, která se mi usadila v hlavě byla vzpomínka na Watch Dogs 2, hlavně na to, že Wrench byl strašnej frajer. O pár vteřin později už jsem začal sám se sebou rozebírat, jak by asi mohla fungovat ta jeho maska. Má jí snad přilepenou k obličeji? Dokáže to nějakým způsobem detekovat jeho emoce? Jsem snad autista že myslím na tohle, a ne na to, že bych se měl jít ožrat do klubu a vyspat se s prvním ochotným člověkem? Nemám ponětí. Když už jsem se postupně dostával k tomu, jestli by to mohlo fungovat v reálném světě, tak jsem málem propásnul zastávku. Doma jsem hodil tašku do kouta, fláknul hlavou o polštář a na všechno klasicky zapomněl.</p>
    <p>Za pár měsíců, nejspíš zase ve vlaku, se mi ta myšlenka znova vybavila. Tentokrát jsem si ale při vystupování nesundal sluchátka, abych nemusel přijít do kontaktu s tím zasraným reálným světem. Doma jsem se chvíli hádal s depresema, jestli si mám zase lehnout do postele a 4 hodiny sledovat na YouTubu výslech nějakého čínského horníka, který pobodal svoji manželku, nebo dělat něco skutečně produktivního. Nakonec jsem ale vyhrál, takže jsem popadl krabici od pizzy ze skříně, tavící pistoli, ESPčko a kus drátu a dal se do stavby prototypu.</p>
    <p><i>„Za každým velkým objevem je prototyp z kartonu, který vypadá jako sračka“ –Nikola Tesla</i></p>
    
    <p>A že tak vážně vypadal. Ale po dvou hodinách bolestivýho programování se to fakt rozsvítilo, což jsem upřímně nečekal. Sednul jsem si ke Fusionu a začal modelovat, jak by to mohlo vypadat… No, tímhle tempem za pár měsíců. Během pár dalších dní jsem model dodělal a rozhodl se zneužít dotace od Evropské Unie.</p>
    <p>Náš milý pan učitel na grafiku / finální boss místnosti se 3D tiskárnami se mě ptal: „K čemu to bude?“ Řekl jsem mu, že to bude cool. Oba jsme si chtěli pohrát s 3D tiskárnou, tak jsme to tam dali a odpoledne jsem si vyzvedl tři kusy plastu, do kterých jsem samozřejmě později musel vyřezat pár dalších děr, protože jsem to podělal. Po cestě jsem se ještě stavil v železářství koupit barvu a lepidlo. <b>Nitrokombinační barvy smrdí jako Zyklon B, schnou sakra dlouho a potřebují tak 10 vrstev. Kupte si radši akrylový lak.</b></p>
    <img src="../images/m01_egirl.jpg" alt="" width="500" style="float: right; clear: right; position: relative;">
    <p>Takže jsem to slepil dohromady, zapojil ESPčko, level shiftery, ledky a SD kartu a dal se do programování.
    No, po zhruba týdnu mlácení hlavou o stůl jsem došel k závěru, že jsem v nějakém bodě toho procesu usmažil SPI port. Po dalším týdnu mlácení hlavou o stůl jsem přišel na to, že integrovaný SPIFFS se mnou taky spolupracovat nebude a všechny animace nacpal přímo do programu jako klasický pole.
    </p>
    
    <p>
        Oh yea už to funguje vole. Teďka co s tím… Ukážu to mámě? Možná, ale především to ukážu divným existencím, které se v Praze sejdou 2.7.2022! Sebral jsem svůj gang a jeli jsme. Můj outfit ten den za moc nestál, a můj foťák očividně taky ne, ale pár lidí mě reálně požádalo o fotku, takže můžu s klidem říci, že jsem cool zmrd.</p>
    Jo a Wrenche to nepřipomíná ani trochu, díky za optání.</p>
</body>
</html>