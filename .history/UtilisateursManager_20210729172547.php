<?php

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer($utilisateur){
    $query = $this -> pdo -> prepare('insert into utilisateurs (nom, prenom, tel, email) values(:nom, :prenom, :tel, :email)');
    $query -> bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $query
}

}