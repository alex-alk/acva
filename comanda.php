<?php ob_start();session_start();
    require 'dbc.php';
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Magazin acvaristică</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="fav.ico">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
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
                    <li><a href="intra.php"><?php if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $user= htmlspecialchars($_SESSION['name']); echo "Utilizator: $user";}?></a></li>
                </ul>
                <!--[if IE]></div><![endif]-->
            </nav>
            <nav id="header_right" class="nav">
            <!--[if IE]><div id="header_right" class="nav"><![endif]-->
                <ul>
                    <li><a href="comanda.php" id="cart">Vizualizare comandă 
                        <?php if(isset($_COOKIE['count'])){
                                $cnt=$_COOKIE['count'];
                                print "($cnt)";
                               }
                        ?>
                        </a>
                    </li>
                </ul>
            <!--[if IE]></div><![endif]-->
            </nav>
           <img src="images/header.png" alt="header">
           <h1>Magazin acvaristică</h1>
           <!--[if IE]></div><![endif]-->
        </header>
        <?php
            print '<form action="comandaconfirm.php" method="POST" name="form">';
            if(!empty($_COOKIE)){
                foreach($_COOKIE as $keya=>$valuea){
                    if($valuea=='art'){
                        $array[]=$keya;
                    }
                }
                $dbc = dbc();
                if(isset($array)){
                    foreach($array as $key=>$value){
                        print '<main class="main" id="mainorders">';
                        print "<img class='orderimg' src='images/$value.jpg'>";
                        $query="SELECT price FROM articol WHERE image='$value'";
                        $result= mysqli_query($dbc, $query);
                        $row= mysqli_fetch_array($result);
                        $price= htmlspecialchars($row[0]);
                        print "<div id=pricesc>Preț:<br> $price lei</div>";
                        $queryn="SELECT name FROM articol WHERE image='$value'";
                        $queryid="SELECT id FROM articol WHERE image='$value'";
                        $resultn= mysqli_query($dbc, $queryn);
                        $resultid= mysqli_query($dbc, $queryid);
                        $rown= mysqli_fetch_array($resultn);
                        $rowid= mysqli_fetch_array($resultid);
                        $title= htmlspecialchars($rown[0]);
                        print "<div id=titlecom>$title</div>";
                        print '<label for="quantity" id=labelq>Cantitatea: </label>';
                        print "<input type=hidden name=$rowid[0] value='name'<br>";
                        print "<input type=hidden name=a$value value='key'>";
                        print "<input type='number' name=$value id='quantity' min='1' max='9999' ";
                        if(!empty($_COOKIE["a$value"])){ 
                            echo "value ={$_COOKIE["a$value"]}";
                        }   
                        print '></main>';
                        echo "<a class=delbut href=comandadummy.php?elem=$value>Elimină</a>";
                    }
                    print '<input type="submit" name="create" value="Trimite comanda" id="crt">'. 
                          '</form>';
                    $count=count($array);
                }
                if(!isset($array)){
                            $count=0;
                }   
                setcookie('count',$count);
                if($count==0){
                    echo '<h3 style="text-indent:1em;">Lista de comenzi este goală.<h3>';
                }
            }
        ?>
    </body>
</html>
<?php ob_end_flush();?>