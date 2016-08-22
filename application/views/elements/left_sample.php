<?php
$leftMenus = array(
  
  'Profile' => array(
        'icon' => 'fa-user',
        'children' => array(
              array('link' => 'admin/index/1','caption' => 'Dashboard'),

          ),
        'group' => 'profile',
        
    ),
  'Accounts' => array(
    'icon' => 'fa-users',
    'children' => array(
        array('link' => 'home', 'caption' => 'Users'), 
      ),
    'group' => 'accounts'
    ),
  
);

$group = isset($_GET['group']) ? $_GET['group'] : ''; 
?>

<!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


        <div class="user-panel">
          <div class="pull-left image" style="padding-bottom:40px;">
            <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
          </div>
          <div class="pull-left info">
            <p><?php

                echo ucwords($this->session->Auth['first_name'].' '.$this->session->Auth['last_name']);

                ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->


          <ul class="sidebar-menu">
            <?php
            foreach ($leftMenus as $menuName => $menu) {
              $hasChildren = count($menu['children']) ? true : false;   

              $classes = array();

              if ($hasChildren) {
                array_push($classes, 'treeview');
              }
              
              if ($group == $menu['group']) {
                array_push($classes, 'active');
              }

              $class = 'class="'. implode(' ', $classes). '"';

              echo "<li {$class}>";

              if ($hasChildren) {
                echo '<a href="#">';                
              } else {
                echo '<a href="',$menu['link'],'">';
              }              
              
              echo '<i class="fa ',$menu['icon'],'"></i>';
              echo '<span>',$menuName,'</span>';
              if ($hasChildren) {
                echo '<i class="fa fa-angle-left pull-right"></i>';                
              }                            
              echo '</a>';   

              if (count($menu['children'])) {
                echo '<ul class="treeview-menu">';
                foreach ($menu['children'] as $child) {
                  
                  $captionLink = strtolower($child['caption']);
                  $captionLink = str_replace(' ', '', $captionLink);                   


                  $class = ($view == $captionLink) ? ' class="active"' : '';

                  echo "<li{$class}>";

                  echo '<a href="',$child['link'],'"><i class="fa fa-circle-o"></i> ',$child['caption'],'</a>';
                  echo '</li>';
                }
                echo '</ul>';
              }

              echo '</li>';
            }   
            ?>
              
            <!-- <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>