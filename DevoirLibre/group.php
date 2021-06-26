<?php
include_once('config/config.php');
include_once('config/db.php');
if (isset($_GET["id"]))
    $id_group = mysqli_real_escape_string($conn, $_GET["id"]);
$query = "SELECT * FROM contact WHERE group_fk LIKE '$id_group'";
$result = mysqli_query($conn, $query);
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
include('inc/header.php');
?>
<div>
    <h1>le group:</h1>
    <?php foreach ($contacts as $contact) : ?>
        <div class="well">
            <h4><?php echo $contact['telephone1'] . ' ' . $contact['prenom']; ?></h4>
            <a href="<?php echo ROOT_URL . 'contact.php?id=' . $contact['id']; ?>" class="btn btn-dark">Voir plus , modifier ou suprimer</a>
        </div>
    <?php endforeach; ?>
</div>
<?php include('inc/footer.php'); ?>