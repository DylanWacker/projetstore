<?php
$IdClient = $_GET['IdClient'];
$Token = $_GET['Token'];
$req = $pdo->prepare('SELECT * FROM client WHERE idClient = ?');
$req->execute([$IdClient]);
$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $Token ){
    $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $_SESSION['Flash']['Success'] = 'Votre compte a bien été validé';
    $_SESSION['Auth'] = $user;
    header('Location: membres.php');
}else{
    $_SESSION['Flash']['Danger'] = "Ce token n'est plus valide";
    header('Location: index.php');
}