<?php

/*
  Page     : fonction.php
  Auteur   : Carluccio Dylan
  Fonction : Page qui contient toutes les fonctions nécessaire.
 */

function dbConnect() {
//fonction de connexion à la base
//--------------------------------------------------------------------------
    global $dbc;
    try {
        $dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Could not connect to MySQL');
    }
}

;

//--------------------------------------------------------------------------
function InscriptionUser($Pseudo, $Nom, $Prenom, $Email, $Mdp, $Statut, $Adresse, $Npa, $Ville, $Telephone, $Token) {
//Inscription des utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('INSERT INTO client(Nom,Prenom,Pseudo,MotDePasse,Adresse,Npa,Ville,Telephone,Email,Statut,Confirmation_token) VALUES( :Nom,:Prenom,:Pseudo,:MotDePasse,:Adresse,:Npa,:Ville,:Telephone,:Email,:Statut,:Confirmation_token)');
    return $req->execute(array('Nom' => $Nom, 'Prenom' => $Prenom, 'Pseudo' => $Pseudo, 'MotDePasse' => $Mdp, 'Adresse' => $Adresse, 'Npa' => $Npa, 'Ville' => $Ville, 'Telephone' => $Telephone, 'Email' => $Email, 'Statut' => $Statut, 'Confirmation_token' => $Token));
}

;

//--------------------------------------------------------------------------
function VerifierPseudo($Pseudo) {
//Vérifie si un utilisateur possede déjà ce pseudo
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT IdClient FROM client WHERE Pseudo = :Pseudo');
    $req->execute(array('Pseudo' => $Pseudo));
    return $nb_resultats_recherche_membre = $req->fetch();
}

;

//--------------------------------------------------------------------------
function VerifierConnection() {
//Vérifie si un utilisateur est connecter
//--------------------------------------------------------------------------
    if (isset($_SESSION['User']['IdClient'])) {
        if ($_SESSION['User']['IdClient'] != "" || $_SESSION['User']['Pseudo'] != "") {
            return true;
        }
    } else
        return false;
}

;


//--------------------------------------------------------------------------
function ModifierUtilisateur($UtilisateurDonnees) {
//met à jours touts les champs de la table utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('UPDATE utilisateurs set Nom = :Nom, Prenom = :Prenom, Email = :Email ,MotDePasse = :MotDePasse,Avatar = :Avatar WHERE IdUser = :IdUser;');
    $req->execute($UtilisateurDonnees);
}

;

//--------------------------------------------------------------------------
function ModifierUtilisateurSansMdp($UtilisateurDonneesSansMdp) {
//met à jours touts les champs de la table utilisateurs qui modifie pas leur mot de passe
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('UPDATE utilisateurs set Nom = :Nom, Prenom = :Prenom, Email = :Email ,Avatar = :Avatar,Statut = :Statut WHERE IdUser = :IdUser;');
    $req->execute($UtilisateurDonneesSansMdp);
}

;

//--------------------------------------------------------------------------
function AfficherUser() {
//affiche tout les utilisateurs par orde alphabetique
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  Utilisateurs  order by Pseudo');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function AfficheInformationById($IdUser) {
    //affiche les toutes informations des utilisateur grace a son Is
    //--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM   Utilisateurs  WHERE  IdUser = :IdUser');
    $req->execute(array('IdUser' => $IdUser));
    return $req->fetch(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function SupprimerMembre($IdUser) {
    //Supprimer toutes  les informations des utilisateur
    //--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('delete from Utilisateurs where IdUser = :IdUser');
    $req->execute(array('IdUser' => $IdUser));
    return $req->fetch(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function VerifierAdmin($IdUtilisateur) {
//Vérifie si c'est un administrateur
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT IdUser,Statut FROM Utilisateurs WHERE IdUser=:IdUser');
    $req->execute(array('IdUser' => $IdUtilisateur));
    return $req->fetch();
}

;

//--------------------------------------------------------------------------
function AfficherCahier($IdUser) {
//Affiche la photo associée a son exercice
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM cahier c natural join Utilisateurs u WHERE c.IdUser= u.IdUser and u.IdUser = :IdUser');
    $req->execute(array('IdUser' => $IdUser));
    return $req->fetchAll();
}

//--------------------------------------------------------------------------
function CountUtilisateurs() {
//compte combien d'utilisateur exsite dans la table utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT count(IdUser) Utilisateurs FROM utilisateurs');
    $req->execute(array());
    return $req->fetch();
}

;

//--------------------------------------------------------------------------
function AfficherStore() {
//affiche tout les stores
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  Store order by IdStore');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function AfficherStoreById($IdStore) {
//Affiche le store choisis
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT *  FROM  Store WHERE IdStore = :IdStore');
    $req->execute(array('IdStore' => $IdStore));
    return $req->fetchAll();
}

;

//--------------------------------------------------------------------------
function Str_random($Length) {
//Affiche le store choisis
//--------------------------------------------------------------------------
    $Alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($Alphabet, $Length)), 0, $Length);
}

;

//--------------------------------------------------------------------------
function AfficheInformation($Pseudo) {
//affiche les toutes informations des utilisateur
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  client  WHERE  Pseudo = :Pseudo');
    $req->execute(array('Pseudo' => $Pseudo));
    return $req->fetch(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function AfficherTypeStore() {
//Affiche le type de store
//--------------------------------------------------------------------------
   global $dbc;
    $req = $dbc->prepare('SELECT * FROM  TypeStore');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function AfficherTypeCommande() {
//Affiche le type de commande des stores
//--------------------------------------------------------------------------
   global $dbc;
    $req = $dbc->prepare('SELECT * FROM  TypeCommande');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;
?>
