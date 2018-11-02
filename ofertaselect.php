<?php 
    ob_start();
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Pagină admin</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style-oferte.css">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="scripts/jquery-filestyle.min.js"></script>
        <script src="scripts/script-select.js"></script>
        <link rel="stylesheet" href="css/jquery-filestyle.min.css">
        <link rel="shortcut icon" href="fav.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav id="startpage" class="nav">
                <ul>
                    <li><a href="admin.php">Pagina de start</a></li>
                </ul>
        </nav>
        <form action="ofertadb.php" method="POST" id="fileaddf" enctype="multipart/form-data">
            <input type="file" name="file" class="jfilestyle" id="fileaddo" required>
            <input type="submit" name="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>" value="Adăugare" id="add">
            <p>Dim: 168x400</p>
        </form>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['ok'])){
        ob_end_flush();
    }else{
        ob_end_clean();
    }