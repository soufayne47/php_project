<?php
include('connection.php');
        if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])){
             header("Location: login/login.php");
             exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body{
            overflow: auto;
        }
        *{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        h1{
            text-align: center;
        }
        #ul {
            width: 100%;
            overflow: auto;
            list-style: none;
            color: white;
            margin: 0;
            padding: 0;
        }
       #ul  #li{
        font-size: 16px;
        padding: 5px;
        margin-top: 20px;
        border-bottom: 1px solid white;
        }
        li:hover{
            color: rgb(255, 255, 91);
        }
    .pr{
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    a{
            text-decoration: none;
            color: white;
        }
    span{
        margin-left: 15px;
    }
    .menu{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
        background-color: #5e5c5c;
        height: 100vh;
        width: 250px;
        animation: fadeIn .4s forwards;
    }
    @keyframes fadeIn {
    from {
        transform: translateX(-250px); 
        opacity: 0;
    }
    50%{
        opacity: .4;
    }
    75%{
         opacity: .8;
    }
    to {
        transform: translateX(0);    
        opacity: .9;
    }
    }
    .itm{
        height: 5px;
        width: 40px;
        background-color: red;
        }
    .non{
        display: none;
    }
    .ides{
        color: red;
        position: relative;
        top: 250px;
        left: 259px;
    }
    video{
     position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
      object-fit: cover;
    }
    </style>
</head>
<body>
    <video src="v1.mp4"autoplay muted loop playsinline></video>
    <script src="menu.js"></script>
    <div class="entrer"></div>
    <div class="pr" id="chrt" onclick="displayDate()">
        <div class="itm"></div>
        <div class="itm"></div>
        <div class="itm"></div>
    </div>
    <div id="menu" class="non">
        <h1> Menu </h1>
        <ul id="ul">
            <li id="li"><i class="fa-solid fa-users"></i> <span><a href="user/index.php">Users</span></a> </li>
            <li id="li"><i class="fa-solid fa-house"></i> <span> <a href="maison/index.php">Maison</a></span></li>
            <li id="li"><i class="fa-solid fa-right-from-bracket"></i><span> <a href="logout.php">Déconnexion</a></span></li>
        </ul id="ul">
    </div>
    <i id="icon" class="fa-solid fa-caret-down fa-rotate-90 fa-3x non" onclick="display()"></i>
</body>
</html>