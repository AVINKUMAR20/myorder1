<?php
$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$db ='School';
$conn =mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if(!$conn){
    die('Could not Connect My Sql:' .mysqli_error());
}

?>