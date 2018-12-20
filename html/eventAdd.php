<?php
$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn=new mysqli($servername,$username,$password,$dbname);



if($conn->connect_error) {
	die("Connection failed:".$conn->connect_error);
}
$stmt= $conn->prepare("INSERT INTO Event_User (USERNAME,EMAIL,EVENT_ID) VALUES (?,?,?)");
$stmt->bind_param("ssd",$_POST['Username'],$_POST['Email'],$_POST["EVENT_ID"]);
if($stmt->execute()===TRUE) {
	echo "good";
	header("Location: index.php");
	exit();
}  else {
	header("Location: maptoEvent.php?id=1062");
	exit();}

$conn->close();
$stmt->close();
?>