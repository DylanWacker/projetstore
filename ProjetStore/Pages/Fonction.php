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
function InscriptionUser($Pseudo, $Nom, $Prenom, $Email, $Mdp, $Statut, $Adresse,$Numero, $Npa, $Localite, $Ville, $Pays, $Telephone) {
//Inscription des utilisateurs
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('INSERT INTO client(Nom,Prenom,Pseudo,MotDePasse,Adresse,Numero,Npa,Localite,Ville,Pays,Telephone,Email,Statut,DateInscription) VALUES( :Nom,:Prenom,:Pseudo,:MotDePasse,:Adresse,:Numero,:Npa,:Localite,:Ville,:Pays,:Telephone,:Email,:Statut, NOW() )');
    return $req->execute(array('Nom' => $Nom, 'Prenom' => $Prenom, 'Pseudo' => $Pseudo, 'MotDePasse' => $Mdp, 'Adresse' => $Adresse, 'Numero' => $Numero, 'Npa' => $Npa,'Localite' => $Localite, 'Ville' => $Ville, 'Pays' => $Pays, 'Telephone' => $Telephone, 'Email' => $Email, 'Statut' => $Statut));
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
function AfficheInformationById($IdClient) {
    //affiche les toutes informations des utilisateur grace a son Id
    //--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM   client  WHERE  IdClient = :IdClient');
    $req->execute(array('IdClient' => $IdClient));
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
    return $req->fetch();
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

//--------------------------------------------------------------------------
function AfficherTypeCommandeById($IdStore) {
//Affiche le type de commande des stores
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT tc.IdTypeCommande, tc.Commande FROM store s  join typecommande tc  WHERE s.IdStore = :IdStore');
    $req->execute(array('IdStore' => $IdStore));
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;


//--------------------------------------------------------------------------
function AfficherTypeStoreById($IdStore) {
//Affiche le type de commande des stores
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT ts.NomType FROM store s  join typestore ts  WHERE s.IdStore = :IdStore');
    $req->execute(array('IdStore' => $IdStore));
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;

//--------------------------------------------------------------------------
function CompterNombreStoreParType($IdStore) {
//Compter le nombre de store du type choisis
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT Count(IdType) FROM `store`where IdType = :IdStore;');
    $req->execute(array('IdStore' => $IdStore));
    return $req->fetch();
}

;


//--------------------------------------------------------------------------
function AfficherCouleurStoreById($IdStore) {
//Affiche le type de commande des stores
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT c.IdCouleur,c.NomCouleur from couleur c natural join couleurstore cs join store s where c.IdCouleur = cs.IdCouleur and s.Idstore=cs.IdStore and s.IdStore= :IdStore;');
    $req->execute(array('IdStore' => $IdStore));
    return $req->fetchall(PDO::FETCH_ASSOC);
}

;



function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
        header('Location: login.php');
        exit();
    }
}

function reconnect_from_cookie(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_COOKIE['remember']) && !isset($_SESSION['auth']) ){
        require_once 'db.php';
        if(!isset($pdo)){
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode('==', $remember_token);
        $user_id = $parts[0];
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute([$user_id]);
        $user = $req->fetch();
        if($user){
            $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
            if($expected == $remember_token){
                session_start();
                $_SESSION['auth'] = $user;
                setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
            } else{
                setcookie('remember', null, -1);
            }
        }else{
            setcookie('remember', null, -1);
        }
    }
}
?>