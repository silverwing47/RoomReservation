<?php
  ob_start();
  $conn =mysqli_connect("localhost","root","","db_resrv");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  session_start();

  $user = $_SESSION["login"];

  $sql = "SELECT * FROM tbl_room";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();


  // $name_query = "SELECT FROM tbl_client WHERE name='$user' ";
  //usbonon hahah; to show name on first part sa booking, karun is username pa ang mu show

?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Re.Srv User Transaction</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Logo -->
    <link rel="shortcut icon" href="assets/images/favico.png" type="image/png">
    <!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Bootstrap JS -->


  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <style>
      #book-a-table {
          background-color: #FAFAFA;
          padding: 50px 0px;
          border-top: 1px solid #ddd;
          border-bottom: 1px solid #ddd;
          margin: 50px 0px;
          float: left;
          width: 100%;
      }
      .book-a-table p {
      	color: #9a9a9a;
      }
      .book-a-table textarea {
          min-height: 200px;
          max-width: 100%;
      }
      body {
        overflow:auto;
      }
    </style>
</head>
<body>


      <!-- Table Reservation Form -->
      <section id="book-a-table" class="book-a-table">
          <div class="container" data-aos="fade-up">
              <div class="row">
      			<div class="col-md-8 offset-md-2 text-center">
      				<h2 class="text-primary">Re.Srv A Conference Room Now!!</h2>
      				<p class="mb-5">Select the room you want for your meetings/conferences. Re.Srv Now!</p>
      			</div>
      		</div>

              <form action="" method="POST" role="form">
                <div class="form-row">
                  <div class="col-lg-4 col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="<?=$user?>" value="<?=$user?>" readonly>
                      <!-- username lng sa ang ako gi use hahah di ko kamao pa show sa name from tbl_client -->
                      <!-- di ma input sa  -->
                  </div>
                  <div class="col-lg-4 col-md-6 form-group">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Your Address">
                  </div>
                  <div class="col-lg-4 col-md-6 form-group">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone (11 digit phone number)" value="09">
                  </div>
                  <div class="col-lg-4 col-md-6 form-group">
                      <input type="date" name="date" class="form-control" id="date" placeholder="Date">
                  </div>
                  <div class="col-lg-4 col-md-6 form-group">
                      <!-- <input type="text" class="form-control" name="time" id="time" placeholder="Time"> -->
                      <select class="form-control" name="timeslot" id="timeslot">
                        <option hidden value="default">- - - Select Timeslot - - -</option>
                        <option value='Morning'>Morning</option>
                        <option value='Afternoon'>Afternoon</option>
                        <option value='Evening'>Evening</option>
                      </select>
                  </div>
                  <div class="col-lg-4 col-md-6 form-group">
                      <!-- <input type="text" class="form-control" name="people" id="room" placeholder=""> -->
                      <select class="form-control" name="roomNumber" id="room">
                        <option hidden value="default">- - - Select Room - - -</option>
                        <?php foreach( $result as $row ){
                            echo "<option value='" . $row['id'] . "'>" . $row['roomNumber'] . "</option>";
                            }
                        ?>
                        <!-- butangan unta ug price after sa roomnumber but di nako ma implement hahaha -->
                        <!-- kailangan mu connect sa roomtype table hahaha -->
                      </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                      <textarea class="form-control" name="message" placeholder="Message"></textarea>
                </div> -->
                <button type="submit" class="btn btn-primary float-right mt-3" name="btnReserve" onclick="reserved()">Reserve Now</button>
              </form>
          </div>
      </section>
      <!-- End Table Reservation Form -->

</body>
</html>

<script type="text/javascript">
  function reserved() { alert("Reservation Booked Successfully!"); }
</script>

<?php
  if(isset($_POST['btnReserve'])){
      $name=$_POST['name'];
      $address=$_POST['address'];
      $phone=$_POST['phone'];
      $rNum=$_POST['roomNumber'];
      $date=$_POST['date'];
      $timeslot=$_POST['timeslot'];
      // $query="INSERT INTO usertbl (firstName, lastName, email, password, phone) VALUES ('$fname','$lname', '$email',SHA('$pwd'), '$phone')"; //for encryption of password utilize SHA()
      $query="INSERT INTO tbl_reservation (name, address, phone, room_id, date, timeslot) VALUES ('$name','$address', '$phone','$rNum', '$date', '$timeslot')";
      mysqli_query($conn,$query);
      header("Location: bookingForm.php");
    }
?>
