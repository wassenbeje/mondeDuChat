<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des élèves
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$PDO = new PDOlink();

$query = 'SELECT idEleve, eleNom, elePrenom, elePhoto FROM t_eleves';
$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Elèves</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/students-teachers-lessons_display.css">
        <script src="../js/refresh.js"></script>
    </head>

    <body>

        <section>

            <div id="title">
                <span>Ajouter ces élèves ?</span><br>
                <button class="sendAndCancelButton" onclick="returnIndex()">Annuler</button>
                <button class="sendAndCancelButton" onclick="addMemberToLessons()">Confirmer</button>
            </div>

            <div id="container">

                    <?php
                        $result = $PDO->prepareData($req);
                        $tableID = array();

                        foreach($_POST['checkbox'] as $case)
                        {
                            if (isset($_POST['checkbox']))
                            {
                                $queryCheckbox = 'SELECT idEleve, eleNom, elePrenom, elePhoto FROM t_eleves WHERE idEleve='.$case;
                                $reqCheck = $PDO->exectueQuery($queryCheckbox);
                                $resultCheck = $PDO->prepareData($reqCheck);

                                foreach($resultCheck as $display)
                                {
                                    array_push($tableID, $display['idEleve']);
                                    ?>
                                    <div id="marge">

                                        <div id="cartesStudent-teacher">

                                            <div id="photo">
                                                <img src="../../ressources/images/eleves/<?php echo $display['elePhoto']  ?>">
                                            </div>

                                            <div id="infos">
                                                <p><?php echo $display['eleNom']?></p>
                                                <p><?php echo $display['elePrenom']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }

                            }
                        }
                        $_SESSION['idCour'] = $_GET['idCour'];
                        $_SESSION['idArray'] = $tableID;
                    ?>
            </div>
        </section>
    </body>
</html>

<?php
$PDO->closeCursor($req);
$PDO->closeCursor($reqCheck);
$PDO->destroyObject();
?>
