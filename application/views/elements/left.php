<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="text-align:center">
        <div class="pull-left image" style="padding-bottom:40px;">
          <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p><?php

              echo ucwords($this->session->Auth['first_name'].' '.$this->session->Auth['last_name']);

              ?></p>
          <a href="<?php echo base_url(); ?>#"><i class="fa fa-user text-success"></i> <?php echo $this->session->Auth['email']; ?></a>
        </div>
      </div>
     


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url(); ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-book"></i> <span>Task</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">3</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-group"></i> <span>Friends</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-map"></i> <span>Map</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li class="header">MAIN NAVIGATION</li>
    </section>
    <!-- /.sidebar -->
  </aside>