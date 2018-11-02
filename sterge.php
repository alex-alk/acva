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
        <script src="scripts/script-index.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav id="startpage" class="nav">
                <ul>
                    <li><a href="admin.php">Pagina de start</a></li>
                </ul>
        </nav>
        <form action="sterge.php" method="GET" name="form" id="form">
            <input type="submit" value="Caută:" id="mainsub">
            <input type="text" name=search id="maintext" value="<?php if(!empty($_GET['search'])){
            echo htmlspecialchars(trim($_GET['search']));}
            if(!empty($_GET)){
                foreach($_GET as $skey=>$svalue){
                    if($svalue=='searchbox'){
                        $word=$skey;
                        echo htmlspecialchars($word);
                    }
                }
            }?>">
           
        
        <aside id="aside">
            <!--[if IE]><div id="aside"><![endif]-->
            
            <p style="font-size:1.2em;">Categorii:</p><br>
            <input type="checkbox" name="Pești" value="Pești" id="fish" onclick="this.form.submit()" <?php if(isset($_GET['Pești'])){print "checked";}?>>
            <label for="fish">Pești</label><br>
            <input type="checkbox" name="Hrană" value="Hrană" id="food" onclick="this.form.submit()" <?php if(isset($_GET['Hrană'])){print "checked";}?>>
            <label for="food">Hrană</label><br>
            <input type="checkbox" name="Accesorii" value="Accesorii" id="accessories" onclick="this.form.submit()" <?php if(isset($_GET['Accesorii'])){print "checked";}?>>
            <label for="accessories">Accesorii</label><br>
            <input type="checkbox" name="Acvarii" value="Acvarii" id="aquariums" onclick="this.form.submit()" <?php if(isset($_GET['Acvarii'])){print "checked";}?>>
            <label for="aquariums">Acvarii</label><br>
            <p style="font-size:1.2em;">Sortare:</p><br>
            <input type="radio" name="iname" value="iname" id="namel" onclick="this.form.submit()" <?php 
                                                                                            if(isset($_GET['iname'])){
                                                                                                if($_GET['iname']=='iname'){
                                                                                                    print "checked";
                                                                                                }}else if(!empty ($_GET)){
                                                                                                foreach ($_GET as $getkeyn=>$getvaluen){
                                                                                                    if($getvaluen=='categ'){
                                                                                                        if($getkeyn=='name'){
                                                                                                            echo "checked";
                                                                                                            $getkeyn='name';
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                                ?>>
            <label for="namel" id='namell'>Nume</label><br>
            <input type="radio" name="iname" value="iprice" id="pricel" onclick="this.form.submit()" <?php 
                                                                                            if(isset($_GET['iname'])){
                                                                                                if($_GET['iname']=='iprice'){
                                                                                                    print "checked";
                                                                                                }
                                                                                            }else if(!empty ($_GET)){
                                                                                                foreach ($_GET as $getkey=>$getvalue){
                                                                                                    if($getvalue=='categ'){
                                                                                                        if($getkey=='price'){
                                                                                                            $getkey='price';
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                                    ?>>
            <label for="pricel" id='pricell'>Preț</label><br>
            
            
            </form>
            <!--[if IE]></div><![endif]-->
        </aside>
        <main id="main" class="main">
        <!--[if IE]><div id="main" class="main"><![endif]-->
        <?php
        $curPage=1;
        if(!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if($value=='artDelete'){
                        $dbc = dbc();
                        $query1="SELECT image FROM articol WHERE id='$key'";
                        $query="DELETE FROM articol WHERE id='$key'";
                        $r1=mysqli_query($dbc, $query1);
                        while($row1= mysqli_fetch_array($r1)){
                            unlink("images/{$row1['image']}.jpg");
                        }
                        $r=mysqli_query($dbc, $query);  
                    }
                }
            }
        $dbc = dbc();
        $category1='';
        $category2='';
        $category3='';
        $category4='';
        global $selected;
        global $typeSelected;
        global $curPage;
        if(isset($_GET['Pești'])){
            $category1='Pești';
            $selected=true;
        }
        if(isset($_GET['Hrană'])){
            $category2='Hrană';
            $selected=true;
        }
        if(isset($_GET['Accesorii'])){
            $category3='Accesorii';
            $selected=true;
        }
        if(isset($_GET['Acvarii'])){
            $category4='Acvarii';
            $selected=true;
        }
        if(isset($_GET['iname'])){
            if($_GET['iname']=='iname'){
                $typeSelected='name';
            }else{
                $typeSelected='price';
            }
        }else{$typeSelected='name';}
        if(!empty($_GET)){
            foreach($_GET as $keyo=>$valo){
                if($valo=='categ'){
                    $typeSelected=$keyo;
                }
            
            }
        }
        $dbc = dbc();
                
        
        
        
            function sorting($type){
                    global $dbc;
                    global $category1;
                    global $category2;
                    global $category3;
                    global $category4;
                    global $NumOfPages;
                    global $word;
                    $s='';
                    if(!empty($_GET['search'])){$s= mysqli_real_escape_string($dbc, trim($_GET['search']));}
                    if(!empty($word)){$s= mysqli_real_escape_string($dbc, $word);}
                    $query="SELECT * FROM articol WHERE  (category = '$category1' OR category = '$category2' OR category = '$category3' OR category = '$category4') AND name LIKE '%$s%' ORDER BY $type ASC";
                    global $getkey;
                    $r=mysqli_query($dbc, $query);
                    $i=0;
                    while($row= mysqli_fetch_array($r)){
                        $namespecial= htmlspecialchars($row['name']);
                        $pricespecial= htmlspecialchars($row['price']);
                        $art[]= "<figure id='figures'>"."<!--[if IE]><span id='figure'><![endif]-->"
                            ."<img id=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                            ."<figcaption id='figcaption'>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                            ."<p class='name'>$namespecial</p>"
                            ."<p class=delprice>Preț: <span> $pricespecial</span></p>"
                            ."<form action=sterge.php method=POST class=delform>"
                                ."<input type=hidden name={$row['id']} value='artDelete'>"
                                ."<input type=submit value=Șterge class=delsub>"
                        ."</form>"
                            ."<!--[if IE]></div><![endif]-->"
                            ."</figcaption>"."<!--[if IE]></span><![endif]-->"
                            ."</figure>";
                                $i++;
                    }$NumOfPages=ceil($i/15.0);
                    if(!empty($art)){
                        foreach($art as $akey=>$avalue){
                            global $curPage;
                            if($akey>=($curPage-1)*15&&$akey<$curPage*15){
                                echo $avalue;
                            }
                        }
                    }else {echo '<h3 style="text-indent:2em;">Căutarea nu a generat nici un rezultat.<h3>';}
                        
                }
                #Page counting 
                $curPage=1;
                if(!empty($_GET)){
                    foreach($_GET as $gkey=>$gvalue){
                        if($gvalue=='->'){
                            $curPage=$gkey;
                        }
                        if($gvalue=='<-'&&$curPage>=1){
                            $curPage=$gkey;
                        }
                        if($gvalue=='<<-'){
                            $curPage=1;
                        }
                        if($gvalue=='->>'){
                            $curPage=$gkey;
                        }
                    }    
                }
                    
                
                
                
            if($selected){
                sorting("$typeSelected");
            }else{if(!empty($_GET)){
                foreach($_GET as $a=>$b){
                    if($b=='categ'){
                        $typeSelected=$a;
                    }
                }
                if(empty($typeSelected)){
                    $typeSelected=$getkey;
                }
                $s='';
                    if(isset($_GET['search'])){$s= mysqli_real_escape_string($dbc, trim($_GET['search']));}
                $query="SELECT * FROM articol WHERE name LIKE '%$s%'  ORDER BY $typeSelected ASC";
                if(!empty($word)){$s= mysqli_real_escape_string($dbc, $word);}
                $r=mysqli_query($dbc, $query);
                $i=0;
                $firstIndex=($curPage-1)*15+1;
                while($row= mysqli_fetch_array($r)){
                    $namespecial= htmlspecialchars($row['name']);
                        $pricespecial= htmlspecialchars($row['price']);
                    $art[]= "<figure id='figures'>"."<!--[if IE]><span id='figure'><![endif]-->"
                        ."<img id=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                        ."<figcaption id='figcaption'>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                        ."<p class='name'>$namespecial</p>"
                        ."<p class=delprice>Preț: <span> $pricespecial</span></p>"
                            ."<form action=sterge.php method=POST class=delform>"
                                ."<input type=hidden name={$row['id']} value='artDelete'>"
                                ."<input type=submit value=Șterge class=delsub>"
                        ."</form>"
                            ."<!--[if IE]></div><![endif]-->"
                            ."</figcaption>"."<!--[if IE]></span><![endif]-->"
                            ."</figure>";
                                $i++;
                    }$NumOfPages=ceil($i/15.0);
                if(!empty($art)){
                    foreach($art as $akey=>$avalue){
                        global $curPage;
                        if($akey>=($curPage-1)*15&&$akey<$curPage*15){
                            echo $avalue;
                        }
                    }
                       
                }else {echo '<h3 style="text-indent:2em;">Căutarea nu a generat nici un rezultat.<h3>';}
            }}
            #nothing selected
            if(empty($_GET)){
                $dbc = dbc();
                $i=0;
                $query="SELECT * FROM articol ORDER BY name ASC";
                $r=mysqli_query($dbc, $query);
                $firstIndex=($curPage-1)*15+1;
                while($row= mysqli_fetch_array($r)){
                    if($firstIndex<=$curPage*15){
                        $namespecial= htmlspecialchars($row['name']);
                        $pricespecial= htmlspecialchars($row['price']);
                    echo "<figure id='figures'>"."<!--[if IE]><span id='figure'><![endif]-->"
                        ."<img id=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                        ."<figcaption id='figcaption'>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                        ."<p class='name'>$namespecial</p>"
                        ."<p class=delprice>Preț: <span> $pricespecial</span></p>"
                            ."<form action=sterge.php method=POST class=delform>"
                                ."<input type=hidden name={$row['id']} value='artDelete'>"
                                ."<input type=submit value=Șterge class=delsub>"
                        ."</form>"
                            ."<!--[if IE]></div><![endif]-->"
                            ."</figcaption>"."<!--[if IE]></span><![endif]-->"
                            ."</figure>";
                                $firstIndex++;
                    }
                    $i++;
                }
                $NumOfPages=ceil($i/15.0);
            }    
            
            mysqli_close($dbc);
            ?>
        <!--[if IE]></div><![endif]-->    
        </main>
        <form action='sterge.php' method="GET" id="paging">
           
            <input type="submit" name='<?php echo $curPage;?>' value="<<-" class="i">
            <input type="submit" name='<?php $c=1;if($curPage>2){$c=$curPage-1;}echo $c;?>' value="<-" class="i">
            
           
            <?php if($typeSelected=='name'){$types='name';}else{$types='price';}?>
            Pagina <?php echo $curPage?> din <?php echo $NumOfPages;?>
            <input type="hidden" name='<?php echo $types;?>' value='categ'>
            <input type="hidden" name='<?php
                if(isset($category1)){echo $category1;}?>' value=pesti>
            <input type="hidden" name='<?php
                if(isset($category2)){echo $category2;}?>' value=hrana>
            <input type="hidden" name='<?php
                if(isset($category3)){echo $category3;}?>' value=acvarii>
            <input type="hidden" name='<?php
                if(isset($category4)){echo $category4;}?>' value=accesorii>
            <input type="hidden" name='<?php
                if(isset($_GET['search'])){echo htmlentities(trim($_GET['search']));}
                if(!empty($word)){echo $word;}?>' value=searchbox>
            <input type="submit" name='<?php $cf=$curPage;if($curPage<$NumOfPages){$cf=$curPage+1;} echo $cf;?>' value="->" class="i">
            <input type="submit" name='<?php echo $curPage;?>' value="->>" class="i">
           
            
        </form>
        <footer>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </footer>
    </body>
</html>
<?php
    session_start();
    if(isset($_SESSION['ok'])){
        ob_end_flush();
    }else{
        ob_end_clean();
    }