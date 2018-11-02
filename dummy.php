<?php
    $path=$_POST['name'];
    setcookie($path,'art');
    header('Location: comanda.php');
?>