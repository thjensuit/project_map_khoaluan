<!doctype html>
<html lang="en">
<head>
     <meta charset="utf-8" />
   <link rel="icon" type="image/png" href="assets/img/favicon.ico">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

   <title>Thái Sơn</title>

   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
   <meta name="viewport" content="width=device-width" />
   <!-- Bootstrap core CSS     -->

   <!--  Light Bootstrap Table core CSS    -->
   <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">





   <!-- js && css mapbox -->
 <script src='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.css' rel='stylesheet' />


   <!--     Fonts and icons     -->
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">

   <style type="text/css">
   a:visited {
    color: green;
}
    .navbar .navbar-brand {
      font-weight: 600;
      margin: 5px 0px;
      padding: 15px 50px;
      font-size: 20px;
      color: #7a7a52;

  }
  .navbar{
  background: white;
  }

  /*history*/


  .my-icon {
      border-radius: 100%;
      width: 25px;
      height: 25px;
      text-align: center;
      line-height: 20px;
      color: white;
  }



</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

</head>
<body>

<?php
  $tentaikhoan = '';
  $_GET['username']='';
  if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  }
 ?>
<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="assets/img/sidebar-2.jpg"> <!-- Begin sidebar -->

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Menu
                </a>
            </div>

            <ul class="nav">
                <li class="">
                    <a href="dashboard.php?username=<?php echo $tentaikhoan ?>&active=thongtinnv" style="visited:black">
                        <i class="pe-7s-back-2"></i>
                        <p>Thông tin nhân viên</p>
                    </a>
                </li> <!-- mau du lieu chuan -->

                <li class="">
                    <a href="dashboard.php?username=<?php echo $tentaikhoan ?>&active=dulieuwqi" style="visited:black">
                        <i class="pe-7s-wallet"></i>
                        <p>Dữ liệu WQI</p>
                    </a>
                </li> <!-- dulieudauvao -->

                <li>
                    <a href="dashboard.php?username=<?php echo $tentaikhoan ?>&active=dulieuaqi&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                        <i class="pe-7s-note"></i>
                        <p>Dữ liệu AQI</p>
                    </a>
                </li> <!-- wqithongso -->

                <li>
                    <a href="dashboard.php?username=<?php echo $tentaikhoan ?>&active=dulieubando">
                        <i class="pe-7s-note2"></i>
                        <p>Dữ liệu file bản đồ</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div> <!-- End Sidebar -->



    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Quản lý hệ thống</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                      <!--   <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                      <li>
                        <h4 style="padding-top:5px"><span class="glyphicon glyphicon-user" aria-hidden="true">
                          <?php echo "admin" ; ?> </span></h4>
                      </li>
                        <li>
                            <a href="http://khoa-luan.local/index.php" style="font-weight: 600">
                                Thoát
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content"  > <!-- begin content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET['active']))
                          {
                            if($_GET['active']=='thongtinnv'){
                              require("thongtinnv.php");
                            }else if($_GET['active']=='dulieuwqi'){
                              require("dulieuwqi.php");
                            }else if($_GET['active']=='dulieubando'){
                              require("dulieubando.php");
                            }
                            else{
                              require("dulieuaqi.php");
                            }
                          }else{
                            require("thongtinnv.php");
                          }
                        ?>
                    </div>

                </div>
            </div>
        </div> <!-- end content -->

        <footer class="footer"> <!-- Begin footer -->
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                            <li><a href="../index-quanly1.php?username=<?php echo "admin" ?>" style=""><span class="glyphicon glyphicon-arrow-left"> </span> Trang chủ</a></li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="">Thái Sơn</a>, Hỗ trợ tốt nhất cho bạn
                </p>
            </div>
        </footer> <!-- End footer -->

    </div>
</div>


</body>

     <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-info',
                message: "Xin chào, <b>Thái sơn</b>"

            },{
                type: 'info',
                timer: 5
            });

        });
    </script>


</html>
