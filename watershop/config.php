<?php
$con=mysqli_connect("localhost","root","","water_shop");
if(!$con){
    echo "erreur de connecter avec database";
}