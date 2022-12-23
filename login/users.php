<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 90%;
            display: block;
            margin: auto;
        }
        table,tr,td,th{
            border:1px solid gray;
            border-collapse:collapse;
        }
        th{
            width: 500px;
            background: red;
            color:white;
            height:30px


        }
        img {
            width: 30px;
            display: block;
            margin: auto;

        }
    </style>
</head>
<body>
    

<?php require_once("./connection.php");?>
<?php 
$db = crud::selectData();

?>

<table >
    <th>#</th>
    <th>first name</th>
    <th>last name</th>
    <th>email</th>
    <th>password</th>
    <th>delete</th>
    <th>edit</th>
</tr>
 <?php $i=1 ?>
<?php foreach($db as $value):?> 
<?php if($value['is_deleted']==1){continue;};?> 
 
    <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $value['fname']?></td>
        <td><?php echo $value['lname']?></td>
        <td><?php echo $value['email']?></td>
        <td><?php echo $value['password']?></td>
        <td><a href="./delete.php?id=<?php echo $value['id']; ?>" onclick="return confirm ('are you shure')" ><img src="./delete.jpg"></a></td>
        <td><a href="./edit.php?id=<?php echo $value['id']; ?>"><img src="./edit.png"></a></td>

        
      

    </tr>

<?php  endforeach;?>

</table>
</body>
</html>