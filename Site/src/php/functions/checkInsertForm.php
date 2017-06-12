<?php
/**
 * ETML
 * Auteur : Jérôme Wassenberg
 * Date : 29.05.2017
 * Description : Page d'ajout d'un élève ou enseignant
 */

include "PDOlink.php";
$PDO = new PDOlink();

#INFOS FORMULAIRE
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$npa = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$job = $_POST['job'];

if (isset($_POST['rentMethod']) && isset($_POST['rentNumber']))
{
    $rentMethod = $_POST['rentMethod'];
    $rentNumber = $_POST['rentNumber'];
}

$photo = $_POST['photo'];
$description = $_POST['description'];

#REGEX
$regexName = '/^[a-zA-Z \é\è\ö\ô\ê]+$/';
$regexBirthdate = '/^\d{2}\.\d{2}\.\d{4}$/';
$regexAddress = '/^[a-z A-Z0-9]+$/';
$regexNPA = '/^\d+$/';
$regexCityCountry = '/^[a-z A-Z]+$/';
$regexPhone = '/^\+?\d+{2}$/';
$regexMail = '/^[a-zA-Z0-9]+\@$/';
$regexJob = '/^[a-z A-Z]+$/';

echo "nom : ". $firstname . "<br>";
echo "Prénom : ".$lastname . "<br>";
echo "Date de naissance : ".$birthday . "<br>";
echo "Adresse : ".$address . "<br>";
echo "Numéro postal : ".$npa . "<br>";
echo "Ville : ".$city . "<br>";
echo "Pays : ".$country . "<br>";
echo "Numéro de téléphone ".$phone . "<br>";
echo "Mail : ".$mail . "<br>";
echo "Métier : ".$job . "<br>";
echo "Description : ".$description . "<br>"."<br>";

if (preg_match($regexName, $firstname))
{
    echo " Nom ok";
}

else
{
    echo " Nom faux";
}

echo "<br>";

if (preg_match($regexName, $lastname))
{
    echo " Prénom ok";
}

else
{
    echo " Prénom faux";
}
echo "<br>";
if (preg_match($regexBirthdate, $birthday))
{
    echo " Date de naissance ok";
}

else
{
    echo " Date de naissance fausse";
}
echo "<br>";
if (preg_match($regexAddress, $address))
{
    echo " Adresse ok";
}

else
{
    echo " Adresse fausse";
}
echo "<br>";
if (preg_match($regexNPA, $npa))
{
    echo " Numéro postal ok";
}

else
{
    echo " Numéro postal faux";
}
echo "<br>";
if (preg_match($regexCityCountry, $city))
{
    echo " Ville ok";
}

else
{
    echo " Ville fausse";
}
echo "<br>";
if (preg_match($regexCityCountry, $country))
{
    echo " Pays ok";
}

else
{
    echo " Pays faux";
}
echo "<br>";
if (preg_match($regexPhone, $phone))
{
    echo " Téléphone ok";
}

else
{
    echo " Téléphone faux";
}
echo "<br>";
if (preg_match($regexMail, $mail))
{
    echo " Mail ok";
}

else
{
    echo " Mail faux";
}
echo "<br>";
if (preg_match($regexJob, $job))
{
    echo " Métier ok";
}

else
{
    echo " Métier faux";
}
