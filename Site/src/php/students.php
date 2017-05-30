<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des élèves
 */
include 'includes/header.php'
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Elèves</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
    </head>

    <body>
        <section>
            <!--Titre-->
            <h1>Elèves</h1>

            <?php
            #Préparation des données
            $result1 = $PDOLink->prepareData($req1);

            #Affichage des informations des élèves
            foreach($result1 as $display)
            {
                ?>
                <a href="viewDetails.php?id=<?php echo $display['idStudent']?>">
                    <div id="cour">
                        <div>
                            <div id="logo">
                                <img src="../../ressources/images/logo_student.png">
                            </div>
                            <div id="name">
                                <p><?php echo $display['stuFirstname']?></p>
                                <p><?php echo $display['stuName']?></p>

                            </div>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </section>
    </body>
</html>
