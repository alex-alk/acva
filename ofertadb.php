<?php 
    require 'dbc.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $dbc = dbc();
        foreach($_POST as $key=>$value){
            if($value=='Adăugare'){
                $imageOrig=$key;
            }
        }
        $query="SELECT image FROM offers";
        $result= mysqli_query($dbc, $query);
        while($row= mysqli_fetch_array($result)){
            $arrayim[]=$row['image'];
        }
        $index=max($arrayim);
        $index++;
        echo $index;
        $target='images/oferte/';
        $fileloc= $target.''.$index;
        move_uploaded_file($_FILES['file']['tmp_name'], $fileloc.'.jpg');
        $querys="INSERT INTO offers(imageOrig,image)"
                . "VALUES('$imageOrig','$index')";
        $results=mysqli_query($dbc, $querys);
        $close=mysqli_close($dbc);
        header('Location:oferteadauga.php');
    }
?>