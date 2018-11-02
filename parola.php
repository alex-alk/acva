<?php session_start();
    require 'dbc.php';
?>      
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Înregistrare</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
        <link rel="shortcut icon" href="fav.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header id="header">
            <!--[if IE]><div id="header"><![endif]-->
            <nav id="header_left" class="nav">
                <!--[if IE]><div id="header_left" class="nav"><![endif]-->
                <ul>
                    <li><a href="index.php">Pagina de start</a></li>
                    <li><a href="inreg.php">Înregistrare</a></li>
                    <li><a href="intra.php"><?php  if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $user= htmlspecialchars($_SESSION['name']); echo "Utilizator: $user";}?></a></li>
                </ul>
                <!--[if IE]></div><![endif]-->
            </nav>
            <nav id="header_right" class="nav">
            <!--[if IE]><div id="header_right" class="nav"><![endif]-->
                <ul>
                    <li><a href="comanda.php" id="cart">Vizualizare comandă 
                        <?php if(isset($_COOKIE['count'])){
                            $cnt=$_COOKIE['count'];
                        print "($cnt)";}?></a></li>
                </ul>
            <!--[if IE]></div><![endif]-->
            </nav>
           <img src="images/header.png" alt="header">
           <h1>Magazin acvaristică</h1>
           <!--[if IE]></div><![endif]-->
        </header>
        <main id="script" class="main">
        <!--[if IE]><div id="script" class="main"><![endif]-->
            <form name="fenter" action="parola.php" method="POST" id="fenter">
                <label for="email">Adresa de email:</label>
                <input type="email" name="email" id="email" autofocus title="câmp obligatoriu" required>
                <span id="emailspan">&nbsp;</span>
                <input type="submit" name="enter" id="enter" value="Recuperează parola" style="width: 11em;margin-top: 0em;">
            <?php 
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(!empty($_POST['email'])){
                        $dbc = dbc();
                        $email= mysqli_real_escape_string($dbc, $_POST['email']);
                        $check=FALSE;
                        $query = "SELECT email FROM customers";
                        $result = mysqli_query($dbc, $query);
                        while($array = mysqli_fetch_array($result)){
                            if(($array[0]==$email)){
                                $check=true;
                            }
                        }
                        if(!$check){
                                echo '<p style="color:red;">&nbsp;'
                                . 'Adresa de email nu există in baza de date';
                            }
                        if($check){
                            $query = "SELECT pass FROM customers WHERE email='$email'";
                            $result = mysqli_query($dbc, $query);
                            $array = mysqli_fetch_array($result);
                            $msg="Parola dvs este: $array[0]";
                            mail("$email","Parola",$msg);
                            echo " <p> Un email cu parola dvs. a fost trimis.<p>";
                        }            
                    }
                }?>
                <!--[if IE]></div><![endif]-->
            </form>
        </main>
    </body>
</html>

            