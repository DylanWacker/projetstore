<?php
/*
  Page     : index.php
  Auteur   : Dylan's
  Fonction : Index
 */
require '_header.php';
include 'Mysql.php';
include 'Fonction.php';
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
            if (!empty($_POST) && !empty($_POST['Email'])) {
                $req = $dbc->prepare('SELECT * FROM client WHERE Email = ?');
                $req->execute([$_POST['Email']]);
                $Client = $req->fetch();
                if ($Client) {
                    $Reset_token = Str_random(60);
                    $req = $dbc->prepare('UPDATE client SET Reset_token = ?, Reset_at = NOW() WHERE IdClient = ?');
                    $req->execute([$Reset_token, $Client['IdClient']]);
                    //$_SESSION['Flash']['Success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
                    echo 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
                    $data = mail($_POST['Email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/reset.php?id={$Client['IdClient']}&token=$Reset_token");
                    print_r($data);
                    die();
                    ?>
                    <SCRIPT LANGUAGE = "JavaScript">
                        //   document.location.href = "index.php"
                    </SCRIPT>  
                    <?php
                    exit();
                } else {
                    $_SESSION['Flash']['Danger'] = 'Aucun compte ne correspond à cet adresse';
                }
            }
            ?>

            <h1>Mot de passe oublié</h1>

            <form action="" method="POST">


                <label for="">Email</label>
                <input type="email" name="Email" />


                <button type="submit" class="btn btn-primary">Envoyer</button>

            </form>

        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>