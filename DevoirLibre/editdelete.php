<?php
include_once('config/config.php');
include_once('config/db.php');
if (isset($_POST['submit'])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $updated_id = mysqli_real_escape_string($conn, $_POST['updated_id']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $tele1 = mysqli_real_escape_string($conn, $_POST['tele1']);
    $tele2 = mysqli_real_escape_string($conn, $_POST['tele2']);
    $adr = mysqli_real_escape_string($conn, $_POST['adr']);
    $epers = mysqli_real_escape_string($conn, $_POST['epers']);
    $epro = mysqli_real_escape_string($conn, $_POST['epro']);
    $genre = $_POST['male'];

    $query = "UPDATE contact SET
                nom='$nom',
                prenom='$prenom',
                photo='$image',
                telephone1='$tele1',
                telephone2='$tele2',
                adresse='$adr',
                emailpersonnel='$epers',
                emailprofessionnel='$epro',
                genre='$genre' 
                WHERE id='$updated_id'";
    if (mysqli_query($conn, $query)) {
        header('location:index.php');
    } else {
        echo 'ERROR :' . mysqli_error($conn);
    }
}
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = 'SELECT * FROM contact WHERE id=' . $id;
$result = mysqli_query($conn, $query);
$contact = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="<?php echo $contact['nom']; ?>">
        </div>
        <div class="form-group">
            <label>Prenom</label>
            <input type="text" name="prenom" class="form-control" value="<?php echo $contact['prenom']; ?>">
        </div>
        <div class=" form-group">
            <label>Photo</label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image" class="form-control" value="<?php echo $contact['image']; ?>">
        </div>
        <div class=" form-group">
            <label>Telephone 1</label>
            <input type="text" name="tele1" class="form-control" value="<?php echo $contact['telephone1']; ?>">
        </div>
        <div class=" form-group">
            <label>Telephone 2</label>
            <input type="text" name="tele2" class="form-control" value="<?php echo $contact['telephone2']; ?>">
        </div>
        <div class=" form-group">
            <label>Adresse</label>
            <input type="text" name="adr" class="form-control" value="<?php echo $contact['adresse']; ?>">
        </div>
        <div class=" form-group">
            <label>Email personnel</label>
            <input type="text" name="epers" class="form-control" value="<?php echo $contact['emailpersonnel']; ?>">
        </div>
        <div class=" form-group">
            <label>Email professionel</label>
            <input type="text" name="epro" value="<?php echo $contact['emailprofessionnel']; ?>" class=" form-control">
        </div>
        <div class=" form-check">
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
            <input type="submit" name="submit" value="Modifier" class="btn btn-primary">
            <input type="hidden" name="updated_id" value="<?php echo $contact['id'] ?>">
        </div>
    </div>
</form>
<?php include('inc/footer.php'); ?>