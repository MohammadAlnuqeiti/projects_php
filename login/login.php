<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>register</title>
    <style>
        div{
            width: 250px;
            height: 280px;
        }
    </style>
</head>
<body>
    
<?php 

require_once("./connection.php");
if(isset($_POST['submit'])){
    $_SESSION['validate']=false;

    $email=$_POST['email'];
    $password=$_POST['password'];
    $db = crud::connect()->prepare('SELECT * FROM registeration WHERE email=:e and password=:p');
    $db->bindValue(':e',$email);
    $db->bindValue(':p',$password);
    $db->execute();
    $d=$db->fetch(PDO::FETCH_ASSOC);
    if(!empty($_POST['email'])&&!empty($_POST['password'])){
    if( $d){

        $_SESSION['name']=$d["fname"];
        $_SESSION['pass']=$d["password"];
        $_SESSION['validate']=true;
        header("location:./land.php");
    //    exit;
    }else{
        echo "error";
    }


    }

}

?>
<div class="form">

<h1>login </h1>
<form action="" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="submit" value="login">
</form>

</div>

</body>
</html>