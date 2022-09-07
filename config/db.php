<?php
//connect to db
$conn=mysqli_connect('localhost','nijji','1144','nijji pizza');

//check conn
if (!$conn) {
    echo 'connection error:'.mysqli_connect_error();
}
?>