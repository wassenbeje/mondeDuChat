<?php
session_start();
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Partie haute du site
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
    <link rel="stylesheet" type="text/css" href="../../ressources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../ressources/css/responsiveMenu.css">

</head>

<header>

    <div id="logo">
        <a href="index.php">
            <img src="../../ressources/images/logo.png">
        </a>
    </div>

    <nav>
        <label for="show-menu" class="show-menu">Menu</label>
        <input type="checkbox" id="show-menu" role="button">
        <ul id="menu">
            <li class="li"><a href="index.php">Accueil</a></li>
            <li class="li"><a href="students.php">Elèves</a></li>
            <li class="li"><a href="teachers.php">Formateurs</a></li>
            <li class="li"><a href="lessons.php">Cours</a></li>
        </ul>
    </nav>
</header>

