
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml">
  <!--
    Modified from the Debian original for Ubuntu
    Last updated: 2014-03-19
    See: https://launchpad.net/bugs/1288690
  -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>MapApp</title>
  </head>
  <body>
    <div class="main_page container bg-light p-0 w-100">
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
                    echo "<table class='table table-striped'><tr><th>Name</th><th>Date</th><th>Address</th></tr>";
                    while($row = $result->fetch_assoc()){
                      echo "
                      <tr><td>".$row["NAME"]."</td><td>". date('Y-m-d',strtotime($row["DATE"]))."</td><td>".$row["ADDRESS"]."</td>


                      <td><form action='eventremove.php' method='POST'>
                        <input class='d-none' type='text' name='EVENT_ID' value='". $row["EVENT_ID"] ."' required='true'>
                        <button class='btn btn-danger'><i class='far fa-trash-alt mr-1'></i>Delete</button>
                      </form></td>


                      <td><a href='/eventEditPage.php?id=". $row["EVENT_ID"] ."'><button class='btn btn-warning'><i class='far fa-edit mr-1'></i>Edit</button></a></td>

                        

                      <td>
                        <a href='/maptoEvent.php?id=". $row["EVENT_ID"] ."'><button class='btn btn-primary'><i class='fa fa-map mr-1'></i></button></a>
                        
                      </td><tr>
                      ";
                    }
                    echo "</table>";
                  } else {
                    echo "0 results";
                  }

                  $conn->close();
          	echo "<div class='jumbo'>
          <h3 class='jumbotron text-center'> Find your event!</h3>
        </div>
        <div class='mapouter container mb-5'>
          <div class='row justify-content-center w-100'><div class='gmap_canvas'><iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=Telecom%20Saint-Etienne&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://www.pureblack.de'>pure black</a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>";?>
    </div>
    <div class="footer text-light text-center"><b>EventAight</b></div>

    <div class="validator">
    </div>
  </body>
</html>


    