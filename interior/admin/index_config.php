<?php
  ob_start();
  session_start();

  $mysqli = new mysqli("localhost","root","","db_resrv");

  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  $sql = "SELECT MAX(roomNumber) AS max_roomNumber FROM tbl_reservation, tbl_room WHERE tbl_reservation.room_id = tbl_room.id GROUP BY roomNumber ORDER BY COUNT(room_id) DESC LIMIT 1";
  $result = $mysqli -> query($sql);
  $row = $result -> fetch_assoc();
  $result -> free_result();

  // $mysqli -> close();

  ////////     CALENDAR PHP      ////////
  $default 	= "SELECT * FROM tbl_reservation LIMIT 1";
  $defaultResult = $mysqli -> query($default);
  $defaultRoom = $defaultResult -> fetch_assoc();

  $session = isset($_SESSION['room']) ? $_SESSION['room'] : '';

  if($session==NULL){
    $id = $defaultRoom['room_id'];
  }
  else{
    $id = $session;
  }

	//Selecting events records from events table
	$query  	= "SELECT * FROM tbl_reservation WHERE room_id = " . $id ;
	$data  = array();
	$resp = array();
	$i 			= 0;
	// $row 		= mysql_num_rows($query);
	$resultDate = mysqli_query($mysqli,$query);
	$rowDate = mysqli_num_rows($resultDate);
	if($rowDate > 0){
		while($data['events'] = mysqli_fetch_assoc($resultDate))
		{
      // $_SESSION['currentRoom'] = $rowDate['roomNumber'];
			$i++;
			//Geting event days
			$start = date("Y-m-d",strtotime($data['events']['date']));//die;
            $timestamp_start = strtotime($start);
            $end = date("Y-m-d",strtotime($data['events']['date']));
            $timestamp_end = strtotime($end);
            $diff = abs($timestamp_end - $timestamp_start); // that's it!

            $days = floor($diff/(60*60*24));
            $days = $days+1;
            //Defining colors to events
            if($days == 1){
                $color='#00BEBB';
            }elseif($days > 1 and $days <= 15){
                $color='#8FBC8F';
            }elseif($days > 15 and $days <= 30){
                $color='#C0C0C0';
            }elseif($days > 30 and $days <= 60){
                $color='#90EE90';
            }else{
                $color='#F4A460';
            }
            //Creating event short name with ...
            if(!empty($data['events']['name'])){
                for ($i = 1; $i <= $days; $i++) {
                	$add_day = $i - 1;
                    $start = date('Y-m-d', strtotime("+{$add_day} day", $timestamp_start));

                    $event_short_name = substr($data['events']['name'] , 0, 15);
                    $sub='th';
                    if($i < 4){
                        switch ($i){
                            case 1:
                            $sub='st';
                            break;
                            case 2:
                            $sub='nd';
                            break;
                            case 3:
                            $sub='rd';
                            break;
                        }
                    }
                    $event_short_name .= ' - ( Room Number '.$data['events']['room_id'].' )';

                    $startDate = strtotime($start);
                    //Colecting data in array
                    $resp[$start . '_' . $data['events']['reserve_number'] . '_' . $i] = array(
                        'id'    => $data['events']['reserve_number'],
                        'title' => $event_short_name,
                        'url'   => '',
                        'start' => $start,
                        'color' => $color,
                    );
                }
            }
		}
		$resp = array_values($resp);
	}

  if(isset($_POST["select"])){
      $select=$_POST["select"];
      $roomSelect="select room_id from tbl_reservation";
      $resultRoomS = mysqli_query($mysqli,$roomSelect);
      $_SESSION['room']=$select;
      header("Location: index.php");

  }
?>
