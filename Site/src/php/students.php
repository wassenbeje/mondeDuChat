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
        <link rel="stylesheet" type="text/css" href="../../ressources/css/students-teachers.css">
        <script src="../js/refresh.js"></script>
    </head>

    <body>

        <section>
            <!--Titre-->
            <div id="en-tete-list">
                <h1>Elèves</h1>
                <label>
                    <span>Triés par :</span>
                    <select onchange="studentsRefresh()" id="select">
                        <option selected="selected">...</option>
                        <option value="nom">nom</option>
                        <option value="prenom">prénom</option>
                    </select>
                </label>

                <label>
                    <button id="addButton" onclick="addStudent()">Ajouter un élève</button>
                </label>

            </div>
            <div id="list">

                <?php
                    #Préparation des données
                    $result = $PDO->prepareData($req);

                    #Affichage des informations des élèves
                    foreach($result as $display)
                    {
                        ?>

                        <div id="marge">
                            <div id="cartes">
                                <div>

                                    <div id="photo">
                                        <a href="details.php?id=<?php echo $display['idEleve']?>&type=student">
                                            <img src="../../ressources/images/eleves/<?php echo $display['elePhoto']  ?>">
                                        </a>
                                    </div>

                                    <div id="infos">
                                        <a id="name" href="details.php?id=<?php $display['idEleve']?>&type=student">
                                            <p><?php echo $display['eleNom']?></p>
                                            <p><?php echo $display['elePrenom']?></p>
                                        </a>
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
