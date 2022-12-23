<?php
require_once("./connection.php");
$id=$_GET['id'];
$db = crud::connect();
$con = "UPDATE registeration
SET is_deleted = '1' 
WHERE id = :id";

$d=$db -> prepare($con);
if($d->execute([':id' => $id])){
 header("location:./users.php");
}
?>