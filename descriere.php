<?php 
    require 'dbc.php';
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Magazin acvaristică</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="fav.ico">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
                    <li><a href="intra.php"><?php  if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $namesp= htmlspecialchars($_SESSION['name']);echo "Utilizator: $namesp";}?></a></li>
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
                    <li id="litel"><a href="tel:0740.000.000" class="tel"><div id=telt>Comenzi telefonice</div><br><span id=tel>0740.000.000</span></a></li>    
                </ul>
            <!--[if IE]></div><![endif]-->
            </nav>
            <img src="images/header.png" alt="header">
            <h1>Magazin acvaristică</h1>
            <!--[if IE]></div><![endif]-->
        </header>
        <main class="main" id="maindesc">
            <?php
                $name=$_GET['name'];
                $dbc = dbc();
                $namereal= mysqli_real_escape_string($dbc, $name);
                $queryimg="SELECT image FROM articol WHERE image='$namereal'";
                $resultimg= mysqli_query($dbc, $queryimg);
                $rowimg= mysqli_fetch_array($resultimg);
                print "<img class='orderimg' src='images/$rowimg[0].jpg'>";
                $queryp="SELECT price FROM articol WHERE image='$namereal'";
                $resultp= mysqli_query($dbc, $queryp);
                $rowp= mysqli_fetch_array($resultp);
                $rowpspec= htmlspecialchars($rowp[0]);
                print "<div id=prices>Preț:<br> $rowpspec lei</div>";
                $queryt="SELECT name FROM articol WHERE image='$namereal'";
                $resultt= mysqli_query($dbc, $queryt);
                $rowt= mysqli_fetch_array($resultt);
                $rowtspec= htmlspecialchars($rowt[0]);
                print "<div class=titledesc>$rowtspec</div>";
                $query="SELECT description FROM articol WHERE image='$namereal'";
                $result= mysqli_query($dbc, $query);
                $row= mysqli_fetch_array($result);
                $rowspec= $row[0];
                print "<div class=desc> $rowspec</div>";
            ?>
        </main>
        <form action="dummy.php" method="POST">
            <input type="submit" name="submitc" value="Adaugă în lista de comezi">
            <input type="hidden" name ="name" value="<?php print $rowimg[0];?>">
            <input type="hidden" name ="title" value="<?php print $name;?>">
            <?php mysqli_close($dbc);?>
        </form>
    </body>
</html>