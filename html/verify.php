<?php
$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn=new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed:".$conn->connect_error);
}
$stmt= $conn->prepare("INSERT INTO Events (NAME,DATE,ADDRESS,DESCRIPT) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$_POST['Name'],date("Y-m-d", strtotime($_POST['Date'])),$_POST['Address'],$_POST['Description']);
if($stmt->execute()===TRUE) {
	header('Location: index.php');
	exit();
}  else {
	echo "Error :" . $sql . $conn->error;
}

$conn->close();
$stmt->close();
?>