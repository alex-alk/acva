<?php session_start();?>
<?php require 'dbc.php';?>
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
        <script src="scripts/script-index.js"></script>
        <meta name="description" content="Magazin online cu pesti de acvariu, hrana, accesorii si acvarii.">
        <meta name="keywords" content="magazin acvaristică, de vânzare, pești, acvariu, acvaristica, accesorii, hrana, pesti de acvariu">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container hidden" id="warning">
                <div class="alert alert-dark alert-dismissable fade show"><a href="#" class="close" data-dismiss="alert" aria-label="close" id="cookie">&times;</a>Acest site este fictiv!</div>
         </div>
        <header id="header">
            <nav id="header_left" class="nav">
                <ul>
                    <li><a href="index.php">Pagina de start</a></li>
                    <li><a href="inreg.php">Înregistrare</a></li>
                    <li><a href="intra.php"><?php  if(empty($_SESSION['name'])){echo 'Intră în cont';}else{ $namesp= htmlspecialchars($_SESSION['name']);echo "Utilizator: $namesp";}?></a></li>
                </ul>
            </nav>
            <nav id="header_right" class="nav">
                <ul>
                    <li><a href="comanda.php" id="cart">Vizualizare comandă
                        <?php if(isset($_COOKIE['count'])){
                            $cnt=$_COOKIE['count'];
                        print"($cnt)";}?></a></li>
                    <li id="litel"><a href="tel:0740.000.000" class="tel"><div id=telt>Comenzi telefonice</div><br><span id=tel>0740.000.000</span></a></li>    
                </ul>
            </nav>
            <img src="images/header.png" alt="header">
            <h1>Magazin acvaristică</h1>
        </header>
        <form action="index.php" method="GET" name="form" id="form">
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
                <p style="font-size:1.2em;">Categorii:</p><br>
                <input type="checkbox" name="Pești" value="Pești" id="fish" onclick="this.form.submit()" <?php if(isset($_GET['Pești'])){print "checked";}?>>
                <label class="cb" for="fish">Pești</label><br class="br">
                <input type="checkbox" name="Hrană" value="Hrană" id="food" onclick="this.form.submit()" <?php if(isset($_GET['Hrană'])){print "checked";}?>>
                <label class="cb" for="food">Hrană</label><br>
                <input type="checkbox" name="Accesorii" value="Accesorii" id="accessories" onclick="this.form.submit()" <?php if(isset($_GET['Accesorii'])){print "checked";}?>>
                <label class="cb" for="accessories">Accesorii</label><br class="br">
                <input type="checkbox" name="Acvarii" value="Acvarii" id="aquariums" onclick="this.form.submit()" <?php if(isset($_GET['Acvarii'])){print "checked";}?>>
                <label class="cb" for="aquariums">Acvarii</label><br>
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
                <label for="namel" id='namell'>Nume</label><br class="br">
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
        </aside>
        <?php
        $curPage=1;
            $dbcs = dbc();
            $querys="SELECT * FROM offers";
            $rs=mysqli_query($dbcs, $querys);
            $k=0;
            while(mysqli_fetch_array($rs)){
                $k++;
            }
            $js=$k*5;
            $rs2=mysqli_query($dbcs, $querys);
            $r2=0;
            while($rows=mysqli_fetch_array($rs2)){
                $r3=$r2*5;
                $x=100/$k;
                $y=$x+0.00009;
                echo "<style>";
                echo "@keyframes xfade{  
                                0%{
                                   transform:scale(1,1);
                                }
                                $x%{transform:scale(1,1);
                                }
                                $y%{
                                    transform:scale(0.0001,0.0001);
                                }
                                100% {
                                  transform:scale(0.0001,0.0001);
                                }
                              }";
                echo "#i{$rows['image']}{animation: xfade $js"."s $r3"."s infinite;}";
                echo "</style>";
                echo  "<a href=descriere.php?name={$rows['imageOrig']} id=dsc><img id='i{$rows['image']}' src='images/oferte/{$rows['image']}.jpg' alt='oferta' class=rightimg></a>";
                $r2++;
            }
        ?>
        <main id="main" class="main">
        <?php
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
                        $art[]= "<a href='descriere.php?name={$row['image']}'><figure class='figure'>".""
                            ."<img class=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                            ."<figcaption class='figcaption'>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                            ."<div class='name'><span class=ns>$namespecial</span></div>"
                            ."<div class=price>Preț: <span class=price> $pricespecial</span> lei</div>".""
                            ."</figcaption>".""
                        ."</figure></a>";
                            $i++;
                    }
                    $NumOfPages=ceil($i/15.0);
                
                    if(!empty($art)){
                        foreach($art as $akey=>$avalue){
                            global $curPage;
                            if($akey>=($curPage-1)*15&&$akey<$curPage*15){
                                echo $avalue;
                            }
                        }
                    }else {echo '<h3 style="text-indent:2em;">Căutarea nu a generat nici un rezultat.<h3>';}
                        
                }
                
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
                    if(!empty($word)){$s= mysqli_real_escape_string($dbc, $word);}
                    $query="SELECT * FROM articol WHERE name LIKE '%$s%'  ORDER BY $typeSelected ASC";
                $r=mysqli_query($dbc, $query);
                $i=0;
                $firstIndex=($curPage-1)*15+1;
                while($row= mysqli_fetch_array($r)){
                    $namespecial= htmlspecialchars($row['name']);
                    $pricespecial= htmlspecialchars($row['price']);
                    $art[]= "<a href='descriere.php?name={$row['image']}'><figure class='figure'>"
                        ."<img class=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                        ."<figcaption class='figcaption'>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                        ."<div class='name'><span class=ns>$namespecial</span></div>"
                        ."<div>Preț: <span class=price> $pricespecial</span> lei</div>"
                        ."</figcaption>"
                    ."</figure></a>";
                        $i++;
                        }
                        $NumOfPages=ceil($i/15.0);
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
            $i=0;
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
                    echo "<a href='descriere.php?name={$row['image']}'><figure class='figure'>"
                        ."<img class=img src='images/{$row['image']}.jpg' width='100' alt='img'>"
                        ."<figcaption class=figcaption>"."<!--[if IE]><div id='figcaption'><![endif]-->"
                        ."<div class='name'><span class=ns>$namespecial</span></div>"
                        ."<div>Preț: <span class=price> $pricespecial</span> lei</div>"
                        ."</figcaption>"
                        ."</figure></a>";
                        $firstIndex++;
                    }
                    $i++;
                    
                }
                
                    $NumOfPages=ceil($i/15.0);
            }    
            
            mysqli_close($dbc);
            
            ?>  
        </main>
        <form action='index.php' method="GET" id="paging">
           
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
            <input type="submit" name='<?php echo $NumOfPages;?>' value="->>" class="i">
        </form>
        <footer>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
        </footer>
            <?php 
            $querys="SELECT * FROM offers";
            $rs=mysqli_query($dbcs, $querys);
            $k=0;
            while(mysqli_fetch_array($rs)){
                $k++;
            }
            $js=$k*5;
            $rs2=mysqli_query($dbcs, $querys);
            $r2=0;
            while($rows=mysqli_fetch_array($rs2)){
                $r3=$r2*5;
                $x=100/$k;
                $y=$x+0.00009;
                echo "<style>";
                echo "@keyframes xfade{  
                                0%{
                                   transform:scale(1,1);
                                }
                                $x%{transform:scale(1,1);
                                }
                                $y%{
                                    transform:scale(0.0001,0.0001);
                                }
                                100% {
                                  transform:scale(0.0001,0.0001);
                                }
                              }";
                echo "#i{$rows['image']}{animation: xfade $js"."s $r3"."s infinite;}";
                echo "</style>";
                echo  "<a href=descriere.php?name={$rows['imageOrig']}><img id='i{$rows['image']}' src='images/oferte/{$rows['image']}.jpg' alt='oferta' class=rightimgf></a>";
                $r2++;
            }
            ?>
    </body>
</html>