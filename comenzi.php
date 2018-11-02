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
        <title>Magazin acvaristică</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="fav.ico">
        <script src="scripts/es5-sham.min.js"></script>
        <script src="scripts/es5-shim.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav id="startpage" class="nav">
                <ul>
                    <li><a href="admin.php">Pagina de start</a></li>
                </ul>
        </nav>
        <?php
            if(!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if($value=='delete'){
                        $dbc= dbc();
                        $query="DELETE FROM orders WHERE id=$key";
                        $r=mysqli_query($dbc, $query);
                    }
                }
            }
            $dbc= dbc();
            $query="SELECT * FROM orders ORDER BY id";
            $r=mysqli_query($dbc, $query);
            echo '<table>';
            echo '<tr>
                    <th>id</th>
                    <th>email</th>
                    <th>articol</th>
                    <th>cantitate</th>
                    <t></td>
                  </tr>';
            foreach ($_POST as $key=>$value){
                if($value=='qs'){
                    $quant[]=$key;
                }
            }
            while($row= mysqli_fetch_array($r)){
                echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>    
                        <td><form action=comenzi.php method=POST>
                                <input type=hidden name=$row[0] value='delete'>
                                <input class=itst type=submit value=Șterge>
                            </form>
                        </td>
                    </tr>";
            }
            echo '</table>';
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