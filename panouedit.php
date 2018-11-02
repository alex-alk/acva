<?php 
    require 'dbc.php';
?>
<?php 
    ob_start();
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        foreach($_POST as $key=>$value){
            if($value=='artDelete'){
                $dbc = dbc();
                $queryim = "SELECT image FROM articol WHERE id='$key'";
                $resultim = mysqli_query($dbc, $queryim);
                $rowim = mysqli_fetch_array($resultim);
                $queryname = "SELECT name FROM articol WHERE id='$key'";
                $resultname = mysqli_query($dbc, $queryname);
                $rowname = mysqli_fetch_array($resultname);
                $queryprice = "SELECT price FROM articol WHERE id='$key'";
                $resultprice = mysqli_query($dbc, $queryprice);
                $rowprice = mysqli_fetch_array($resultprice);
                $querycat = "SELECT category FROM articol WHERE id='$key'";
                $resultcat = mysqli_query($dbc, $querycat);
                $rowcat = mysqli_fetch_array($resultcat);
                $querydesc = "SELECT description FROM articol WHERE id='$key'";
                $resultdesc = mysqli_query($dbc, $querydesc);
                $rowdesc = mysqli_fetch_array($resultdesc);
                $id=$key;
            }
        }
    }
?>
<!doctype html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Pagină admin</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-filestyle.min.css">
        <link rel="stylesheet" href="jqte/jquery-te-1.4.0.css">
        <link rel="shortcut icon" href="fav.ico">
        <script src="scripts/jquery-3.2.1.min.js"></script>
        <script src="scripts/jquery-filestyle.min.js"></script>
        <script src="jqte/jquery-te-1.4.0.min.js"></script>
        <script src="scripts/script-panouedit.js"></script>
        <link rel="stylesheet" href="css/style-edit.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav id="navinreg" class="nav">
            <ul>
                <li><a href="admin.php">Pagina de start</a></li>
            </ul>
        </nav>
        <main id="scriptadd">
            <form name="add" action="editaretmp.php" method="POST" enctype="multipart/form-data">
                
                    <table id="table">
                        <tr><td id="fileaddt">
                                <img src="images/<?php if(!empty($rowim['image'])){print "{$rowim['image']}.jpg";}?>" alt="img" title="<?php if(!empty($rowim['image'])){print "{$rowim['image']}.jpg";}?>">
                                <input type="file" name="file" class="jfilestyle" id="fileadd">
                            </td>
                        <tr><td> 
                                <input type="text" name="name" value="<?php if(!empty($rowname['name'])){$namespec= htmlspecialchars($rowname['name']);echo $namespec;}?>" style="width: 11em;" required title="denumirea articolului">
                            </td><tr><td>
                                Preț: <input type="number" name="pret" size="5" value=<?php if(!empty($rowprice['price'])){$pricespec= htmlspecialchars($rowprice['price']);echo $pricespec;}?> style="width: 4em;" required> lei
                            </td></tr>
                        <tr ><td class="bottom">
                    </table>
                <label for="category" id="categoryl">Categorie:</label>
                <select id="category" name="category">
                    <option value="<?php if(!empty($rowcat['category'])){echo $rowcat['category'];}?>"><?php if(!empty($rowcat['category'])){echo $rowcat['category'];}?></option>
                    <option value="Pești">Pești</option>
                    <option value="Hrană">Hrană</option>
                    <option value="Accesorii">Accesorii</option>
                    <option value="Acvarii">Acvarii</option>
                </select>
                <div id="ldesc">Descriere:</div>
                <div id="textc">
                    <textarea name="description" id="description" cols="50" rows="5" required><?php if(!empty($rowdesc['description'])){$descspec= htmlspecialchars($rowdesc['description']);echo $descspec;}?></textarea>
                </div>
                <input type='hidden' name='<?php if(!empty($rowim['image'])){print $rowim['image'];}?>' value='img'>       
                <input type='hidden' name='<?php echo $key;?>' value="id" >
                <input type="submit" name="enter" value="Editare" id="addadd">
                </form>
        </main>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['ok'])){
        ob_end_flush();
    }else{
        ob_end_clean();
    }
