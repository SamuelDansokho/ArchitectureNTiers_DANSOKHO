<?php
$servername="localhost";
    $username="root";
    $password="tseinfo";
    $dbname="Archi";
    $url=$_GET['id'];

    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error) {
      die("Connection failed:").$conn->connect_error;
    }

    $sql= "SELECT * FROM Archi.Events";
    $result=$conn->query($sql);

    if($result->num_rows>0) {
            echo "<table class='table table-striped'><tr><th>Name</th><th>Date</th><th>Address</th></tr>";
            while($row = $result->fetch_assoc()){
              echo "
              <tr><td>".$row["NAME"]."</td><td>". date('Y-m-d',strtotime($row["DATE"]))."</td><td>".$row["ADDRESS"]."</td>        
              <td><form action='eventAdd.php' method='POST' class='text-dark'>
                <input type='text' name='Username' class='w-50 input-sm' placeholder='Username' required>
                <input type='email' name='Email' class='w-50 input-sm' placeholder='Email' required>
                <input class='d-none' type='text' name='EVENT_ID' value='". $row["EVENT_ID"] ."'>
                <button class='btn btn-secondary'><i class='fas fa-sign-in-alt mr-1'></i>Sign up to this event</button>
              </form>
              <a href='/maptoEvent.php?id=". $row["EVENT_ID"] ."'><button class='btn btn-primary'><i class='fa fa-map mr-1'></i></button></a></td><tr>
              ";
            }
            echo "</table>";
          } else {
            echo "0 Results";
          }
          echo "<div class='jumbo'>
  <h3 class='jumbotron text-center'> Find your event!</h3>
</div>
<div class='mapouter container mb-5'>";
          $conn->close();

          $conn=new mysqli($servername,$username,$password,$dbname);

          if($conn->connect_error) {
            die("Connection failed:").$conn->connect_error;
          }

          $sql= "SELECT USERNAME FROM Archi.Event_User WHERE EVENT_ID='". $url ."'";
          $result=$conn->query($sql);

          if($result->num_rows>0) {
             echo "<div class='alert alert-info text-left'>";
              echo "<p><u><strong>Users participating :</strong></u></p>";
              while($row=$result->fetch_assoc()){ 
                echo  $row["USERNAME"] . "||" ;
            }
            echo "</div>";
          } else {
            echo "";
          }

          $conn->close();
    
  
  


  $conn=new mysqli($servername,$username,$password,$dbname);


 if($conn->connect_error) {
    die("Connection failed:".$conn->connect_error);
 }
 
  $sql= "SELECT ADDRESS FROM Archi.Events WHERE EVENT_ID='". $url ."'";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $address=$row["ADDRESS"];
    echo"<div class='row justify-content-center w-100'><div class='gmap_canvas'><iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=". $address ."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://www.pureblack.de'></a></div><style>.mapouter{text-align:right;height:720px;width:720px;}.gmap_canvas {overflow:hidden;background:none!important;height:720px;width:720px;}</style></div></div>";
    }  

     }else{
      echo "<p>Click on the map button near an event to display it on Google Maps!</p>";
     }      
  $conn->close();
  $stmt->close();
?>