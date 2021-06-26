<?php
include_once('config/config.php');
include_once('config/db.php');
include('inc/header.php'); ?>
<?php
if (isset($_GET["id"]))
    $id_group = mysqli_real_escape_string($conn, $_GET["id"]); ?>
<div class="container">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Le contact n'existe pas</h4>
        <hr>
        <p>Veuillez creer ce contact <a href="addcontact.php">ici </a> <br> puis l'ajouter dans le groupe</p>
        <a href="group.php?id=<?php echo $id_group ?>"> cliquez pour voir les membres du contact</a>
    </div>
</div>

<?php include('inc/footer.php'); ?>