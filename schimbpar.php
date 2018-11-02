<?php 
    require 'dbc.php';
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Pagină admin</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
        <link rel="shortcut icon" href="fav.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $oldpass=$_POST['oldpass'];
                $newpass=$_POST['newpass'];
                $newnewpass=$_POST['newnewpass'];
                if($newnewpass==$newpass){
                    $dbc= dbc();
                    $newpassreal= mysqli_real_escape_string($newpass);
                    $query="SELECT pass FROM admin";
                    $result= mysqli_query($dbc, $query);
                    $poll= mysqli_fetch_array($result);
                    if($oldpass==$poll[0]){
                        $query="UPDATE admin SET pass='$newpassreal'";
                        $result= mysqli_query($dbc, $query);
                        echo "<p>&nbsp Parola a fost schimbată.";
                    } else {
                        echo '<main id="script" class="main">
                            <form name="enter" action="schimbpar.php" method="POST" id="form">
                                <label for="oldpass">Vechea parolă:</label>
                                <input type="text" name="oldpass" id="oldpass" autofocus title="câmp obligatoriu" required>
                                <span style="color:red;" id="usernamespan">Parola este incorectă!</span>
                                <label for="newpass">Noua parolă:</label>
                                <input type="text" name="newpass" id="newpass" title="câmp obligatoriu" required>
                                <span id="passwordspan">&nbsp;</span>
                                <label for="parola">Repetați noua parolă:</label>
                                <input type="text" name="newnewpass" id="newnewpass" title="câmp obligatoriu" required>
                                <span id="passwordspanr">&nbsp;</span>
                                <input type="submit" name="enter" value="Schimbă parola" id="entersch">
                            </form>
                        </main>';
                    }
                } else {
                   echo '<main id="script" class="main">
                        <form name="enter" action="schimbpar.php" method="POST" id="form">
                            <label for="oldpass">Vechea parolă:</label>
                            <input type="text" name="oldpass" id="oldpass" autofocus title="câmp obligatoriu" required>
                            <span id="usernamespan">&nbsp;</span>
                            <label for="newpass">Noua parolă:</label>
                            <input type="text" name="newpass" id="newpass" title="câmp obligatoriu" required>
                            <span id="passwordspan">&nbsp;</span>
                            <label for="parola">Repetați noua parolă:</label>
                            <input type="text" name="newnewpass" id="newnewpass" title="câmp obligatoriu" required>
                            <span style="color:red;" id="passwordspanr">Parolele nu corespund!</span>
                            <input type="submit" name="enter" value="Schimbă parola" id="entersch">
                        </form>
                    </main>'; 
                }

            }
        ?>    
    </body>
</html>