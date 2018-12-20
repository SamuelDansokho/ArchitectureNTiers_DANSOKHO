
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
    <title>Home</title>
  </head>
  <body>
    <div class="main_page container bg-light p-0 w-100">
     <div class="navbar navbar-light bg-dark shadow-lg">
      <a class="navbar-brand text-light" href="./">Event Manager 2.0</a>
     </div>
      <div class="row justify-content-center content-row pt-2 mt-2 mx-2">
        <div class="col-9 p-0">
          <div class="CreateEvent text-dark"> Create your Event</div>
          <div class="row">
            <div class="col-9">
              <form action="EventCreate.php" method="POST" class="text-dark">
             <p>Name : <input type="text" name="Name" class="w-100" required="true"></p>
             <p>Date : <input type="datetime" name="Date" class="w-100" required="true" placeholder="Year-Month-Day"></p>
             <p>Address : <input type="text" name="Address" class="w-100" required="true"></p>
             <p>Description :<input type="text" class="w-100" name="Description" required="true"></p>
             <button class="btn btn-primary mb-2" id="postEventButton" data-toggle="modal" data-target="#postEventModal">Submit</button>
           </form>
              <div class="modal fade" id="postEventModal" tabindex="-1" role="dialog" aria-labelledby="postEventModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">You successfully created your event !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            </div>
            <div class="col-3">
              <div><a type='button' class='btn btn-primary text-light mb-2' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-list mr-1'></i> List of available events</a></div>
            </div>   
          </div>
        </div>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Available events in your area</h5>
              </div>
              <div class="modal-body">
                <?php
                echo "<div>";
                  include 'eventListModal.php';
                echo "</div>"
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer text-light text-center"><b>Event Manager 2.0</b></div>

    <div class="validator">
    </div>
  </body>
</html>


