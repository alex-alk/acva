<?php
    function dbc(){
        $host="localhost:3307";
        $user="root";
        $password="";
        $database="baza";
        $dbc=mysqli_connect($host,$user,$password,$database);
        return $dbc;
    }
?>