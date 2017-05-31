<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un élève ou enseignant
 */
include 'includes/header.php';
include "functions/PDOlink.php";
$PDO = new PDOlink();

$id = $_GET['id'];
$type = $_GET['type'];

if ($_GET['type'] == "student")
{
    $query = 'SELECT eleNom, elePrenom, eleDateNaissance, eleRue, eleNPA, eleLocalite, elePays, eleTelephone, eleMail, eleProfession, eleCommentaire, elePhoto FROM t_eleves WHERE idEleve=' . $_GET['id'];
}
$req = $PDO->exectueQuery($query);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Elèves</title>

        <link rel="stylesheet" type="text/css" href="../../ressources/css/common.css">
        <link rel="stylesheet" type="text/css" href="../../ressources/css/form.css">
    </head>

    <body>

        <section>
            <div id="container">
                <?php
                #Préparation des données
                $result = $PDO->prepareData($req);

                foreach ($result as $display)
                {
                    ?>
                        <div id="photo">
                            <img src="../../ressources/images/eleves/<?php echo $display['elePhoto']?>">
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
