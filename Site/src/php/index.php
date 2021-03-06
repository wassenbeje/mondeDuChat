<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'accueil du site
 */
include 'includes/header.php'
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../../ressources/css/index.css">
    </head>

    <body>
        <section>

            <div id="link">

                <ul>
                    <li>
                        <div class="case">

                            <div class="img">
                                <a href="students.php">
                                    <img src="../../ressources/images/eleves.jpg">
                                </a>
                            </div>

                            <div class="txt">
                                <a href="students.php">Liste des élèves</a>
                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="case">

                            <div class="img">
                                <a href="teachers.php">
                                    <img src="../../ressources/images/enseignants.jpg">
                                </a>
                            </div>
                            <div class="txt">
                                <a href="teachers.php">Liste des enseignants</a>
                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="case">

                            <div class="img">
                                <a href="lessons.php">
                                    <img src="../../ressources/images/cours.jpg">
                                </a>
                            </div>

                            <div class="txt">
                                <a href="lessons.php">Liste des cours</a>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </body>
</html>
