<?php
require_once 'inclureClasses.php';

class UtilisateursManager{
private $pdo;

public function __construct(PDO $pdo){
    $this -> pdo = $pdo;
}

public function inserer(Utilisateurs $utilisateur){
    $req = $this -> pdo -> prepare('INSERT INTO utilisateurs(nom, prenom, tel, email) VALUES(:nom, :prenom, :tel, :email)');
    $req -> bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR); //$_POST['nom'] ??
    $req -> bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
    $req -> bindValue(':tel', $utilisateur->getTel(), PDO::PARAM_STR);
    $req -> bindValue(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
    $req -> execute();
}

public function getListeUtilisateurs(){
    $req = $this -> pdo -> query('SELECT * FROM utilisateurs ORDER BY nom ASC');
    $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateurs');
    $listeUtilisateurs = $req -> fetchAll();
    $req -> closeCursor();
    return $listeUtilisateurs;
}

public function getUtilisateur($id){
    $req = $this -> pdo -> prepare('SELECT * FROM utilisateurs WHERE id=:id');
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> execute();
    $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateurs');
    $utilisateur = $req -> fetch();
    $req -> closeCursor();
    return $utilisateur;
}
public function mettreAJourUtilisateur($utilisateur){
    $req = $this -> pdo -> prepare('UPDATE utilisateurs SET nom=:nom, prenom=:prenom, tel=:tel, email=:email WHERE id=:id');
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> bindValue(':nom', $nom, PDO::PARAM_STR);
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> bindValue(':id', $id, PDO::PARAM_INT);
    $req -> execute();
    $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateurs');
    $utilisateur = $req -> fetch();
    $req -> closeCursor();
    return $utilisateur;
}



}