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
        <style>
        body {
            margin: 0;
            height: 100vh; 
            display: flex;
            justify-content: center; 
            align-items: center;    

             background-color: #f0f2f5;
        }
        *{
            font-family: Verdana, sans-serif;
        }
        #btn{
            cursor: pointer;
            width: fit-content;
            align-self: center;
        }
        input{
            width: 89%;
            padding: 12px;
            border: 1px solid #ccc;            
            border-radius: 4px;
            margin-top: 10px; 
            margin-left: 20px;
            outline: none;
            background-color: #f1f1f1;
        }
        select {
            margin-left: 20px;
            width: 93%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
        form{
            width: 800px;
            display: flex;
            flex-direction: column;
            align-item: center;
            padding: 10px;
            border: black 1px solid;
            border-radius: 4px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }
    </style>
</head>
<?php
  $users = $user->prepare('SELECT * FROM user');
  $users->execute();
  $us = $users->fetchAll(PDO::FETCH_OBJ);
  $r = $ville->prepare('SELECT * FROM  ville');
    $r->execute();
    $vl = $r->fetchAll(PDO::FETCH_OBJ);
  $rqt = $maison->prepare("SELECT * FROM maison WHERE codeM=?");
  $rqt->execute([$_GET['codeM']]);
  $data = $rqt->fetch(PDO::FETCH_OBJ);
  if(isset($_POST['mdf']) && $data){
    $codeM = $_POST['codeM'];
    $etage = $_POST['etage'];
    $nbchambre = $_POST['nbchambre'];
    $suerficie = $_POST['suerficie'];
    $ville = $_POST['ville'];
    $user = $_POST['user'];
if ($codeM && $etage && $nbchambre && $suerficie && $ville && $user) {
        $rqt2 = $maison->prepare("UPDATE maison SET etage = ?, nbchambre = ?, suerficie = ?, ville = ? ,user_id = ? WHERE codeM = ?");
        $rqt2->execute([$etage, $nbchambre, $suerficie, $ville, $codeM, $user]);
        header("Location: index.php");
        exit();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
  
?>
<body>
    <form method='post'>
        <label for="">CodeM :</label>
        <input value='<?= $data->codeM ?>' type="text" name="codeM" > <br>
        <label for="">Nbchambre</label>
        <input value='<?= $data->nbchambre ?>' type="number" name="nbchambre" > <br>
        <label for="">Etage</label>
        <input value='<?= $data->etage ?>' type="text" name="etage" > <br>
        <label for="">Suerficie</label>
        <input value='<?= $data->suerficie ?>' type="text" name="suerficie" > <br>
        <label for="">Ville</label>
        <select name="ville"> 
            <?php
               if($vl){
                foreach($vl as $i){
                    echo "<option value=\"$i->ville\">$i->ville</option>";
                }
               }
            ?>
        </select>
         <label for="">ID user</label>
        <select name="user"> 
            <?php
               if($us){
                foreach($us as $i){
                    echo "<option value=\"$i->id_user\">$i->id_user</option>";
                }
               }
            ?>
        </select>
        <input type="submit" name='mdf' value="Modifier" onclick="return confirm('Vous voulez modidier')">
    </form>
</body>
</html>