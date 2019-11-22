<?php
session_start();
try{
    $db= new PDO ("mysql:host=localhost;dbname=shoping_page_2","root","");
}catch(PDOException $mesaj){
    echo $mesaj->getmessage();
}
?>