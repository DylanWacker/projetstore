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
};

//--------------------------------------------------------------------------
function InscriptionUser($Pseudo, $Nom, $Prenom, $Email, $Mdp, $Statut, $Avatar) {
//Inscription des utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('INSERT INTO utilisateurs(Nom,Prenom,Pseudo,MotDePasse,Email,Avatar,Statut) VALUES( :Nom,:Prenom,:Pseudo,:MotDePasse,:Email,:Avatar,:Statut)');
    return $req->execute(array('Nom' => $Nom, 'Prenom' => $Prenom, 'Pseudo' => $Pseudo, 'MotDePasse' => $Mdp, 'Email' => $Email, 'Avatar' => $Avatar, 'Statut' => $Statut));
};

//--------------------------------------------------------------------------
function VerifierPseudo($Pseudo) {
//Vérifie si un utilisateur possede déjà ce pseudo
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT IdUser FROM Utilisateurs WHERE Pseudo = :Pseudo');
    $req->execute(array('Pseudo' => $Pseudo));
    return $nb_resultats_recherche_membre = $req->fetch();
};

//--------------------------------------------------------------------------
function VerifierConnection() {
//Vérifie si un utilisateur est connecter
//--------------------------------------------------------------------------
    if (isset($_SESSION['User']['IdUser'])) {
        if ($_SESSION['User']['IdUser'] != "" || $_SESSION['User']['Pseudo'] != "") {
            return true;
        }
    } else
        return false;
};

//--------------------------------------------------------------------------
function AfficheInformation($Pseudo) {
//affiche les toutes informations des utilisateur
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  Utilisateurs  WHERE  Pseudo = :Pseudo');
    $req->execute(array('Pseudo' => $Pseudo));
    return $req->fetch(PDO::FETCH_ASSOC);
};



//--------------------------------------------------------------------------
function ModifierUtilisateur($UtilisateurDonnees) {
//met à jours touts les champs de la table utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('UPDATE utilisateurs set Nom = :Nom, Prenom = :Prenom, Email = :Email ,MotDePasse = :MotDePasse,Avatar = :Avatar WHERE IdUser = :IdUser;');
    $req->execute($UtilisateurDonnees);
};

//--------------------------------------------------------------------------
function ModifierUtilisateurSansMdp($UtilisateurDonneesSansMdp) {
//met à jours touts les champs de la table utilisateurs qui modifie pas leur mot de passe
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('UPDATE utilisateurs set Nom = :Nom, Prenom = :Prenom, Email = :Email ,Avatar = :Avatar,Statut = :Statut WHERE IdUser = :IdUser;');
    $req->execute($UtilisateurDonneesSansMdp);
};

//--------------------------------------------------------------------------
function AfficherUser() {
//affiche tout les utilisateurs par orde alphabetique
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  Utilisateurs  order by Pseudo');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
};

//--------------------------------------------------------------------------
function AfficheInformationById($IdUser) {
    //affiche les toutes informations des utilisateur grace a son Is
    //--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM   Utilisateurs  WHERE  IdUser = :IdUser');
    $req->execute(array('IdUser' => $IdUser));
    return $req->fetch(PDO::FETCH_ASSOC);
};

//--------------------------------------------------------------------------
function SupprimerMembre($IdUser) {
    //Supprimer toutes  les informations des utilisateur
    //--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('delete from Utilisateurs where IdUser = :IdUser');
    $req->execute(array('IdUser' => $IdUser));
    return $req->fetch(PDO::FETCH_ASSOC);
};

//--------------------------------------------------------------------------
function VerifierAdmin($IdUtilisateur) {
//Vérifie si c'est un administrateur
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT IdUser,Statut FROM Utilisateurs WHERE IdUser=:IdUser');
    $req->execute(array('IdUser' => $IdUtilisateur));
    return $req->fetch();
};
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
};

function CalculePoidsGramme($Achat, $Poids) {
    $Somme = $Achat / $Poids;
    return $Somme;
};

function CalculeNombreJoin($Poids, $Quantitee) {
    $Somme = $Poids / $Quantitee;
    return $Somme;
};
?>
