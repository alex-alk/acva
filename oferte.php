<?php 
    require 'dbc.php';
?>
<?php 
    ob_start();
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
        <nav id="startpage" class="nav">
                <ul>
                    <li><a href="admin.php">Pagina de start</a></li>
                </ul>
        </nav>
        <nav id="navinreg" class="nav">
            <ul>
                <li><a href="oferteadauga.php">Adaugă oferte</a></li>
            </ul>
        </nav>
        <?php
            $dbc = dbc();
            if(isset($_POST)){
                foreach ($_POST as $k=>$v){
                    if($v=='Șterge'){
                        $query="DELETE FROM offers WHERE image='$k'";
                        $result= mysqli_query($dbc, $query);
                        unlink("images/oferte/$k.jpg");
                    }
                }
            }
            $query="SELECT image FROM offers";
            $result= mysqli_query($dbc, $query);
            while($row= mysqli_fetch_array($result)){
                    $img=$row['image'];
                    echo "<figure style='display:inline-block'>"
                    . "<img src=images/oferte/$img".".jpg alt=img>"
                    ."<figcaption>"
                    ."<form action='oferte.php' method=post>"
                    ."<input type=submit name=$img value=Șterge id=delof>"
                    ."</figcaption></figure>";
            }
        ?>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['ok'])){
        ob_end_flush();
    }else{
        ob_end_clean();
    }