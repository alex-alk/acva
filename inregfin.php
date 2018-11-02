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
                    <li><a href="intra.php"><?php session_start(); if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $namesp= htmlspecialchars($_SESSION['name']);echo "Utilizator: $namesp";}?></a></li>
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
        <h3>&nbsp;Înregistrarea s-a efectuat cu succes.</h3>
    </body>
</html>