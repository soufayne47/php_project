
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f2f5;
      }
    *{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    form{
        margin: auto;
        width: 45%;
        padding: 20px 10px;
        border: 1px solid black;
        border-radius: 5px;
        display: flex;
        gap: 9px;
        flex-direction: column; 
        justify-content: center;
        box-shadow: 4px 4px 10px #908c8c;
        backdrop-filter: blur(5px);
         border-radius: 20px;
    }
    input{
      outline: none;
      box-sizing: border-box;
      margin-top: 5%;
    }
    #div{
      margin-top: 10px;  
    }
    input[type=text]{
      margin-left: 9%;
      width: 79%;
      height: 35px;
      border: none;
      box-shadow: 4px 4px 10px #908c8c;
    }
    input[type=text]:hover{
      transition: 0.5s;
      box-shadow: 4px 4px 10pxrgb(99, 99, 99);

    }
    input[type=submit],label{
      font-size: 16px;
    }
    input[type=submit]{
      padding: 15px 32px;
      text-align: center;
      background-color: rgb(120, 120, 120);
      text-align: center; 
      vertical-align: center;
      border: none;
      align-self: center; 
      color: white;
      cursor: pointer; 
    }
    input[type=submit]:hover{
       background-color: rgb(90, 90, 90);
    }
    </style>
</head>
<?php	
include('../connection.php');
  if(isset($_POST['ajouter'])){
    $login = $_POST["login"];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    if($name && $pass &&  $login){
        $rqt = $user->prepare("INSERT INTO user(nom,login,password) VALUES (?,?,?)");
        $rqt->execute([$name,$login,$pass]);
        header('Location: index.php');
        exit();
    }
  }
?>
<body>
    <form method="post">
      <div id='div'>        
        <label for="">Login :</label><br>
        <input type="text" name="login" placeholder='Login'> 
      </div>
      <div id='div'>
        <label for="">Password :</label><br>
        <input type="text" name="password" placeholder='Password'> 
      </div>
      <div id='div'>
        <label for="">Name :</label><br>
        <input type="text" name="name" placeholder='Name'> 
      </div>


        <input type="submit" name="ajouter" value="Ajouter user">
    </form>
</body>
</html>