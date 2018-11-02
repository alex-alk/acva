<?php session_start();
    require 'dbc.php';
?>
<?php
    $ok = true;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(empty($_POST['email'])){
                $ok = false;
            }else{
                $email = trim($_POST['email']);
            }
            if(empty($_POST['password'])){
                $ok = false;
            }else{
                $pass = trim($_POST['password']);
                
            }
        }
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
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="scripts/jquery.validate.min.js"></script>
        <script src="scripts/script-intra.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header id="header">
            <nav id="header_left" class="nav">
                <ul>
                    <li><a href="index.php">Pagina de start</a></li>
                    <li><a href="inreg.php">Înregistrare</a></li>
                    <li><a href="intra.php"><?php  if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $user= htmlspecialchars($_SESSION['name']); echo "Utilizator: $user";}?></a></li>
                </ul>
            </nav>
            <nav id="header_right" class="nav">
                <ul>
                    <li><a href="comanda.php" id="cart">Vizualizare comandă 
                        <?php if(isset($_COOKIE['count'])){
                            $cnt=$_COOKIE['count'];
                        print "($cnt)";}?></a></li>
                </ul>
            </nav>
           <img src="images/header.png" alt="header">
           <h1>Magazin acvaristică</h1>
           <!--[if IE]></div><![endif]-->
        </header>
        <?php ob_start();?>
        <main id="script" class="main">
            <form name="fenter" action="intra.php" method="POST" id="fenter">
                <label for="email">Adresa de email:</label>
                <input type="email" name="email" id="email" autofocus title="câmp obligatoriu" required>
                <span id="emailspan">&nbsp;</span>
                <label for="password">Parola:</label>
                <input type="text" name="password" id="password" title="câmp obligatoriu" required>
                <span id="passwordspan">&nbsp;</span>
                <input type="submit" name="enter" id="enter" value="Intră în cont">
                <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $dbc = dbc();
                        $query = "SELECT email, pass FROM customers";
                        $result = mysqli_query($dbc, $query);
                        $check=false;
                        if(isset($email)&&isset($pass)){
                            $emaile= mysqli_real_escape_string($dbc,$email);
                            $passe= mysqli_real_escape_string($dbc,$pass);
                            while($array = mysqli_fetch_array($result)){
                                if(($array[0]==$emaile&&$array[1]==$passe)){
                                    $check=true;
                                }
                            }
                        }
                        if(!$check){
                        echo '<p style="color:red;">&nbsp;Adresa de email nu corespunde cu parola';
                        }
                    }
                ?>
            </form>
        </main>
        <form action="parola.php" method="post" id="passw">
            <input type="submit" value="Recuperează parola">
        </form>
        
    </body>
</html>
<?php
    if($ok&&$_SERVER['REQUEST_METHOD']=='POST'){
        $dbc = dbc();
        $query = "SELECT email, pass FROM customers";
        $result = mysqli_query($dbc, $query);
        while($array = mysqli_fetch_array($result)){
            if($array[0]==$emaile&&$array[1]==$passe){
                $query = "SELECT * FROM customers WHERE email='$emaile'";
                $result = mysqli_query($dbc, $query);
                $name = mysqli_fetch_array($result);
                session_start();
                $_SESSION['name']=$name[1];
                $querys = "SELECT email FROM customers WHERE familyName='$name[1]'";
                $results = mysqli_query($dbc, $querys);
                $names = mysqli_fetch_array($results);
                $_SESSION['email']=$names[0];
                ob_end_clean();
                $name1= htmlspecialchars($name[1]);
                $name2= htmlspecialchars($name[2]);
                print "<p style='font-weight:bold;text-indent:1em;'>Acum sunteți logat, $name1 $name2.</p>";
            }
        }
        mysqli_close($dbc);
    }
?>
            