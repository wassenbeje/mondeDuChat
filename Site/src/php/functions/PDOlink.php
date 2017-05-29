<?php
/**
 * ETML
 * Auteur: Jérôme Wassenberg
 * Date: 20.03.2017
 * Description : Fonctions de connexion à la BD
 */

include 'config.php';

class PDOlink {

    /** @var PDO $connector */
    private $connector;

    #Etablissement de la connexion
    function __construct()
    {
        $this->connector = new PDO('mysql:host='.$GLOBALS['config']['host'].';dbname='. $GLOBALS['config']['DBname'],$GLOBALS['config']['user'],$GLOBALS['config']['password']);
    }

    #Prépare les données
    function exectueQuery ($req)
    {
        $req = $this->connector->prepare($req);
        $req->execute();
        return $req;
    }

    #Affiche les données
    function prepareData ($req)
    {
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    #Ferme la connexion
    function closeCursor ($req)
    {
        $req->closeCursor();
    }

    #Destruit l'objet de connexion
    function destroyObject ()
    {
        unset($connector);
    }
}
