<?php
  ob_start();
  $mysqli = new mysqli("localhost","root","","db_resrv");

  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  $sql = "SELECT MAX(roomNumber) AS max_roomNumber FROM tbl_reservation, tbl_room WHERE tbl_reservation.room_id = tbl_room.id GROUP BY roomNumber ORDER BY COUNT(room_id) DESC LIMIT 1";
  $result = $mysqli -> query($sql);

  // Associative array
  $row = $result -> fetch_assoc();
  // printf ("%s ", $row["max_roomNumber"]);
  // echo  $row["max_roomNumber"];
  // Free result set
  $result -> free_result();

  $mysqli -> close();

  ////////     CALENDAR PHP      ////////
	//Creating database connection.
	// define('DB_SERVER', 'localhost');
	// define('DB_USERNAME', 'root');
	// define('DB_PASSWORD', 'root');
	// define('DB_DATABASE', 'fullcalendar');
	// $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
	// $database   = mysql_select_db(DB_DATABASE) or die(mysql_error());
	$conn =mysqli_connect("localhost","root","","db_resrv");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//Selecting events records from events table
	$query  	= "SELECT * FROM tbl_reservation ";
	$data  = array();
	$resp = array();
	$i 			= 0;
	// $row 		= mysql_num_rows($query);
	$resultDate = mysqli_query($conn,$query);
	$rowDate = mysqli_num_rows($resultDate);
	if($rowDate > 0){
		while($data['events'] = mysqli_fetch_assoc($resultDate))
		{

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
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin Dashboard</title>

    <!-- CALENDAR -->

    <link href="calendar/css/fullcalendar.css" rel="stylesheet" />
    <link href="calendar/css/fullcalendar.print.css" rel="stylesheet" media="print" />

    <!-- Calendar END -->

    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../assets/images/favico.png"
    />
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet" />

    <style>
    	#calendar {
    		max-width: 80%;
    		margin: 8px;
        padding: 20px;
    	}

    </style>

  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.php">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img
                  src="assets/images/logo-icon.png"
                  alt="homepage"
                  class="light-logo"
                  width="25"
                /> -->
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img style="width: 200px;"
                  src="../assets/images/logo.png"
                  alt="homepage"
                  class="light-logo"
                />
              </span>
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="d-none d-md-block"
                    >Create New <i class="fa fa-angle-down"></i
                  ></span>
                  <span class="d-block d-md-none"
                    ><i class="fa fa-plus"></i
                  ></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box">
                <a
                  class="nav-link waves-effect waves-dark"
                  href="javascript:void(0)"
                  ><i class="mdi mdi-magnify fs-4"></i
                ></a>
                <form class="app-search position-absolute">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search &amp; enter"
                  />
                  <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-bell font-24"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- End Comment -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Messages -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle waves-effect waves-dark"
                  href="#"
                  id="2"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="font-24 mdi mdi-comment-processing"></i>
                </a>
                <ul
                  class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  "
                  aria-labelledby="2"
                >
                  <ul class="list-style-none">
                    <li>
                      <div class="">
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-success btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-calendar text-white fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Event today</h5>
                              <span class="mail-desc"
                                >Just a reminder that event</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-info btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-settings fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Settings</h5>
                              <span class="mail-desc"
                                >You can customize this template</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-primary btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-account fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Pavan kumar</h5>
                              <span class="mail-desc"
                                >Just see the my admin!</span
                              >
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span
                              class="
                                btn btn-danger btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "
                              ><i class="mdi mdi-link fs-4"></i
                            ></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Luanch Admin</h5>
                              <span class="mail-desc"
                                >Just see the my new admin!</span
                              >
                            </div>
                          </div>
                        </a>
                      </div>
                    </li>
                  </ul>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- End Messages -->
              <!-- ============================================================== -->

              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-wallet me-1 ms-1"></i> My Balance</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a
                  >
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-settings me-1 ms-1"></i> Account
                    Setting</a
                  >
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                  <div class="dropdown-divider"></div>
                  <div class="ps-4 p-10">
                    <a
                      href="javascript:void(0)"
                      class="btn btn-sm btn-success btn-rounded text-white"
                      >View Profile</a
                    >
                  </div>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <!-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="index.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li> -->

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="html/usertable.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">User/Client Table</span></a
                >
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="html/roomtype.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">Room Type Table</span></a
                >
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="html/room_table.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">Room Table</span></a
                >
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="html/reservationtable.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">Reservation Table</span></a
                >
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div id='calendar'></div>
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->

          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Site Analysis</h4>
                      <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>

                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="bg-dark p-10 text-white text-center" style = "width:50%;">
                      <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                      <h5 class="mb-0 mt-1"><?php echo $row["max_roomNumber"]; ?></h5>
                      <small class="font-light">Most Booked Room</small>
                    </div>
                    <div class="col-lg-9">
                      <div class="flot-chart">
                        <div
                          class="flot-chart-content"
                          id="flot-line-chart"
                        ></div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="row">
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">2540</h5>
                            <small class="font-light">Total Users</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-plus fs-3 font-16"></i>
                            <h5 class="mb-0 mt-1">120</h5>
                            <small class="font-light">New Users</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">656</h5>
                            <small class="font-light">Total Shop</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">9540</h5>
                            <small class="font-light">Total Orders</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">100</h5>
                            <small class="font-light">Pending Orders</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">8540</h5>
                            <small class="font-light">Online Orders</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Latest Posts</h4>
                </div>
                <div class="comment-widgets scrollable">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row mt-0">
                    <div class="p-2">
                      <img
                        src="assets/images/users/1.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">James Anderson</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">April 14, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="assets/images/users/4.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="font-medium">Michael Jorden</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">May 10, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="assets/images/users/5.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">Johnathan Doeting</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">August 1, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">To Do List</h4>
                  <div class="todo-widget scrollable" style="height: 450px">
                    <ul
                      class="list-task todo-list list-group mb-0"
                      data-role="tasklist"
                    >
                      <li class="list-group-item todo-item" data-role="task">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="customCheck"
                          />
                          <label
                            class="form-check-label w-100 mb-0 todo-label"
                            for="customCheck"
                          >
                            <span class="todo-desc fw-normal"
                              >Lorem Ipsum is simply dummy text of the printing
                              and typesetting industry.</span
                            >
                            <span class="badge rounded-pill bg-danger float-end"
                              >Today</span
                            >
                          </label>
                        </div>
                        <ul class="list-style-none assignedto">
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/1.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Steave"
                            />
                          </li>
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/2.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Jessica"
                            />
                          </li>
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/3.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Priyanka"
                            />
                          </li>
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/4.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Selina"
                            />
                          </li>
                        </ul>
                      </li>
                      <li class="list-group-item todo-item" data-role="task">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="customCheck1"
                          />
                          <label
                            class="form-check-label w-100 mb-0 todo-label"
                            for="customCheck1"
                          >
                            <span class="todo-desc fw-normal"
                              >Lorem Ipsum is simply dummy text of the
                              printing</span
                            ><span
                              class="badge rounded-pill bg-primary float-end"
                              >1 week
                            </span>
                          </label>
                        </div>
                        <div class="item-date">26 jun 2021</div>
                      </li>
                      <li class="list-group-item todo-item" data-role="task">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="customCheck2"
                          />
                          <label
                            class="form-check-label w-100 mb-0 todo-label"
                            for="customCheck2"
                          >
                            <span class="todo-desc fw-normal"
                              >Give Purchase report to</span
                            >
                            <span class="badge rounded-pill bg-info float-end"
                              >Yesterday</span
                            >
                          </label>
                        </div>
                        <ul class="list-style-none assignedto">
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/3.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Priyanka"
                            />
                          </li>
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/4.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Selina"
                            />
                          </li>
                        </ul>
                      </li>
                      <li class="list-group-item todo-item" data-role="task">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="customCheck3"
                          />
                          <label
                            class="form-check-label w-100 mb-0 todo-label"
                            for="customCheck3"
                          >
                            <span class="todo-desc fw-normal"
                              >Lorem Ipsum is simply dummy text of the printing
                            </span>
                            <span
                              class="badge rounded-pill bg-warning float-end"
                              >2 weeks</span
                            >
                          </label>
                        </div>
                        <div class="item-date">26 jun 2021</div>
                      </li>
                      <li class="list-group-item todo-item" data-role="task">
                        <div class="form-check">
                          <input
                            type="checkbox"
                            class="form-check-input"
                            id="customCheck4"
                          />
                          <label
                            class="form-check-label w-100 mb-0 todo-label"
                            for="customCheck4"
                          >
                            <span class="todo-desc fw-normal"
                              >Give Purchase report to</span
                            >
                            <span class="badge rounded-pill bg-info float-end"
                              >Yesterday</span
                            >
                          </label>
                        </div>
                        <ul class="list-style-none assignedto">
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/3.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Priyanka"
                            />
                          </li>
                          <li class="assignee">
                            <img
                              class="rounded-circle"
                              width="40"
                              src="assets/images/users/4.jpg"
                              alt="user"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Selina"
                            />
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Progress Box</h4>
                  <div class="mt-3">
                    <div class="d-flex no-block align-items-center">
                      <span>81% Clicks</span>
                      <div class="ms-auto">
                        <span>125</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped"
                        role="progressbar"
                        style="width: 81%"
                        aria-valuenow="10"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>72% Uniquie Clicks</span>
                      <div class="ms-auto">
                        <span>120</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-success"
                        role="progressbar"
                        style="width: 72%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>53% Impressions</span>
                      <div class="ms-auto">
                        <span>785</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-info"
                        role="progressbar"
                        style="width: 53%"
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>3% Online Users</span>
                      <div class="ms-auto">
                        <span>8</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div
                        class="progress-bar progress-bar-striped bg-danger"
                        role="progressbar"
                        style="width: 3%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- card new -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">News Updates</h4>
                </div>
                <ul class="list-style-none">
                  <li class="d-flex no-block card-body">
                    <i class="mdi mdi-check-circle fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.</a
                      >
                      <span class="text-muted"
                        >dolor sit amet, consectetur adipiscing</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">20</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-gift fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Congratulation Maruti, Happy Birthday</a
                      >
                      <span class="text-muted"
                        >many many happy returns of the day</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">11</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-plus fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Maruti is a Responsive Admin theme</a
                      >
                      <span class="text-muted"
                        >But already everything was solved. It will ...</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">19</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-leaf fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Envato approved Maruti Admin template</a
                      >
                      <span class="text-muted"
                        >i am very happy to approved by TF</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">20</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i
                      class="mdi mdi-comment-question-outline fs-4 w-30px mt-1"
                    ></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0">
                        I am alwayse here if you have any question</a
                      >
                      <span class="text-muted"
                        >we glad that you choose our template</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">15</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- column -->

            <div class="col-lg-6">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Chat Option</h4>
                  <div class="chat-box scrollable" style="height: 475px">
                    <!--chat Row -->
                    <ul class="chat-list">
                      <!--chat Row -->
                      <li class="chat-item">
                        <div class="chat-img">
                          <img src="assets/images/users/1.jpg" alt="user" />
                        </div>
                        <div class="chat-content">
                          <h6 class="font-medium">James Anderson</h6>
                          <div class="box bg-light-info">
                            Lorem Ipsum is simply dummy text of the printing
                            &amp; type setting industry.
                          </div>
                        </div>
                        <div class="chat-time">10:56 am</div>
                      </li>
                      <!--chat Row -->
                      <li class="chat-item">
                        <div class="chat-img">
                          <img src="assets/images/users/2.jpg" alt="user" />
                        </div>
                        <div class="chat-content">
                          <h6 class="font-medium">Bianca Doe</h6>
                          <div class="box bg-light-info">
                            It’s Great opportunity to work.
                          </div>
                        </div>
                        <div class="chat-time">10:57 am</div>
                      </li>
                      <!--chat Row -->
                      <li class="odd chat-item">
                        <div class="chat-content">
                          <div class="box bg-light-inverse">
                            I would love to join the team.
                          </div>
                          <br />
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="odd chat-item">
                        <div class="chat-content">
                          <div class="box bg-light-inverse">
                            Whats budget of the new project.
                          </div>
                          <br />
                        </div>
                        <div class="chat-time">10:59 am</div>
                      </li>
                      <!--chat Row -->
                      <li class="chat-item">
                        <div class="chat-img">
                          <img src="assets/images/users/3.jpg" alt="user" />
                        </div>
                        <div class="chat-content">
                          <h6 class="font-medium">Angelina Rhodes</h6>
                          <div class="box bg-light-info">
                            Well we have good budget for the project
                          </div>
                        </div>
                        <div class="chat-time">11:00 am</div>
                      </li>
                      <!--chat Row -->
                    </ul>
                  </div>
                </div>
                <div class="card-body border-top">
                  <div class="row">
                    <div class="col-9">
                      <div class="input-field mt-0 mb-0">
                        <textarea
                          id="textarea1"
                          placeholder="Type and enter"
                          class="form-control border-0"
                        ></textarea>
                      </div>
                    </div>
                    <div class="col-3">
                      <a
                        class="btn-circle btn-lg btn-cyan float-end text-white"
                        href="javascript:void(0)"
                        ><i class="mdi mdi-send fs-3"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Our partner (Box with Fix height)</h4>
                </div>
                <div
                  class="comment-widgets scrollable"
                  style="max-height: 130px"
                >
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row mt-0">
                    <div class="p-2">
                      <img
                        src="assets/images/users/1.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">James Anderson</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">April 14, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="assets/images/users/4.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="font-medium">Michael Jorden</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">May 10, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="assets/images/users/5.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">Johnathan Doeting</h6>
                      <span class="mb-3 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">August 1, 2021</span>
                        <button
                          type="button"
                          class="btn btn-cyan btn-sm text-white"
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        >
                          Publish
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- accoridan part -->
              <div class="accordion" id="accordionExample">
                <div class="card mb-0">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <a
                        class="d-flex align-items-center"
                        data-toggle="collapse"
                        data-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        <i
                          class="me-1 mdi mdi-magnet fs-4"
                          aria-hidden="true"
                        ></i>
                        <span>Accordion Example 1</span>
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapseOne"
                    class="collapse show"
                    aria-labelledby="headingOne"
                    data-parent="#accordionExample"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidatat skateboard dolor brunch. Food truck
                      quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                      tempor, sunt aliqua put a bird on it squid single-origin
                      coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice
                      lomo. Leggings occaecat craft beer farm-to-table, raw
                      denim aesthetic synth nesciunt you probably haven't heard
                      of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card mb-0 border-top">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <a
                        class="collapsed d-flex align-items-center"
                        data-toggle="collapse"
                        data-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        <i
                          class="me-1 mdi mdi-magnet fs-4"
                          aria-hidden="true"
                        ></i>
                        <span>Accordion Example 2</span>
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapseTwo"
                    class="collapse"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionExample"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidatat skateboard dolor brunch. Food truck
                      quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                      tempor, sunt aliqua put a bird on it squid single-origin
                      coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice
                      lomo. Leggings occaecat craft beer farm-to-table, raw
                      denim aesthetic synth nesciunt you probably haven't heard
                      of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card mb-0 border-top">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <a
                        class="collapsed d-flex align-items-center"
                        data-toggle="collapse"
                        data-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        <i
                          class="me-1 mdi mdi-magnet fs-4"
                          aria-hidden="true"
                        ></i>
                        <span>Accordion Example 3</span>
                      </a>
                    </h5>
                  </div>
                  <div
                    id="collapseThree"
                    class="collapse"
                    aria-labelledby="headingThree"
                    data-parent="#accordionExample"
                  >
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidatat skateboard dolor brunch. Food truck
                      quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                      tempor, sunt aliqua put a bird on it squid single-origin
                      coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                      helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice
                      lomo. Leggings occaecat craft beer farm-to-table, raw
                      denim aesthetic synth nesciunt you probably haven't heard
                      of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
              <!-- toggle part -->
              <div id="accordian-4">
                <div class="card mt-4">
                  <a
                    class="card-header link"
                    data-toggle="collapse"
                    data-parent="#accordian-4"
                    href="#Toggle-1"
                    aria-expanded="true"
                    aria-controls="Toggle-1"
                  >
                    <i
                      class="seticon mdi mdi-arrow-right-bold"
                      aria-hidden="true"
                    ></i>
                    <span>Toggle, Open by default</span>
                  </a>
                  <div id="Toggle-1" class="collapse show multi-collapse">
                    <div class="card-body widget-content">
                      This box is opened by default, paragraphs and is full of
                      waffle to pad out the comment. Usually, you just wish
                      these sorts of comments would come to an end.
                    </div>
                  </div>
                  <a
                    class="card-header link border-top"
                    data-toggle="collapse"
                    data-parent="#accordian-4"
                    href="#Toggle-2"
                    aria-expanded="false"
                    aria-controls="Toggle-2"
                  >
                    <i class="seticon mdi mdi-close" aria-hidden="true"></i>
                    <span>Toggle, Closed by default</span>
                  </a>
                  <div id="Toggle-2" class="multi-collapse collapse" style="">
                    <div class="card-body widget-content">
                      This box is now open
                    </div>
                  </div>
                  <a
                    class="card-header collapsed link border-top"
                    data-toggle="collapse"
                    data-parent="#accordian-4"
                    href="#Toggle-3"
                    aria-expanded="false"
                    aria-controls="Toggle-3"
                  >
                    <i class="seticon mdi mdi-close" aria-hidden="true"></i>
                    <span>Toggle, Closed by default</span>
                  </a>
                  <div id="Toggle-3" class="collapse multi-collapse">
                    <div class="card-body widget-content">
                      This box is now open
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tabs -->
              <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-bs-toggle="tab"
                      href="#home"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab1</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#profile"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab2</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#messages"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Tab3</span></a
                    >
                  </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="p-20">
                      <p>
                        And is full of waffle to It has multiple paragraphs and
                        is full of waffle to pad out the comment. Usually, you
                        just wish these sorts of comments would come to an
                        end.multiple paragraphs and is full of waffle to pad out
                        the comment..
                      </p>
                      <img
                        src="assets/images/background/img4.jpg"
                        class="img-fluid"
                      />
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="profile" role="tabpanel">
                    <div class="p-20">
                      <img
                        src="assets/images/background/img4.jpg"
                        class="img-fluid"
                      />
                      <p class="mt-2">
                        And is full of waffle to It has multiple paragraphs and
                        is full of waffle to pad out the comment. Usually, you
                        just wish these sorts of comments would come to an
                        end.multiple paragraphs and is full of waffle to pad out
                        the comment..
                      </p>
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="messages" role="tabpanel">
                    <div class="p-20">
                      <p>
                        And is full of waffle to It has multiple paragraphs and
                        is full of waffle to pad out the comment. Usually, you
                        just wish these sorts of comments would come to an
                        end.multiple paragraphs and is full of waffle to pad out
                        the comment..
                      </p>
                      <img
                        src="assets/images/background/img4.jpg"
                        class="img-fluid"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>

    <script src="assets/libs/flot/excanvas.js"></script>
    <script src=".assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <!-- Calendar -->
    <script src="calendar/js/moment.min.js"></script>
    <script src="calendar/js/jquery.min.js"></script>
    <script src="calendar/js/fullcalendar.min.js"></script>
    <script>

      $(document).ready(function() {

        $('#calendar').fullCalendar({
          editable: false,
          events: <?php echo json_encode($resp) ?>,

        });

      });

    </script>


  </body>
</html>
