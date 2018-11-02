"use strict";
var $ = function(id){
    return document.getElementById(id);
}
var joinList = function(){
    var username = $("username").value;
    var password = $("password").value;
    var isValid = true;
    
    if(username === ""){
        $("usernamespan").firstChild.nodeValue = "Introduceți numele de utilizator";
        isValid = false;
    }else{
        $("usernamespan").firstChild.nodeValue = ".";
        $("usernamespan").setAttribute("class", "white");
    }
    
    if(password === ""){
        $("passwordspan").firstChild.nodeValue = "Introduceți parola";
        isValid = false;
    }else{
        $("passwordspan").firstChild.nodeValue = ".";
        $("passwordspan").setAttribute("class", "white");
    }
    if(isValid){
        $("form").submit();
    }
}
window.onload = function(){
    $("enter").onclick = joinList;
    $("username").focus();
}