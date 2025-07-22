<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<?php
include("../connection.php");
$msg="";
if(isset($_POST['ok'])){
       $login= $_POST["login"];
       $password= $_POST["password"];
        // $stmt = $user->prepare("SELECT * FROM user WHERE login = :login AND password = :password");
        // $stmt->execute([
        //     ':login' => $login,
        //     ':password' => $password
        // ]);
      $sql = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
      $stmt = $user->query($sql);
      $inf = $stmt->fetch();
      if($inf){
        $_SESSION["user_id"]=$inf["id_user"];
        header("Location: ../index.php");
        exit();
      }else{
        $msg="login or password incorect !!";
      }
    }
?>
<body>
    <video src="v1.mp4"autoplay muted loop playsinline></video>
    <form method="post">
      <h1>Login </h1>
        <fieldset onclick="document.getElementById('login').focus()">
          <legend>Login</legend>
           <input type="text" name="login" id="login">
        </fieldset>
        <fieldset  onclick="document.getElementById('password').focus()">
          <legend>Password</legend>
           <input type="text" name="password" id="password">
        </fieldset>

        <input type="submit" value="SE connecter" name="ok">
    <p>Vous n’avez pas de compte ?<a href="../user/user.php">Inscrivez-vous</a></p>
    </form>
</body>
</html>