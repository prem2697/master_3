<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
if ($_SESSION['control'] != "admin") {
    header("location:login.php");
}
include_once("../connect.php");
include_once("../navigationfun.php");
$cn = new connect();
$cn->connectdb();
if (!isset($_GET['shipper_id'])) {
    header("location:customerview.php");
}
$shipper_id = $_GET['shipper_id'];
$sql = "SELECT * FROM tbl_shipper WHERE shipper_id='$shipper_id'";
$result = $cn->selectdb($sql);
if ($cn->numRows($result) > 0) {
} else {
    header("location:customerview.php");
}
?>
<?php
if (isset($_POST['Submit'])) {
  $person = $_POST['txtPerson'];
  $mobile = $_POST['txtMobile'];
  $email = $_POST['txtEmail'];
  $sql="INSERT INTO tbl_shipper_info(shipper_id,person_name,mobile_no,email_id) VALUES('".$shipper_id."','".$person."','".$mobile."','".$email."')";
  //echo $sql;
  $cn->insertdb($sql);
  header("location:customerupdate.php?shipper_id=".$_GET['shipper_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ICED Infotech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                        <!-- <span class="logo-lg-text-light">Xeria</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="assets/images/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Customer</h4>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->

        <?php
        include 'menu.php';
        ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">Insert Customer Contact</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <form class="form-horizontal" role="form" method="post">
                                                <div class="form-group row">
                                                    <label class="col-sm-2  col-form-label" for="txtPerson">Person Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="txtPerson" class="form-control" placeholder="Person Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2  col-form-label" for="txtMobile">Mobile No</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="txtMobile" class="form-control" placeholder="Mobile No">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2  col-form-label" for="txtEmail">Email-ID</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="txtEmail" class="form-control" placeholder="Email-ID">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2  col-form-label" for="example-placeholder"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary width-md" name="Submit">Insert</button>
                                                        <a href="customerupdate.php?shipper_id=<?php echo $_GET['shipper_id'];?>" class="btn btn-lighten-primary waves-effect waves-primary  width-md">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div> <!-- content -->
            <?php
            include 'footer.php';
            ?>

            <!-- Vendor js -->
            <script src="assets/js/vendor.min.js"></script>

            <!-- App js -->
            <script src="assets/js/app.min.js"></script>

</body>

</html>
