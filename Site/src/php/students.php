<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page de visualisation des élèves
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$sort = "";
if (isset($_GET['sort']))
{
    $sort = $_GET['sort'];
}

$PDO = new PDOlink();

if ($sort == "nom")
{
    $query = 'SELECT idEleve, eleNom, elePrenom, elePhoto FROM t_eleves ORDER BY eleNom ASC';
}

if ($sort == "prenom")
{
    $query = 'SELECT idEleve, eleNom, elePrenom, elePhoto FROM t_eleves ORDER BY elePrenom ASC';
}

else
{
    $query = 'SELECT idEleve, eleNom, elePrenom, elePhoto FROM t_eleves';
}

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

                <?php
                    if (isset($_GET['idCour']))
                    {
                        ?>
                        <button class="sendAndCancelButton" onclick="">Annuler</button>
                        <button class="sendAndCancelButton" onclick="submit()">Envoyer</button>
                        <?php
                    }

                    else
                    {
                        ?>
                        <h1>Elèves</h1>
                        <label class="label">
                            <span>Triés par :</span>
                            <select onchange="studentsRefresh()" id="select">
                                <option selected="selected">...</option>
                                <option value="nom">nom</option>
                                <option value="prenom">prénom</option>
                            </select>
                        </label>

                        <label class="label">
                            <button id="addButton" onclick="addStudent()">Ajouter un élève</button>
                        </label>
                        <?php
                    }
                ?>
            </div>

            <div id="container">

                <?php
                    #Préparation des données
                    $result = $PDO->prepareData($req);

                    #Affichage des informations des élèves
                    foreach($result as $display)
                    {
                        ?>

                        <div id="marge">
                            <div id="cartesStudent-teacher">
                                <div>

                                    <div id="photo">
                                        <a href="details.php?id=<?php echo $display['idEleve']?>&type=student">
                                            <img src="../../ressources/images/eleves/<?php echo $display['elePhoto']  ?>">
                                        </a>
                                    </div>

                                    <div id="infos">
                                        <a id="name" href="details.php?id=<?php echo $display['idEleve']?>&type=student">
                                            <p><?php echo $display['eleNom']?></p>
                                            <p><?php echo $display['elePrenom']?></p>
                                        </a>

                                        <?php
                                            if (isset($_GET['idCour']))
                                            {
                                                ?>
                                                <form id="form" action="" method="get">
                                                    <div  id="checkbox">
                                                        <label>
                                                            <span>Ajouter :</span>
                                                            <input type="checkbox">
                                                            <input style="display:none;" type="submit" value="Submit" id="bt1" />
                                                        </label>
                                                    </div>
                                                </form>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </section>
    </body>
</html>

<?php
$PDO->closeCursor($req);
$PDO->destroyObject();
?>
