<?php
include_once('config/config.php');
include_once('config/db.php');
include('inc/header.php'); ?>
<?php
if (isset($_GET["id"]))
    $id_group = mysqli_real_escape_string($conn, $_GET["id"]); ?>
<div class="container">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Le contact est bien crée</h4>
        <hr>
        <a href="group.php?id=<?php echo $id_group ?>"> cliquez pour voir les membres du contact</a>
    </div>
</div>
<?php include('inc/footer.php'); ?>