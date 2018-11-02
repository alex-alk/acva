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
                    <li><a href="intra.php"><?php  if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $user= htmlspecialchars($_SESSION['name']); echo "Utilizator: $user";;}?></a></li>
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
        <?php
            if(empty($_SESSION['name'])){
                echo '<p style="color:red;font-weight:bold;">&nbsp;Pentru a putea trimite comanda, trebuie să vă logați!</p><br>';
            }else{
                foreach ($_POST as $keys=>$values){
                    if($values=='key'){
                        foreach($_POST as $key=>$quantity){
                            if("a$key"==$keys){
                                $quantities[]=$quantity;
                            }
                        }
                    }
                }
                $zero=false;
                foreach ($quantities as $values){
                    if($values=="0"||$values==NULL||$values==''){
                        $zero=true;
                    }
                }
                if(!$zero){
                    $dbc = dbc();
                    echo '<div id=comd>';
                    echo '<table>
                                <tr>
                                    <th>Denumire</th>
                                    <th>Pret</th>
                                    <th>Cantitate</th>
                                    <th>Cost</th>
                                </tr>';
                    foreach($_POST as $key=>$value){
                        if($value=='name'){
                            $queryn="SELECT name FROM articol WHERE id='$key'";
                            $resultn= mysqli_query($dbc, $queryn);
                            while($rown= mysqli_fetch_array($resultn)){
                                $names[]=$rown[0];
                            }    
                        }    
                    }
                    foreach ($_POST as $keys=>$values){
                        if($values=='key'){
                            $keyss= substr($keys, 1);
                            $query="SELECT price FROM articol WHERE image='$keyss'";
                            $result= mysqli_query($dbc, $query);
                            $row= mysqli_fetch_array($result);
                            $prices[]=$row[0];
                        }
                    }
                    foreach ($_POST as $keys=>$values){
                        if($values=='key'){
                            foreach($_POST as $key=>$quantity){
                                if("a$key"==$keys){
                                    $imgnames[]=$key;
                                    $quantities[]=$quantity;
                                }
                            }
                        }
                    }
                    $t=0;
                    
                    foreach($quantities as $key=>$value){
                        foreach ($imgnames as $keys=>$values){
                            if($key==$keys){
                            setcookie("a$values",$value);
                            }
                        }
                    }
                    
                    
                    $q=0;
                    $total=0;
                    foreach ($_POST as $keys=>$values){
                        if($values=='key'){
                            $keyss= substr($keys, 1);
                            $query="SELECT * FROM articol WHERE image='$keyss'";
                            $result= mysqli_query($dbc, $query);
                            while($row= mysqli_fetch_array($result)){
                                $rowspecial2= htmlspecialchars($row[2]);
                                $rowspecial3= htmlspecialchars($row[3]);
                                $cost= floatval($row[3])*intval($quantities[$q]);
                                $total+=$cost;
                                echo "<tr>
                                        <td>$rowspecial2</td>
                                        <td>$rowspecial3</td>
                                        <td>$quantities[$q]</td>
                                        <td>$cost</td>
                                      </tr>";
                            }
                        $q++;
                        }
                    }
                    echo '</table>';
                    echo "<div id=tt>Total: $total lei</div></div>";
                    echo '<form action=confirm.php method=post>';
                    foreach($names as $ks=>$vs){
                        echo "<input type=hidden name='$vs' value='names'>";
                    }
                    foreach($quantities as $ks=>$vs){
                        echo "<input type=hidden name='$vs' value='qs'>";
                    }
                    echo '<input type=submit name=create value=Confirm id=cc>
                         </form>  ';    
                    
                }
                else{
                    echo '<h3>Cantitatea unui articol nu poate fi zero.</h3>';
                }
            }        
        ?>
    </body>
</html>
<?php ob_end_flush();?>