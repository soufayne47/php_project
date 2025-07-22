<?php
try{
$maison = new PDO("mysql:host=localhost;dbname=maison","root",'');
$ville = new PDO("mysql:host=localhost;dbname=maison","root",'');
$user = new PDO("mysql:host=localhost;dbname=maison","root",'');
session_start();
}catch(PDOException $e){
    echo "Error " . $e->getMessage();
}