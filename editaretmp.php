<?php 
    require 'dbc.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $dbc = dbc();
        foreach($_POST as $key=>$value){
            if($value=='img'){
                $im_name= $key;
            }
            if($value=='id'){
                $id=$key;
            }
        }
        $nume=$_POST['name'];
        $pret=$_POST['pret'];
        $ctg=$_POST['category'];
        $description=$_POST['description'];
        $target='images/';
        $fileloc= $target.''.$im_name;
        if(!empty($_FILES['file']['tmp_name'])){
            move_uploaded_file($_FILES['file']['tmp_name'], $fileloc.'.jpg');
        }
        $querys="REPLACE INTO articol(id,image, name, price,description,category)"
                . "VALUES('$id','$im_name','$nume','$pret','$description','$ctg')";
        $results=mysqli_query($dbc, $querys);
        $close=mysqli_close($dbc);
        header('Location:editare.php');
    }
    ?>