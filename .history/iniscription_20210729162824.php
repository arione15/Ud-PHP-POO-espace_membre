<?php
include 'Utilisateurs.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<form action="#" method="post" >

<label for="nom">Nom : </label>
<input type="text" id="nom" name="nom" value="nom">

<label for="prenom">Prénom : </label>
<input type="text" id="prenom" name="prenom" value="prenom">

<label for="tel">Nom : </label>
<input type="tel" id="tel" name="tel" value="tel">

<label for="mail">Nom : </label>
<input type="email" id="email" name="email" value="email">

</form>

</body>
</html>


<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['nom'];
$nom = $_POST['nom'];

$donnees = [$_POST["nom"], $_POST["prenom"], $_POST["tel"]$_POST["email"]];
$user = new Utilisateurs();
?>