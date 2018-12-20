
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
    <title>Editing an event</title>
  </head>
  <body>
    <div class="main_page container bg-light p-0 w-100">
     <div class="navbar navbar-light bg-dark shadow-lg">
      <a class="navbar-brand text-light" href="./">Event Manager 2.0</a>
      
     </div>
      <div class="row justify-content-center content-row pt-2 mt-2 mx-2">
        <div class="col-9 p-0">
          <div class="CreateEvent text-dark"> Edit your Event</div>
          <div class="row">
            <div class="col-9">
              <?php
              $servername="localhost";
              $username="root";
              $password="tseinfo";
              $dbname="Archi";
              $url=$_GET['id'];


              $conn=new mysqli($servername,$username,$password,$dbname);


             if($conn->connect_error) {
                die("Connection failed:".$conn->connect_error);
             }
             
              $sql= "SELECT NAME,DATE,DESCRIPT,ADDRESS FROM Archi.Events WHERE EVENT_ID='". $url ."'";
              $result=$conn->query($sql);
              if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $address=$row["ADDRESS"];
                  $name=$row["NAME"];
                  $description=$row["DESCRIPT"];
                  $date=$row["DATE"];
                  $url=$_GET['id'];
                echo"<form action='eventEdit.php' method='POST' class='text-dark'>
               <p>Name : <input type='text' name='Name' class='w-100' value='". $name ."'></p>
               <p>Date : <input type='datetime' name='Date' class='w-100' value='". $date ."'></p>
               <p>Address : <input type='text' name='Address' class='w-100' value='". $address ."'></p>
               <p>Description :<input type='text' class='w-100' name='Description' value='". $description ."'></p>
               <input class='d-none' name='EVENT_ID' value= '" . $url . "'>
               <button class='btn btn-primary mb-2'>Edit event</button> ";
                }  

                 }      
              $conn->close();
              $stmt->close();
              ?>
           </form>
            </div>

        </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer text-light text-center"><b>EventAight</b></div>
    <div class="validator">
    </div>
  </body>
</html>


