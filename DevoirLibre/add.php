<?php
include_once('config/config.php');
include_once('config/db.php');

if (isset($_GET["id"]))
    $id_group = mysqli_real_escape_string($conn, $_GET["id"]);
if (isset($_POST['submit'])) {
    $contact_nom = mysqli_real_escape_string($conn, $_POST['contactnom']);
    $contact_prenom = mysqli_real_escape_string($conn, $_POST['contactprenom']);
    $query = "UPDATE `contact`
                SET group_fk = '$id_group' 
                WHERE nom='$contact_nom' OR prenom='$contact_prenom'";
    $res = mysqli_query($conn, $query);
    $query2 = "SELECT * FROM `contact` WHERE nom='$contact_nom' OR prenom='$contact_prenom'";
    if (mysqli_affected_rows($conn) == 1) {
        header('location:bienajoute.php?id=' . $id_group);
    } else {
        header('location:nonajoute.php?id=' . $id_group);
    }
}

include('inc/header.php'); ?>
<form action="<?php echo ROOT_URL . 'add.php?id=' . $id_group; ?>" method="POST" enctype="multipart/form-data">
    <div class="container">
        <h3>Ajouter le contact</h3>
        <div class="form-group">
            <label>nom</label>
            <input type="text" name="contactnom" class="form-control">
            <label>prenom</label>
            <input type="text" name="contactprenom" class="form-control">
            <div class="from-group">
                <input type="submit" name="submit" value="Ajouter" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>
<?php include('inc/footer.php'); ?>