<?php
$conn = mysqli_connect('localhost', 'root', '', 'contact_database');
if (mysqli_connect_errno()) {
    echo 'failed to connect' . mysqli_connect_errno();
}
