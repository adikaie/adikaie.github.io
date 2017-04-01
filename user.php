<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$uname=$_POST["uname"];
$country=$_POST["country"];
$email=$_POST["email"];
$password=$_POST["password"];

require_once 'connection.php';
$pdo = Connection::getConnection();

$sql = "INSERT INTO user (fname, lname, uname, country, email, password, type) VALUES (:fname, :lname, :uname, :country, :email, :password, :type)";

$statement = $pdo->prepare($sql);

$statement->bindValue(':fname', $fname);
$statement->bindValue(':lname', $lname);
$statement->bindValue(':uname', $uname);
$statement->bindValue(':country', $country);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->bindValue(':type', 0);

$inserted = $statement->execute();
 
if($inserted){
    echo 'success<br>';
}
else{
	echo 'failed<br>';
}


?>