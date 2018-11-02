<?php
    if(isset($_GET['elem'])){
        setcookie($_GET['elem'],FALSE);
    }
    header('Location:comanda.php');
?>