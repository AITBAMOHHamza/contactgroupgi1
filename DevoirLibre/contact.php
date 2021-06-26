<?php
include_once('config/config.php');
include_once('config/db.php');
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM contact WHERE id =" . $id;
$result = mysqli_query($conn, $query);
$contact = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
include('inc/header.php');
?>
<div>
    <h1>Contact</h1>
    <div class="container">
        <h4><?php echo $contact['nom'] . ' ' . $contact['prenom']; ?></h4>
        <ul class="list-group">
            <li class="list-group-item">
                <?php echo 'nom : ' . $contact["nom"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo ' prenom :' . $contact["prenom"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'telephone 1 :' . $contact["telephone1"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'telephone 2 :' . $contact["telephone2"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'adresse :' . $contact["adresse"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'email personnel :' . $contact["emailpersonnel"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'email professionnel :' . $contact["emailprofessionnel"]; ?>
            </li>
            <li class="list-group-item">
                <?php echo 'genre :' . $contact["genre"]; ?>

            </li>
            <li class="list-group-item">
                <?php echo 'photo:'; ?>
                <img src="<?php echo ROOT_URL . 'images/' . $contact["photo"]; ?>" width="200px" style="float: right;">

            </li>
        </ul>
        <a href="<?php echo ROOT_URL . 'editdelete.php?id=' . $contact['id']; ?>" class="btn btn-info">Modifier</a>
        <form action="delete.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="deleted_id" value="<?php echo $contact['id'] ?>">
            <input type="submit" value="Suprimer" name="delete" class="btn btn-danger">
        </form>
    </div>

</div>
<?php include('inc/footer.php'); ?>