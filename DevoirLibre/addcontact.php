<?php
include_once('config/config.php');
include_once('config/db.php');
if (isset($_POST['submit'])) {
    $msg = "";
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $tele1 = mysqli_real_escape_string($conn, $_POST['tele1']);
    $tele2 = mysqli_real_escape_string($conn, $_POST['tele2']);
    $adr = mysqli_real_escape_string($conn, $_POST['adr']);
    $epers = mysqli_real_escape_string($conn, $_POST['epers']);
    $epro = mysqli_real_escape_string($conn, $_POST['epro']);
    $genre = $_POST['male'];

    $query = "INSERT INTO contact(nom,prenom,photo,telephone1,telephone2,adresse,emailpersonnel,emailprofessionnel,genre) VALUES ('$nom','$prenom','$image','$tele1','$tele2','$adr','$epers','$epro','$genre')";
    move_uploaded_file($tmp_name, $target) ? $msg = 'yes' : $msg = 'no';
    echo $msg;
    if (mysqli_query($conn, $query)) {
        header('location:index.php');
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
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="form-group">
            <label>Prenom</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Telephone 1</label>
            <input type="text" name="tele1" class="form-control">
        </div>
        <div class="form-group">
            <label>Telephone 2</label>
            <input type="text" name="tele2" class="form-control">
        </div>
        <div class="form-group">
            <label>Adresse</label>
            <input type="text" name="adr" class="form-control">
        </div>
        <div class="form-group">
            <label>Email personnel</label>
            <input type="text" name="epers" class="form-control">
        </div>
        <div class="form-group">
            <label>Email professionel</label>
            <input type="text" name="epro" class="form-control">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="male" id="male" value="male">
            <label class="form-check-label" for="exampleRadios1">
                male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="male" id="female" value="female">
            <label class="form-check-label" for="exampleRadios2">
                female
            </label>
        </div>
        <div class="from-group">
            <input type="submit" name="submit" value="Ajouter" class="btn btn-primary">
        </div>
    </div>
</form>
<?php include('inc/footer.php'); ?>