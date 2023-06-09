<?php
//connecting to the database :
$con=mysqli_connect("localhost","root","","water_shop");
if(!$con){
    echo "erreur de connecter avec database";//error message if the connection failed
}
//end of file
