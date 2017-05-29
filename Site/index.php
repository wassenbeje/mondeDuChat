<?php
session_start();
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'indexation à la racine du site
 */
?>

<html>
    <head>
        <title>Index</title>
        <?php
            if(isset($_SESSION['login']))
            {
                echo "<meta http-equiv='refresh' content='0; URL=src/php/index.php'>";
            }
        ?>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    </head>
</html>


