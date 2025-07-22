<?php
include('../connection.php');
if(!isset($_SESSION["user_id"]) || empty($_SESSION["user_id"])){
     header("Location: ../login/login.php");
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
             background-color: #f0f2f5;
             box-sizing: border-box;
        }
        *{
            font-family: Verdana, sans-serif;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            font-size: 16px;
        }
        td,th{
            padding: 5px;
            text-align: center; 
            border-bottom: 1px solid black;
        }
        tr{
            height: 50px;
        }
        a{
            text-decoration: none;
        }
        li a{
            color: white;
        }
        tr:nth-child(even){background-color: #f2f2f2}
                ul{
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
    h1{
        text-align: center;
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
        opacity: .999;
    }
    }
    .itm{
        height: 5px;
        width: 40px;
        background-color: red;
        }
    .non2{
         opacity: 0;
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
    </style>
</head>
<?php 

   if(isset($_GET['id_user'])){
    $rqt2 = $user->prepare("DELETE FROM user WHERE id_user=?");
    $rqt2->execute([$_GET['id_user']]);
   }
   $rqt = $user->prepare("SELECT * FROM user");
   $rqt->execute();
   $us = $rqt->fetchAll(PDO::FETCH_OBJ);

?>
<body>
   
    <script src="css.js"></script>
    <div class="entrer"></div>
    <div class="pr" id="chrt" onclick="displayDate()">
        <div class="itm"></div>
        <div class="itm"></div>
        <div class="itm"></div>
    </div>
    <div id="menu" class="non">
        <h1> Menu </h1>
        <ul id="ul">
            <li id="li"><i class="fa-solid fa-plus"></i> <span><a href="user.php">Ajouter</a></span> </li>
            <li id="li"><i class="fa-solid fa-file"></i> <span><a href="../index.php">Page principale</a></span> </li>
        </ul>
    </div>
    <i id="icon" class="fa-solid fa-caret-down fa-rotate-90 fa-3x non" onclick="display()"></i>
    <table id="cnt">
        
        <tr>
            <th>Id user</th>
            <th>Login</th>
            <th>Password</th>
            <th>Full name</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
        
        <?php 
           if($us){
           foreach($us as $i){
            echo "
                 <tr>
                    <td>$i->id_user</td>
                    <td>$i->login</td>
                    <td>$i->password</td>
                    <td>$i->nom</td>
                    <td> <a href=\"index.php?id_user=$i->id_user\" onclick=\"return confirm('VOUS VOULEZ SUPPRIMER CETTE USER')\" > Supprimer</a></td>
                    <td> <a href=\"modifier.php?id_user=$i->id_user\" > Modifier</a></td>
                 </tr>

            ";
           }}
           
        ?>
    </table>
</body>
</html>