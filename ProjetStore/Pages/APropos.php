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
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam egestas venenatis tellus, vitae ultrices mi convallis vel. Aliquam suscipit dui a felis mollis semper. Nulla placerat gravida sem quis convallis. Mauris pharetra feugiat viverra. Cras pharetra congue commodo. In vel porta ipsum. Curabitur interdum nisl ac tortor efficitur, a faucibus lectus suscipit. Fusce magna magna, viverra quis commodo ut, dignissim dictum lectus. Integer tempor vestibulum tristique.
<br/><br/>
Cras bibendum sed lorem nec imperdiet. Etiam id pretium arcu. Nam pharetra suscipit diam quis egestas. Cras at pellentesque nunc. Vivamus posuere tristique lectus sit amet porttitor. Quisque laoreet ex id dui ornare, vel elementum ex iaculis. Pellentesque ac ante quis diam commodo laoreet ac at odio. Fusce varius justo mauris, a dictum eros laoreet sit amet. Fusce interdum lobortis tortor in dictum. Suspendisse potenti. Praesent finibus pharetra erat, nec tempus dui pretium eu. Nullam vel felis nec mauris rutrum facilisis vitae id orci.
<br/><br/>
Fusce nec interdum tortor. Maecenas tortor dolor, vulputate in ipsum vel, bibendum rutrum risus. Vivamus fermentum urna vitae nulla placerat mattis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec semper, turpis nec gravida fermentum, lectus ex ornare sapien, sed laoreet tortor nibh sed tortor. Quisque faucibus luctus nibh. Nam ac tortor nunc. Nunc viverra imperdiet eros at pellentesque. Morbi viverra tincidunt enim. Nulla porta justo quis gravida posuere. Etiam tempor turpis at mauris convallis, in iaculis massa molestie. Cras at cursus arcu. Curabitur consectetur diam tellus.
<br/><br/>
Quisque ut diam lectus. Etiam et enim vel leo pellentesque venenatis. Suspendisse potenti. Etiam condimentum faucibus ante, quis posuere sem accumsan ac. Vivamus nec nunc metus. Sed ac varius erat. Suspendisse semper eros non nunc maximus, ut tincidunt ligula ultrices. Suspendisse dapibus nisl at aliquet porttitor. Pellentesque convallis congue purus nec tincidunt. Nam sit amet orci dignissim, viverra velit sed, sodales odio. Etiam venenatis nisl a elit consequat viverra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tempor, orci eu consectetur sagittis, urna nibh laoreet magna, non aliquet arcu mi volutpat metus. Vivamus tristique velit vel mollis tempus. Quisque ut mattis justo. Praesent egestas, urna a condimentum ullamcorper, purus tellus lobortis augue, eu vehicula nisi turpis at mi.
<br/><br/>
Vivamus pulvinar libero odio, nec vestibulum dolor rutrum eu. Etiam molestie fermentum neque, quis cursus justo consectetur eget. Integer a cursus augue, quis fringilla nisi. Donec semper felis nec enim euismod mollis. Quisque non aliquam mauris, ut euismod urna. Vivamus cursus elit vitae semper viverra. Integer dapibus lectus nec tincidunt ultrices. Sed faucibus dui ut urna commodo, ut suscipit purus tincidunt. Aliquam maximus elementum arcu at finibus. Vivamus porta ut lacus molestie blandit. Nam vulputate, dolor et venenatis tempus, diam diam condimentum justo, non auctor nibh ante eget nisl. Praesent pellentesque mauris a felis dictum auctor. Nunc consequat, lorem a mattis pellentesque, mauris purus egestas orci, non sagittis risus elit vel nunc. Quisque eleifend nec nunc vitae sollicitudin.


        </section>
        <?php
        include 'Footer.php';
        ?>
    </body>
</html>

