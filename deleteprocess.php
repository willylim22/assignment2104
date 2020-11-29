<?php
    $id = $_GET['id'];
    require_once('dbcon.php');
    $sql = 'DELETE FROM `addcollege` WHERE `id`='.$id;
    $result = $con->query($sql);
    echo '<script>alert("Deleted"); window.location="editpage.php";</script>';
?>