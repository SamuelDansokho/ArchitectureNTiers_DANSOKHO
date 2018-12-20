<?php
  $servername="localhost";
  $username="root";
  $password="tseinfo";
  $dbname="Archi";

  $conn=new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_error) {
    die("Connection failed:").$conn->connect_error;
  }

  $sql= "SELECT * FROM Archi.Events";
  $result=$conn->query($sql);

  if($result->num_rows>0) {
    echo "
      <a class='text-light' href='/maptoEvent.php'><button class='btn btn-primary mb-2'><i class='fa fa-map mr-1'></i>Find events on the map!</button></a>
    <table class='table table-striped'><tr><th>Name</th><th>Date</th><th>Address</th></tr>";
    while($row = $result->fetch_assoc()){
      echo "
      <tr><td>".$row["NAME"]."</td><td>". date('Y-m-d',strtotime($row["DATE"]))."</td><td>".$row["ADDRESS"]."</td>


      <td><form action='eventremove.php' method='POST'>
        <input class='d-none' type='text' name='EVENT_ID' value='". $row["EVENT_ID"] ."' required='true'>
        <button class='btn btn-danger'><i class='far fa-trash-alt mr-1'></i>Delete</button>
      </form></td>
            

      <td><a href='/eventEditPage.php?id=". $row["EVENT_ID"] ."'><button class='btn btn-warning'><i class='far fa-edit mr-1'></i>Edit</button></a></td></tr>
      
      ";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();
?>