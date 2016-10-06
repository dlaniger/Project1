<!DOCTYPE html>
<html lang="en" ng-app="tikiTrotter">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Tiki Trotter - Hotel Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

    <!-- Custom Tiki CSS -->
    <link href="<?=base_url()?>css/tiki.css" rel="stylesheet">   
    <link href="<?=base_url()?>lineicons/style.css" rel="stylesheet"> 
    
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style-responsive.css" rel="stylesheet">
    <link href="<?=base_url()?>bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">

    <script src="<?=base_url()?>js/angular/angular.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>js/controllers/app.js" type="text/javascript"></script>

  </head>

  <body>
  <!-- <div class="busy"> -->
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><img src="<?=base_url()?>/img/tiki_trotter_small.png" height="40" style="padding-left: 5px;"/></a>
            <!--logo end-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <!-- <li><a class="logout" href="/dashboard/lock"><i class="li_lock"></i></a></li> -->
                    <li><a class="logout" href="/logout">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <div ng-controller="dashboardController">
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="<?=base_url()?>img/tiki.png" class="img-circle" width="90"></a></p>
                  <h5 class="centered">{{information.hotel_name}}</h5>
                  <div align="center">
                  <font color="#999" size="1px;">
                    You are logged in as<br/>
                  </font>
                  <font size="2px;" color="#fff">
                    <?=$this->session->userdata("fullname")?>
                  </font>
                  </div>
                  <li class="mt">
                      <a href="/dashboard/main">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="/dashboard/inbox">
                          <i class="li_mail"></i>
                          <span>
                            Messages
                            <span ng-if="nav_badge > 0">
                              <span class="badge bg-success"></span>
                            </span>                            
                          </span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="li_shop"></i>
                          <span>Hotel Profile</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/dashboard/info">General Information</a></li>
                          <li><a  href="/dashboard/rooms">Accommodations</a></li>
                          <!-- <li><a  href="/dashboard/amenities">Amenities</a></li> -->
                          <li><a  href="/dashboard/gallery">Gallery</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="li_user"></i>
                          <span>Account Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/dashboard/options">Options</a></li>
                          <li><a  href="/dashboard/users">Users</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      </div>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!-- <div class="busy"> -->
      <!--main content start-->
        <?php $this->load->view($main_content); ?>
      <!--main content end-->
      <!-- </div> -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>js/jquery.js"></script>
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
    var j = $.noConflict(true);
    </script>
    <script src="<?=base_url()?>js/fullcalendar/fullcalendar.min.js"></script>    
    <script src="<?=base_url()?>/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
    <script src="<?=base_url()?>js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url()?>js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="<?=base_url()?>js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?=base_url()?>js/calendar-conf-events.js"></script>    
    <script src="<?=base_url()?>js/dashboard.js"></script>    

    <script>
      $('#checkin input').datepicker({
        autoclose: true
      });
      $('#checkout input').datepicker({
        autoclose: true
      });
    </script>

  </body>
</html>
