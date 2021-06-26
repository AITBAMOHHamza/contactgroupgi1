<?php
require('config/config.php');
require('config/db.php');
include('inc/header.php'); ?>

<?php if (isset($_POST['submit'])) :  ?>
    <?php $search = htmlspecialchars($_POST['search']);
    $query = "SELECT * FROM contact WHERE nom LIKE '%$search%'
                                        OR prenom LIKE '%$search%'
                                        OR photo LIKE '%$search%'
                                        OR telephone1 LIKE'%$search%'
                                        OR telephone2  LIKE'%$search%'
                                        OR adresse  LIKE'%$search%'
                                        OR emailpersonnel  LIKE'%$search%'
                                        OR emailprofessionnel  LIKE'%$search%'
                                        OR genre  LIKE'%$search%'";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        echo mysqli_error($conn);
    } ?>
    <?php if (mysqli_num_rows($res) > 0) : ?>
        <?php while ($contact = mysqli_fetch_array($res)) : ?>
            <p>
            <h3><?php echo $contact['nom'] . ' ' . $contact['prenom'] ?></h3>
            <a href="<?php echo ROOT_URL . 'contact.php?id=' . $contact['id'] ?>">plus de details</a>
            </p>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>
<?php include('inc/footer.php'); ?>