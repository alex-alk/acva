<?php 
    require 'dbc.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $dbc = dbc();
        $im_name= $_FILES['file']['name'];
        $nume= mysqli_real_escape_string($dbc, trim($_POST['name']));
        $pret= mysqli_real_escape_string($dbc, trim($_POST['pret']));
        $ctg=$_POST['category'];
        $description= mysqli_real_escape_string($dbc, trim($_POST['description']));
        $query="SELECT image FROM articol";
        $result= mysqli_query($dbc, $query);
        while($row= mysqli_fetch_array($result)){
              $arrayim[]=$row['image'];
        }
        $index=1;
        if(isset($arrayim)){
            $index=max($arrayim);
            $index++;
        }
        $target='images/';
        $fileloc= $target.''.$index;
        move_uploaded_file($_FILES['file']['tmp_name'], $fileloc.'.jpg');
        $querys="INSERT INTO articol(id,image, name, price,description,category)"
                . "VALUES(0,'$index','$nume','$pret','$description','$ctg')";
        print $querys;
        $results=mysqli_query($dbc, $querys);
        $close=mysqli_close($dbc);
        header('Location:adauga.php');
    }                
?>