<?php

try{
    $db= new PDO ("mysql:host=localhost;dbname=shoping_page_2","root","");
}catch(PDOException $mesaj){
    echo $mesaj->getmessage();
};
error_reporting(0);
session_start();
ob_start();