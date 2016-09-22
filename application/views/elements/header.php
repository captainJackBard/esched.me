<?php
  if(!$this->session->Auth){
    return redirect('admin/login');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eSched.me</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>css/sol.css">

  <!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>  

  <style type="text/css">
    .content{width: 90%}
    .breadcrumb {width: 80%; margin-right: auto;margin-left: auto;}
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<!--Header-->



<!--NAV-->

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><em></em>eS</b>me</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>e</b>Sched.me</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color:#367fa9">

      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> -->
      <!--Search-->
    <div class="col-sm-12 col-md-6 col-xs-11" style="position:block">
        <form class="navbar-form" action="<?php echo base_url(); ?>searches" method="post" role="search">
        <div class="input-group" style="width:100%">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search eSched for people">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    <!--endSearch-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown" onclick="ajaxFriendRequestSeenUpdate()">
              <i class="fa fa-group"></i>
              <span class="label label-danger fb-count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Friend Requests</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu fb-friend-request">
                  
                </ul>
              </li>
              <li class="footer"><a href="#"></a></li>
            </ul>
          </li>



          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="footer"><a href="#" data-toggle="modal" data-target="#createMessage">Create New Message</a></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#" data-toggle="modal" data-target="#convo">
                      <div class="pull-left">
                        <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-globe"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <i class="fa fa-user"></i>
              <span class="hidden-xs"> <?php echo ucwords($this->session->Auth['first_name'].' '.$this->session->Auth['last_name']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height:100px">
                <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

               
               <p>
               <a href="<?php echo base_url(); ?>dashboard" style="color:white">
                  <?php echo ucwords($this->session->Auth['first_name'].' '.$this->session->Auth['last_name']); ?>
                  
                </a>
                <small><?php echo $this->session->Auth['email']; ?></small>
                </p>
                
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Friends</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo base_url(); ?>dashboard">Profile</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-left">
                  <button class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModalNorm">
                    Change Password
                  </button>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

    <!-- Content Wrapper. Contains page content -->
  

  <!--Flash Data-->

 

  <!--Flash Data-->
  <!--endNAV-->

<?php
  $this->load->view('elements/createMessage');
  $this->load->view('elements/convo');
  //$this->load->view('elements/left');
?>

<div class="content-wrapper" style="margin-left:0">

 <?php
  $this->load->view('elements/notif');
  ?>