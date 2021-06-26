<?php
include_once('config/config.php');
include_once('config/db.php');
if (isset($_POST['submit'])) {
    $msg = "";
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $nom = mysqli_real_escape_string($conn, $_POST['nomgrp']);
    $query = "INSERT INTO `group` (name,picture) VALUES ('$nom','$image')";
    move_uploaded_file($tmp_name, $target) ? $msg = 'yes' : $msg = 'no';
    if (mysqli_query($conn, $query)) {
        header('location:groups.php');
    } else {
        echo 'ERROR :' . mysqli_error($conn);
    }
}

?>
<?php include('inc/header.php'); ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nomgrp" class="form-control">
            <div class="form-group">
                <label>icon</label>
                <input type="hidden" name="size" value="1000000">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="from-group">
                <input type="submit" name="submit" value="Créer" class="btn btn-primary">
            </div>
        </div>
</form>
<?php include('inc/footer.php'); ?>