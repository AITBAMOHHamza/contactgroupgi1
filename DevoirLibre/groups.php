<?php
include_once('config/config.php');
include_once('config/db.php');

if (isset($_GET["id"]))
    $deleted_id = mysqli_real_escape_string($conn, $_GET["id"]);
if (isset($_POST['delete'])) {
    $deleted_id =  mysqli_real_escape_string($conn, $_POST['deleted_id']);
    $query = "DELETE FROM `group` WHERE id={$deleted_id}";
    if (mysqli_query($conn, $query)) {
        header('location:groups.php');
    } else {
        echo 'ERROR :' . mysqli_error($conn);
    }
}
$query = 'SELECT * FROM `group`';
$result = mysqli_query($conn, $query);
$groups = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
include('inc/header.php');
?>
<div class="container">
    <br>
    <h1>Groupes</h1>
    <br>
    <?php foreach ($groups as $group) : ?>
        <div class="well">
            <h4><?php echo $group['name']; ?></h4>
            <img src="images/<?php echo $group['picture']; ?>" alt="picture group" class="img-thumbnail" style=" width:  200px;height: 200px;">
            <a href="<?php echo ROOT_URL . 'add.php?id=' . $group['id']; ?>" class="btn btn-warning btn-sm" style="float: right;">Ajouter des membres</a>
            <a href="<?php echo ROOT_URL . 'group.php?id=' . $group['id']; ?>" class="btn btn-info btn-sm" style="float: right;">Voir les membres du groupe</a> <br> <br> <br>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="deleted_id" value="<?php echo $group['id'] ?>">
                <input type="submit" value="Suprimer" name="delete" class="btn btn-danger btn-sm" style="float: right;">
            </form>
            <br>
            <br>
            <br>
            <br><br><br><br><br><br>
        </div>
    <?php endforeach; ?>
    <div style=" float:right">
        <a href="addgroup.php">
            Ajouter un groupe
            <img src="icons/add.png" alt="" style=" width:  25px;height: 25px;">
        </a>
    </div>
</div>
<?php include('inc/footer.php'); ?>