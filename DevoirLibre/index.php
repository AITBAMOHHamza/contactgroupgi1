<?php
include_once('config/config.php');
include_once('config/db.php');

$query = 'SELECT * FROM contact';
$result = mysqli_query($conn, $query);
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
include('inc/header.php');
?>
<div>
    <h1>Contacts</h1>
    <?php foreach ($contacts as $contact) : ?>
        <div class="well">
            <h4><?php echo $contact['telephone1'] . ' ' . $contact['prenom']; ?></h4>
            <a href="<?php echo ROOT_URL . 'contact.php?id=' . $contact['id']; ?>" class="btn btn-dark">Voir plus , modifier ou suprimer</a>
        </div>
    <?php endforeach; ?>
    <div style=" float:right">
        <a href="addcontact.php">
            Ajouter un contact
            <img src="icons/add.png" alt="" style=" width:  25px;height: 25px;">
        </a>
    </div>
</div>
<?php include('inc/footer.php'); ?>