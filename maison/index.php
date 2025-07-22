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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
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
        ul{
            list-style: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: sticky;
            top: 0;
        }
        li {
        float: left;
        border-right:1px solid #bbb;
        }
        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        li a:hover {
        background-color: #111;
        }
        i{
            color: white;
            position: relative;
            transform: scale(2);
            top: 14px;
            left: 78%;
        }
    </style>
</head>
<?php
        if(isset($_GET['codeM'])){
        $sp = $maison->prepare('DELETE FROM maison WHERE codeM=?');
        $sp->execute([$_GET['codeM']]);
    }
    $data = $maison->prepare("SELECT * FROM maison ");
    $data->execute();
    $info = $data->fetchAll(PDO::FETCH_OBJ);

?>
<body>
    <ul>
        <li><a href="Ajouter.php">Ajouter</a></li>
        <li><a href="../index.php">Page principale</a></li>
        <i class="fa-solid fa-house"></i>
    </ul>		
    <table>
        <tr>
            <th>CodeM</th>
            <th>Nbchambre</th>
            <th>Etage</th>
            <th>Suerficie</th>
            <th>Ville</th>
            <th>User</th>
            <th>Suprimer</th>
            <th>Modifier</th>
        </tr>
            <?php
            if($info){
            foreach($info as $i){
                $userN = $user->prepare('SELECT nom FROM user WHERE id_user =?');
                $userN->execute([$i->user_id]);
                $userinf = $userN->fetch(PDO::FETCH_OBJ);
                $no = "none";
                echo " 
                <tr>       
                <td>$i->codeM</td>
                <td>$i->nbchambre</td>
                <td>$i->etage</td>
                <td>$i->suerficie</td>
                <td>$i->ville</td>
                <td>" . ($userinf->nom ?? '') . "</td>
                <td><a href=\"index.php?codeM=$i['codeM']\">Suprimer</a></td>
                <td><a href=\"modifier.php?codeM=$i->codeM\">Modifier</a></td>
                </tr>";
            }}
            ?>

    </table>
</body>
</html>