<?php
session_start();

include "../functions/PDOlink.php";
$PDO = new PDOlink();

$date = date("d.m.y");
$idCour = $_SESSION['idCour'];

foreach ($_SESSION['idArray'] as $display)
{
    $query = "INSERT INTO `t_inscrire` (`insDate`, `idEleve`, `idCour`) VALUES ('$date', '$display', $idCour)";
    $req = $PDO->exectueQuery($query);

}
unset($_SESSION['idCour']);
unset($_SESSION['idArray']);

$PDO->closeCursor($req);
$PDO->destroyObject();

echo "élève ajouté au cours !";

echo "<meta http-equiv='refresh' content='2; URL=../index.php'>";
