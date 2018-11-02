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
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="scripts/jquery.validate.min.js"></script>
        <script src="scripts/script-inreg.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
         <header id="header">
            <nav id="header_left" class="nav">
                <ul>
                    <li><a href="index.php">Pagina de start</a></li>
                    <li><a href="inreg.php">Înregistrare</a></li>
                    <li><a href="intra.php"><?php if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $user= htmlspecialchars($_SESSION['name']); echo "Utilizator: $user";}?></a></li>
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
        </header>
        <?php ob_start();?>
        <main id="script" class="main">
            <form name="inreg" action="inreg.php" method="POST" id="inreg">
                <label for="lastname">Nume:</label>
                <input type="text" name="lastname" id="lastname" autofocus title="câmp obligatoriu" required value="<?php if(isset($_POST['lastname'])){print htmlspecialchars($_POST['lastname']);};?>">
                <span id="lastnamespan">&nbsp;</span>
                <label for="firstname">Preume:</label>
                <input type="text" name="firstname" id="firstname" title="câmp obligatoriu" required value="<?php if(isset($_POST['firstname'])){print htmlspecialchars($_POST['firstname']);};?>">
                <span id="firstnamespan">&nbsp;</span>
                <label for="email">Adresa de email:</label>
                <input type="email" name="email" id="email" title="câmp obligatoriu" required value="<?php if(isset($_POST['email'])){print htmlspecialchars($_POST['email']);};?>">
                <span id="emailspan">&nbsp;</span>
                <label for="telnumber">Număr de telefon:</label>
                <input type="tel" name="telnumber" id="telnumber" title="câmp obligatoriu" required value="<?php if(isset($_POST['telnumber'])){print htmlspecialchars($_POST['telnumber']);};?>">
                <span id="telspan">&nbsp;</span>
                <label for="password">Parola:</label>
                <input type="password" name="password" id="password" title="câmp obligatoriu" required value="<?php if(isset($_POST['password'])){print htmlspecialchars($_POST['password']);};?>">
                <span id="passwordspan">&nbsp;</span>
                <label for="passconfirm">Confirmați parola:</label>
                <input type="password" name="passconfirm" id="passconfirm" title="câmp obligatoriu" required value="<?php if(isset($_POST['passconfirm'])){print htmlspecialchars($_POST['passconfirm']);};?>">
                <span id="passwordcspan">&nbsp;</span>
                <input type="submit" name="create" id="create" value="Creare cont">
            </form>
        <?php
        $ok = true;
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                if(empty($_POST['lastname'])){
                    $ok = false;
                }else{$familyName=trim($_POST['lastname']);}
                if(empty($_POST['firstname'])){
                    $ok = false;
                }else{$firstName=trim($_POST['firstname']);}
                if(empty($_POST['email'])){
                    $ok = false;
                }else{$email=trim($_POST['email']);}
                if(empty($_POST['telnumber'])){
                    $ok = false;
                }else{$tel=trim($_POST['telnumber']);}
                if(empty($_POST['password'])){
                    $ok = false;
                }
                if(empty($_POST['passconfirm'])){
                    $ok = false;
                }
                if(trim($_POST['password'])!=trim($_POST['passconfirm'])){
                    $ok = false;
                    print '<p style="color:red;">Parolele nu corespund!</p><br>';
                }else{$pass=trim($_POST['password']);}
                $dbc = dbc();
                $familyNamee= mysqli_real_escape_string($dbc, $familyName);
                $firstNamee= mysqli_real_escape_string($dbc, $firstName);
                $emaile= mysqli_real_escape_string($dbc, $email);
                $tele= mysqli_real_escape_string($dbc, $tel);
                $passe= mysqli_real_escape_string($dbc, $pass);
                $querycheck="SELECT email FROM customers";
                $repeat=FALSE;
                $resultcheck = mysqli_query($dbc, $querycheck);
                while($row= mysqli_fetch_array($resultcheck)){
                    foreach($row as $key=>$value){
                        if($value==$emaile){
                            $repeat=TRUE;
                            $ok=FALSE;
                        }
                    }
                }
                if($repeat){
                    echo '<p style="color:red;">Adresa de email există deja! Folosiți o altă adresă.</p><br>';
                }
                if($ok){
                    print 'Contul a fost creat</p>';
                }else {
                    print '<p style="color:red;">Completați toate câmpurile!</p>';
                }
                
            }
        ?>
        </main>
    </body>
</html>
<?php
    if($ok &&$_SERVER['REQUEST_METHOD']=='POST'){ob_end_clean();
        $query = "INSERT INTO customers(id,familyName,firstName,email,tel,pass)VALUES(0,'$familyNamee','$firstNamee','$emaile','$tele','$passe')";
        $result = mysqli_query($dbc, $query);
        mysqli_close($dbc);
        header('Location:inregfin.php');
    }
?>
            