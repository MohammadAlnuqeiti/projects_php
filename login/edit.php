<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>edit</title>
</head>
<body>
    <?php

require_once("./connection.php");
    $id=$_GET['id'];

    if(isset($_POST['submit'])){
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $repassword =$_POST['re-password'];
        if(!empty($_POST['fname'])&&!empty($_POST['lname'])&&!empty($_POST['email'])&&!empty($_POST['password'])){
            if(  $password ==  $repassword ){
                $sql = "UPDATE registeration SET fname=:f, lname=:l, email=:e, password=:p WHERE id=:id";

                $db = crud::connect()->prepare($sql );
                $db -> bindValue(':f',$fname);
                $db -> bindValue(':l',$lname);
                $db -> bindValue(':e',$email);
                $db -> bindValue(':p',$password);
                $db -> bindValue(':id',$id);
                $db -> execute();
                header("location:./users.php");
            }
        }else{
            echo 'passsword not match';
        }
       


    }
    ?>
<div class="form">

<h1>edit data </h1>
<form action="" method="post">
    <input type="text" name="fname" placeholder="first name" >
    <input type="text" name="lname" placeholder="last name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="re-password" placeholder="confirm password">
    <input type="submit" name="submit" value="edit">
</form>

</div>

</body>
</html>