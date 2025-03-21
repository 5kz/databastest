<!DOCTYPE html>
<?php

$server ="localhost";
$username="root";
$pass="";
$conne=mysqli_connect($server, $username, $pass, "databastest");

if(isset($_POST ['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO tbluser(username, password) VALUES ('$username', '$password')";
    $result=mysqli_query($conne, $sql);
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM tbluser WHERE id=$id";
    $result=mysqli_query($conne, $sql);
}





?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terretest</title>
</head>
<body>
    <h1>Terretest heter jag</h1>

    <?php
    $sql="SELECT * FROM tbluser ORDER BY username ASC";
    $result=mysqli_query($conne, $sql);
    while($rad=mysqli_fetch_assoc($result)){ ?>
        <p>
            <b>Användarnamn:</b>&nbsp; <?=$rad['username']?><br>
            <b>Lösenord:</b>&nbsp; <?=$rad['password']?>
            <a href="index.php?id=<?=$rad['id']?>">Ta bort</a>
        </p>
    <?php }
    ?>

<form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Skriv ditt användarnamn" required="">
        <input type="passowrd" name="password" placeholder="Skriv ditt lösenord" redquired="">
        <input type="submit" name="submit" value="Skicka in" >
</form>
</body>
</html>