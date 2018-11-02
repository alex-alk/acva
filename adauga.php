<?php 
    ob_start();
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Pagină admin</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-filestyle.min.css">
        <link rel="stylesheet" href="jqte/jquery-te-1.4.0.css">
        <link rel="shortcut icon" href="fav.ico">
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="scripts/jquery-filestyle.min.js"></script>
        <script src="jqte/jquery-te-1.4.0.min.js"></script>
        <script src="scripts/script-adauga.js"></script>
        <link rel="stylesheet" href="css/style-adauga.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav id="navinreg" class="nav">
            <ul>
                <li><a href="admin.php">Pagina de start</a></li>
            </ul>
        </nav>
        <main id="scriptadd">
            <form name="add" action="adaugaproc.php" method="POST" enctype="multipart/form-data">
                    <table id="table">
                        <tr>
                            <td id="fileaddt">
                                <input type="file" name="file" class="jfilestyle" id="fileadd" required>
                                <p>Dim: 144px X 144px</p>
                            </td>
                        <tr>
                            <td> 
                                <input type="text" name="name" placeholder="Nume" style="width: 11em;" required title="denumirea articolului">
                            </td>
                        <tr>
                            <td>
                                Preț: <input type="text" name="pret" size="5" required> lei
                            </td>
                        </tr>
                        <tr>
                            <td class="bottom"></td>
                        </tr>
                    </table>
                <label for="category" id="categoryl">Categorie:</label>
                <select id="category" name="category">
                    <option value="Pești">Pești</option>
                    <option value="Hrană">Hrană</option>
                    <option value="Accesorii">Accesorii</option>
                    <option value="Acvarii">Acvarii</option>
                </select>
                <span id="ldesc">Descriere:</span>
                <div id="textc">
                    <textarea name="description" id="description" placeholder="Descriere" required></textarea>
                </div>
                <input type="submit" name="enter" value="Adaugă" id="addadd">
            </form>
        </main>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['ok'])){
        ob_end_flush();
    }else{
        ob_end_clean();
    }