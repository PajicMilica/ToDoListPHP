<?php
require "dbbroker.php";
require "model/user.php";

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $usename = $_POST['username'];
    $pass = $_POST['password'];

    $korisnik = new User(1, $usename, $pass);
    $odg = User::logInUser($korisnik, $conn); 

    if($odg->num_rows==1){
        echo console.log("Uspešno ste se prijavili");
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();

    }else{
        echo console.log( "Niste se prijavili!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cssIndex.css">
    <title>Login</title>
</head>
<body>
    

<div>
    
  <form method="POST" action="#">
  <h2>Login form</h2>
    <label for="username">Username:</label><br>
    <input type="text" name="username" placeholder="Your username.."><br>
    
    <label for="password">Password:</label><br>
    <input type="text" name="password" placeholder="Your password.."><br>
  
    <input type="submit" value="Login">
  </form>
</div>

</body>
</html>