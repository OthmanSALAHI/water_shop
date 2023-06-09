<?php
require 'config.php';
//query string methode
if(!isset($_GET['id'])){
    header('Location: user.php');
    exit();
}

$user_id = $_GET['id'];
//sql lunching
$sql = "DELETE FROM clients WHERE id='$user_id'";
$result = mysqli_query($con, $sql);

if(!$result){
    die("Query failed: " . mysqli_error($con));//error mention
}

header('Location: user.php?delete=success');
exit();
?>
