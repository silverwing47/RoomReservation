<?php
  ob_start();
  $conn =mysqli_connect("localhost","root","","db_resrv");
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../assets/images/favico.png"
    />

    <!-- modal -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="../modal/css/ionicons.min.css">
		<link rel="stylesheet" href="../modal/css/style.css">

    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/extra-libs/multicheck/multicheck.css"
    />
    <link
      href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
      rel="stylesheet"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <link href="../modal/css/custom.css" rel="stylesheet" />

  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div> -->
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
            <a class="navbar-brand" href="../index.html">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <!-- <img
                  src="../../assets/images/favico.png"
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
                  src="../../assets/images/logo.png"
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
                    src="../assets/images/users/1.jpg"
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
                  href="../index.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li> -->

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="usertable.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">User/Client Table</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="roomtype.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">Room Type Table</span></a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="room_table.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-inside"></i
                  ><span class="hide-menu">Room Table</span></a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="reservationtable.php"
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
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Tables</h4>
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
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Room Type Table</h5>
                  <br>
                  <a type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addUser">Add Room Type</a>
                  <br><br>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Type</th>
                          <th>price_morning</th>
                          <th>price_afternoon</th>
                          <th>price_evening</th>

                          <th>Edit Reservation</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                            $sql = "SELECT * FROM tbl_roomtype";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["type"] . "</td><td>"
                                            . $row["price_morning"]. "</td><td>" . $row["price_afternoon"] . "</td><td>" . $row["price_evening"] . "</td>
                                            <td>" . "<a href='#' class='hehe'><i class='fas fa-edit' data-toggle='modal'data-target='#updateUser".$row['id']. "'>Update
                                            </i></a> &nbsp <a href='#' class='hehe'><i class='fas fa-trash-alt' data-toggle='modal' data-target='#deleteUser". $row['id']. "'>Delete</i></a>". "</td>
                                            </tr>";

                                            $sql2 = "SELECT * FROM tbl_roomtype WHERE id = ' ".$row['id']." ' ";
                                            $result2 = mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($result2);
                                            $user = $row['id'];

                                            echo "<div id='updateUser".$row['id']."' class='modal fade' role='dialog'>

                                            <div class='modal-dialog'>

                                              <!-- Modal content-->
                                              <div class='modal-content'>
                                                <div class='modal-header'>

                                                </div>
                                                <div class='modal-body'>


                                                  <div class='modal-body p-4 py-5 p-md-5'>
                                                    <h3 class='text-center mb-3'>Update Room Type</h3>
                                                    <br>
                                                    <form class='signup-form'  method='POST'>
                                                        <input type='text' class='form-control' value='". $row2["id"] ."' name='id' hidden>
                                                      <div class='form-group mb-2'>
                                                        <label for='name'>type</label>
                                                        <input type='text' class='form-control' value='". $row2["type"] ."' name='type'>
                                                      </div>
                                                      <div class='form-group mb-2'>
                                                        <label for='name'>price_morninge</label>
                                                        <input type='text' class='form-control' value='". $row2["price_morning"] ."' name='price_morning'>
                                                      </div>
                                                      <div class='form-group mb-2'>
                                                        <label for='name'>price_afternoon</label>
                                                        <input type='text' class='form-control' value='". $row2["price_afternoon"] ."' name='price_afternoon' >
                                                      </div>
                                                      <div class='form-group mb-2'>
                                                        <label for='name'>price_evening</label>
                                                        <input type='text' class='form-control' value='". $row2["price_evening"] ."' name='price_evening'>
                                                      </div>

                                                      <br>
                                                      <div class='form-group mb-2'>
                                                        <button type='submit' class='form-control btn btn-primary rounded submit px-3' name='btnUpdateUser'>Upate Room Type</button>
                                                      </div>


                                                    </form>
                                                  </div>


                                                </div>
                                                <div class='modal-footer'>
                                                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                </div>
                                              </div>

                                            </div>
                                          </div>";

                                          echo "<div id='deleteUser".$row['id']."' class='modal fade' role='dialog'>

                                          <div class='modal-dialog'>

                                            <!-- Modal content-->
                                            <div class='modal-content'>
                                              <div class='modal-header'>

                                              </div>
                                              <div class='modal-body'>
                                                <div class='modal-body p-4 py-5 p-md-5'>
                                                  <h3 class='text-center mb-3'>Delete Room Type</h3>
                                                  <br>
                                                  <form class='signup-form'  method='POST'>
                                                        <input type='text' class='form-control' value=' ". $row2["id"] ." ' name='deluserID' hidden>
                                                    <br>
                                                      <input type='text' class='form-control' value=' ". $row2["type"] ." " . $row2["price_morning"] ." " . $row2["price_afternoon"] ." " . $row2["price_evening"] ." ' name='user_Name' readonly>
                                                    <p> Do you want to delete this User? </p>
                                                    <div class='form-group mb-2'>
                                                      <button type='submit' class='form-control btn btn-primary rounded submit px-3' name='btnDeleteUser'>Delete Room Type</button>
                                                    </div>
                                                  </form>
                                                </div>

                                              </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>";
                                            }
                                            // echo "</table>";
                                            } else { echo "0 results"; }
                                            // $conn->close();

                                           ?>
                      </tbody>
                      <tfoot>
                        <!-- <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr> -->
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->

          <!-- Modal Add User -->
          <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="ion-ios-close"></span>
                  </button>
                </div>
                <div class="modal-body p-4 py-5 p-md-5">
                  <h3 class="text-center mb-3">New Room Type</h3>
                  <br>
                  <form action="#" class="signup-form"  method="POST">
                    <div class="form-group mb-2">
                      <label for="name">Type</label>
                      <input type="text" class="form-control" placeholder="" name="type">
                    </div>
                    <div class="form-group mb-2">
                      <label for="name">price_morning</label>
                      <input type="text" class="form-control" placeholder="" name="price_morning">
                    </div>
                    <div class="form-group mb-2">
                      <label for="name">price_afternoon</label>
                      <input type="text" class="form-control" placeholder="" name="price_afternoon">
                    </div>
                    <div class="form-group mb-2">
                      <label for="name">price_evening</label>
                      <input type="text" class="form-control" placeholder="" name="price_evening">
                    </div>

                    <br>
                    <div class="form-group mb-2">
                      <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="btnAddRoomType">Add Room Type</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>


          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>

    <!-- modal -->
    <script src="../modal/js/jquery.min.js"></script>
    <script src="../modal/js/popper.js"></script>
    <script src="../modal/js/bootstrap.min.js"></script>
    <script src="../modal/js/main.js"></script>


  </body>

  <?php
  if(isset($_POST['btnAddRoomType'])){
      $type=$_POST['type'];
      $price_morning=$_POST['price_morning'];
      $price_afternoon=$_POST['price_afternoon'];
      $price_evening=$_POST['price_evening'];

      // $query="INSERT INTO usertbl (firstName, lastName, email, password, phone) VALUES ('$fname','$lname', '$email',SHA('$pwd'), '$phone')"; //for encryption of password utilize SHA()
      $query="INSERT INTO tbl_roomtype (type, price_morning, price_afternoon, price_evening) VALUES ('$type','$price_morning', '$price_afternoon','$price_evening')";
      mysqli_query($conn,$query);
      header("Location: roomtype.php");
      // $count = mysqli_num_rows($result);
      // if($count ==0)
      //   echo "<script language='javascript'> alert('Incorrect username or password');</script>";
      // else{
      //   $row=mysqli_fetch_assoc($result);
      //   $_SESSION['login']=$row['email'];
      //   header("Location: ../index.php");
      // }
  }
  if(isset($_POST['btnUpdateUser'])){

        $type=$_POST['type'];
        $id=$_POST['id'];
        $price_morning=$_POST['price_morning'];
        $price_afternoon=$_POST['price_afternoon'];
        $price_evening=$_POST['price_evening'];


        $sql3 = mysqli_query($conn,"UPDATE tbl_roomtype set type='$type',price_morning='$price_morning',price_afternoon='$price_afternoon',price_evening='$price_evening' where id = $id");
        header("Location: roomtype.php");

    }
    if(isset($_POST['btnDeleteUser'])){
            $deluser=$_POST['deluserID'];
            $sql4 = mysqli_query($conn,"DELETE FROM tbl_roomtype WHERE id = $deluser");
            header("Location: roomtype.php");

      }
      ?>

</html>
