<?php session_start();
    require 'dbc.php';
    foreach($_POST as $key=>$value){
        if($value=='names'){
            $names[]=$key;
        }
    }
    foreach($_POST as $key=>$value){
        if($value=='qs'){
            $qs[]=$key;
        }
    }
    foreach($names as $key=>$value){
        foreach($qs as $keyq=>$valueq){
            if($key==$keyq){
                $array[$value]=$valueq;
            }
        }
    }
    $dbc = dbc();
    $email=$_SESSION['email'];
    foreach($array as $key=>$value){
        $keyspec= mysqli_real_escape_string($dbc, $key);
        $valuespec= mysqli_real_escape_string($dbc, $value);
        $query="INSERT INTO orders(id,email,artName,quantity)VALUES(0,'$email','$keyspec','$valuespec')";
        $result=mysqli_query($dbc, $query);
    }
    mysqli_close($dbc);
    header('Location:confirmred.php');
?>