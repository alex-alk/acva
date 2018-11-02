<?php 
    require 'dbc.php';
?>
<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $dbc = dbc();
        $query = "SELECT username, pass FROM admin";
        $result = mysqli_query($dbc, $query);
        $ok=FALSE;
        while($array = mysqli_fetch_array($result)){
            if($array[0]==$user&&$array[1]==$pass){
                $ok=TRUE;
            }
        }
   }
session_start();
    if(isset($_SESSION['ok'])){
        $ok=TRUE;
     }
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
        <?php ob_start();?>
        <main id="scriptadm">
            <!--[if IE]><div id="scriptadm" class="main"><![endif]-->
            <form name="admin" action="admin.php" method="POST" id="admform">
                <label for="username" style="padding-left: 3em;">Nume de utilizator:</label>
                <input type="email" name="username" id="username" autofocus title="câmp obligatoriu" style="margin-left: 1em;" required>
                <span id="usernamespan">&nbsp;</span>
                <label for="password" style="padding-left: 3em;">Parola:</label><br>
                <input type="password" name="password" id="password" title="câmp obligatoriu" style="margin-left: 1em;" required>
                <span id="passwordspan">&nbsp;</span>
                <input type="submit" name="enter" id="enteracc" value="Intră în cont">
            </form>
            <nav id="navsch" class="nav">
            <ul>
                <li><a href="schimbpar.html">Schimbă parola</a></li>
            </ul>
            </nav>
            <?php if(isset($ok)){
                    if(!$ok){
                        echo 'Numele nu corespunde cu parola!';
                    }
                  }
            ?>
            <!--[if IE]></div><![endif]-->
        </main>
        <?php
            if(isset($ok)){
                if($ok){
                    ob_end_clean();
                    echo '<main id="script">
                            <nav id="navinreg" class="nav">
                                <ul>
                                    <li><a href="adauga.php">Adăugare articol</a></li>
                                    <li><a href="editare.php">Editare articol</a></li>
                                    <li><a href="sterge.php">Ștergere articol</a></li>
                                    <li><a href="comenzi.php">Vizualizare comenzi</a></li>
                                    <li><a href="oferte.php">Oferte</a></li>
                               </ul>
                           </nav>
                          </main>';
                    $_SESSION['ok']='ok';
                }
            } 
        ?>
    </body>
</html>