<?php
require 'conn.php';
$sql_update="INSERT INTO movies(Movie_ID,Movie_name,Movie_length,Genre,DVD) VALUES ('$_POST[Movie_ID]','$_POST[Movie_name]','$_POST[Movie_length]' ,'$_POST[Genre]' ,'$_POST[DVD]')";

$result= $conn->query($sql_update);

if(!$result) {
    die("Error God Damn it : ". $conn->error);
} else {

echo "Insert Success <br>";
header("refresh: 1; url=http://localhost/VideoStore/mainmenu.php");
}

?>