<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <link rel="icon" type="image/png" href="assets/img/favicon.ico">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

   <title>Khoa luan</title>

   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
   <meta name="viewport" content="width=device-width" />
   <!-- Bootstrap core CSS     -->

   <!--  Light Bootstrap Table core CSS    -->
   <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- js && css mapbox -->
<script src='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.1.0/mapbox.css' rel='stylesheet' />


   <!--     Fonts and icons     -->
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">

   <style type="text/css">

    .navbar .navbar-brand {
      font-weight: 600;
      margin: 5px 0px;
      padding: 15px 50px;
      font-size: 20px;
      color: red;
  }
  .navbar{

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

#thongtin a:hover{
  color: red;
}

</style>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

</head>
<body>
<?php
  $tentaikhoan = '';
  if(isset($_GET['username'])){
    $tentaikhoan = $_GET['username'];
  }
 ?>
<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-3.jpg"> <!-- Begin sidebar -->

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
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=formdulieuaqi">
                        <i class="pe-7s-back-2"></i>
                        <p>Mẫu dữ liệu AQI</p>
                    </a>
                </li> <!-- form du lieu aqi -->

                <li class="">
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=dulieudauvao">
                        <i class="pe-7s-wallet"></i>
                        <p>Dữ liệu đầu vào</p>
                    </a>
                </li> <!-- du lieu dau vao -->

                <li>
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=aqigio&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                        <i class="pe-7s-note"></i>
                        <p>Chỉ số AQI giờ</p>
                    </a>
                </li> <!-- chi so aqi gio -->

                <li>
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=aqingay&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Chỉ số AQI ngày</p>
                    </a>
                </li> <!-- chi so aqi ngay -->

                <li>
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=bieudoaqi&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                        <i class="pe-7s-graph1"></i>
                        <p>Xem biểu đồ</p>
                    </a>
                </li><!-- xem bieu do -->

                <li>
                    <a href="dashboard-aqi.php?username=<?php echo $tentaikhoan ?>&active=bando&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                       <i class="pe-7s-map-marker"></i>
                        <p>Xem bản đồ</p>
                    </a>
                </li> <!-- xemban do -->

                 <li>
                    <a href="http://khoa-luan.local/aqi/lapbaocao-main.php?username=<?php echo $tentaikhoan ?>&active=lapbaocao&&filename=<?php
                if(isset($_GET['filename'])){
                    echo $_GET['filename'];
            }
            ?>">
                        <i class="pe-7s-copy-file"></i>
                        <p>Lập báo cáo</p>
                    </a>
                </li> <!-- xemban do -->

            </ul>
        </div>
    </div> <!-- End Sidebar -->



    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: white">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Hệ thống tính toán chỉ số AQI</a>
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

                    <ul id="thongtin" class="nav navbar-nav navbar-right">
                        <li>
                              <h4 style="padding-top:5px"><span class="glyphicon glyphicon-user" aria-hidden="true">
                              <?php echo $tentaikhoan ; ?> </span></h4>
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
                     // if(isset($_GET['active'])){
                     //    if ($_GET['active']=='dulieudauvao') {
                     //        require("history_aqi_new.php");
                     //    }else if($_GET['active']=='dulieuuser') {
                     //        require("dulieu_user.php");
                     //    }else if($_GET['active']=='aqigio'){
                     //        require("aqi_gio.php");
                     //    }else if($_GET['active']=='aqingay'){
                     //        require("aqi_ngay.php");
                     //    }else if($_GET['active']=='bieudoaqi'){
                     //         require("bieudoaqi.php");
                     //    }else if($_GET['active']=='bando'){
                     //        require("ms.php");
                     //    }
                     // }else{ require("formdulieu-aqi.php");}
                     if(isset($_GET['active'])){

                      	if($_GET['active']=='formdulieuaqi'){
                        require("formdulieu-aqi.php");
                      	}//-> goi form dulieu
                      	elseif ($_GET['active']=='dulieudauvao') {
                      		require("history_aqi_new2.php");
                      	}//-> goi tbl_history
                      	elseif($_GET['active']=='dulieuuser'){
                      		require("dulieu_user.php");
                      	}elseif ($_GET['active']=='aqigio') {
                      		if(isset($_GET['filename'])){
                      			if ($_GET['filename']!=''){
                      				require("aqi_gio.php");
                      			}else{
                      	?>
										<script type="text/javascript">
											alert("Bạn chưa chọn dữ liệu đầu vào");
										</script>
                      	<?php
                      			require("history_aqi_new2.php");
                      			}
                      		}
                      	}elseif($_GET['active']=='aqingay'){
                      		if(isset($_GET['filename'])){
                      			if ($_GET['filename']!=''){
                      				require("aqi_ngay.php");
                      			}else{
                      	?>
                      		<script type="text/javascript">
											alert("Bạn chưa chọn dữ liệu đầu vào");
									</script>
                      	<?php
                      		require("history_aqi_new2.php");
                      			}
                      		}
                      	}
                      	elseif($_GET['active']=='bieudoaqi'){
                      		if(isset($_GET['filename'])){
                      			if ($_GET['filename']!=''){
                      				require("bieudoaqi.php");
                      			}else{
                      	?>
                      		<script type="text/javascript">
											alert("Bạn chưa chọn dữ liệu đầu vào");
									</script>

                      	<?php
                      			require("history_aqi_new2.php");
                      			}
                      		}
                      	}elseif($_GET['active']=='lapbaocao'){
                      		if(isset($_GET['filename'])){
                      			if($_GET['filename']!=''){
                      				require("history_aqi_new2.php");
                      			}else{
                              ?>
                              <script type="text/javascript">
                                alert("Bạn chưa chọn dữ liệu đầu vào !");
                              </script>
                              <?php

                            }
                      		}
                      	}
                      	else{
                          if(isset($_GET['filename'])){
                            if($_GET['filename']==''){
                          ?>
                            <script type="text/javascript">
                              alert("Bạn chưa chọn dữ liệu đầu vào !")
                            </script>
                          <?php
                          require("history_aqi_new2.php");
                          }else{
                            require("map-main.php");
                          }

                     }
                    }
                  }else{
                      require("test.php");
                    }
                    ?>
                    </div>

                </div>
            </div>
        </div> <!-- end content -->

        <footer class="footer" style="background: white"> <!-- Begin footer -->
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                            <li><a href="../index-user1.php?username=<?php echo $tentaikhoan ?>" style=""><span class="glyphicon glyphicon-arrow-left"> </span> Trang chủ</a></li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="#">Khoa luan</a>, Hỗ trợ tốt nhất cho bạn
                </p>
            </div>
        </footer> <!-- End footer -->

    </div>
</div>


</body>



    <!--  Notifications Plugin    -->
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
                message: "Xin chào, <b>Khoa luan</b>"

            },{
                type: 'info',
                timer: 5
            });

        });
    </script>

</html>
