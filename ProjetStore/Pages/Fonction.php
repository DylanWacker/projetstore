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
    if (isset($_SESSION['User']['IdClient'])) {
        if ($_SESSION['User']['IdClient'] != "" || $_SESSION['User']['Pseudo'] != "") {
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
//
//
//PANIER
//
//
//--------------------------------------------------------------------------

//--------------------------------------------------------------------------
 function CreationPanier(){
//Crée le panier d'achats
//--------------------------------------------------------------------------
   if (!isset($_SESSION['Panier'])){
      $_SESSION['Panier']=array();
      $_SESSION['Panier']['NomProduit'] = array();
      $_ESSION['Panier']['QteProduit'] = array();
      $_SSESSION['Panier']['PrixProduit'] = array();
      $_SESSION['Panier']['verrou'] = false;
   }   return true;

};

//--------------------------------------------------------------------------
function AjouterArticle($NomProduit,$QteProduit,$PrixProduit){
//Ajouter un Article
//--------------------------------------------------------------------------
//Si le panier existe
   if (CreationPanier() && !IsVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $PositionProduit = array_search($NomProduit,  $_SESSION['Panier']['NomProduit']);

      if ($PositionProduit !== false)
      {
         $_SESSION['Panier']['QteProduit'][$PositionProduit] += $QteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['Panier']['NomProduit'],$NomProduit);
         array_push( $_SESSION['Panier']['QteProduit'],$QteProduit);
         array_push( $_SESSION['Panier']['PrixProduit'],$PrixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
};


//--------------------------------------------------------------------------
function SupprimerArticle($NomProduit){
//Supprime un article du panier
//--------------------------------------------------------------------------
    //Si le panier existe
   if (CreationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['NomProduit'] = array();
      $tmp['QteProduit'] = array();
      $tmp['PrixProduit'] = array();
      $tmp['verrou'] = $_SESSION['Panier']['verrou'];

      for($i = 0; $i < count($_SESSION['Panier']['NomProduit']); $i++)
      {
         if ($_SESSION['Panier']['NomProduit'][$i] !== $NomProduit)
         {
            array_push( $tmp['NomProduit'],$_SESSION['Panier']['NomProduit'][$i]);
            array_push( $tmp['QteProduit'],$_SESSION['Panier']['QteProduit'][$i]);
            array_push( $tmp['PrixProduit'],$_SESSION['Panier']['PrixProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['Panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
};


//--------------------------------------------------------------------------
function ModifierQTeArticle($NomProduit,$QteProduit){
//Modifie la quantité d'un article dans le panier
//--------------------------------------------------------------------------
//Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($QteProduit > 0)
      {
         //Recharche du produit dans le panier
         $PositionProduit = array_search($NomProduit,  $_SESSION['Panier']['NomProduit']);

         if ($PositionProduit !== false)
         {
            $_SESSION['Panier']['QteProduit'][$PositionProduit] = $QteProduit ;
         }
      }
      else
      SupprimerArticle($NomProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
};


//--------------------------------------------------------------------------
function MontantGlobal(){
//Calcule le montant totale du panier
//--------------------------------------------------------------------------
  $total=0;
   for($i = 0; $i < count($_SESSION['Panier']['NomProduit']); $i++)
   {
      $total += $_SESSION['Panier']['QteProduit'][$i] * $_SESSION['Panier']['PrixProduit'][$i];
   }
   return $total;
};

//--------------------------------------------------------------------------
function IsVerrouille(){
//Verifie le verrou
//--------------------------------------------------------------------------
if (isset($_SESSION['Panier']) && $_SESSION['Panier']['verrou'])
   return true;
   else
   return false;
};


//--------------------------------------------------------------------------
function CompterArticles()
//Compte les articles
//--------------------------------------------------------------------------
{
   if (isset($_SESSION['Panier']))
   return count($_SESSION['Panier']['NomProduit']);
   else
   return 0;

};

//--------------------------------------------------------------------------
function SupprimePanier(){
//Supprimer le panier
//--------------------------------------------------------------------------
  unset($_SESSION['Panier']);
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

//--------------------------------------------------------------------------
function AfficherStore() {
//affiche tout les stores
//--------------------------------------------------------------------------
    global $dbc;
    $req = $dbc->prepare('SELECT * FROM  Store  order by IdStore');
    $req->execute();
    return $req->fetchall(PDO::FETCH_ASSOC);
};

?>
