<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
include 'Mysql.php';
include 'Fonction.php';
session_start();
dbConnect();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include 'Head.php';
    ?>
    <body>  

        <!-- jQuery (Necessaire pour Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Ajoute les fichiers bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/MenuNavigation.js"></script>
        <nav>
            <?php
            include './MenuNavigation.php';
            ?> 
        </nav>
        <section>
            <?php
            if (isset($_GET['IdClient']) && isset($_GET['Token'])) {
                $req = $pdo->prepare('SELECT * FROM Client WHERE IdClient = ? AND Reset_token IS NOT NULL AND Reset_token = ? AND Reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
                $req->execute([$_GET['IdClient'], $_GET['Token']]);
                $user = $req->fetch();
                if ($user) {
                    if (!empty($_POST)) {
                        if (!empty($_POST['Mdp']) && $_POST['Mdp'] == $_POST['Mdp2']) {
                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                            $pdo->prepare('UPDATE Client SET MotDePasse = ?, Reset_at = NULL, Reset_token = NULL WHERE IdCLient = ?')->execute([$Mdp, $_GET['IdClient']]);
                            session_start();
                            $_SESSION['Flash']['Success'] = 'Votre mot de passe a bien été modifié';
                            $_SESSION['Auth'] = $Client;
                            header('Location: account.php');
                            exit();
                        }
                    }
                } else {
                    session_start();
                    $_SESSION['flash']['error'] = "Ce token n'est pas valide";
                    header('Location: login.php');
                    exit();
                }
            } else {
                header('Location: login.php');
                exit();
            }
            ?>
            <?php require 'inc/header.php'; ?>

            <h1>Réinitialiser mon mot de passe</h1>

            <form action="" method="POST">

                <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="password" name="Mdp" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="">Confirmation du mot de passe</label>
                    <input type="password" name="Mdp2" class="form-control"/>
                </div>

                <button type="submit" class="btn btn-primary">Réinitialiser votre mot de passe</button>

            </form>
        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>