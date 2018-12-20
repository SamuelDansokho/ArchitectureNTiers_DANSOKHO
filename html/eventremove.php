<?php
$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn=new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
  die("Connection failed:".$conn->connect_error);
}
$stmt= $conn->prepare("DELETE FROM Archi.Events WHERE EVENT_ID=?");
$stmt->bind_param("d",$_POST["EVENT_ID"]);
if($stmt->execute()===TRUE) {
  header("Location: index.php");
  exit();
}  else {
  echo "Error :" . $sql . $conn->error;
}

$conn->close();
$stmt->close();
