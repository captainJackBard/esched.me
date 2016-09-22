<?php

$this->load->view('elements/header');
// debug($activities);
if(empty($activities)){
  $activities[0] = array('eSched HQ',15.21,120.58,'');
}
// debug($this->session->Auth);
// debug($activity_post);
?>



  <div class="col-lg-12">
        
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-user"></i>  <a href="#">Your Profile</a>
            </li>
        </ol>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a href="#" data-toggle="modal" data-target="#myProfPic"><img class="profile-user-img img-responsive img-circle" src="<?php echo $this->img; ?>" alt="User profile picture"></a>

              <h3 class="profile-username text-center"><?php echo ucwords($user['first_name']." ".$user['last_name']); ?></h3>

              <p class="text-muted text-center"><?php echo ucwords($user['occupation']); ?></p>

              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Associates</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <?php if($this->session->Auth['id'] != $user['id']):?>
                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Info</strong>

              <p class="text-muted">
                <?php if(empty($user['about_me']) && $user['id'] == $this->session->Auth['id']): ?>
                <a href="#settings" data-toggle="tab">Set your info</a>
                <?php endif; ?>
                <?php echo ucfirst($user['about_me']); ?>
              </p>

              <hr />

              <strong><i class="fa fa-user margin-r-5"></i> Occupation</strong>

              <p class="text-muted">
              <?php if(empty($user['occupation']) && $user['id'] == $this->session->Auth['id']): ?>
                <a href="#settings" data-toggle="tab">Set your info</a>
                <?php endif; ?>
              <?php echo ucfirst($user['occupation']); ?>
                
              </p>

              <hr />

              <strong><i class="fa fa-plus margin-r-5"></i> Skills</strong>

              <p class="text-muted">
              <!-- <?php if(empty($user['occupation']) && $user['id'] == $this->session->Auth['id']): ?>
                <a href="#settings" data-toggle="tab">Set your info</a>
                <?php endif; ?> -->
              <?php //echo ucfirst($user['occupation']); ?>
                
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- ABOUT ME /.box -->


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Groups</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <a href="#" data-toggle="modal" data-target="#CreateGroup">
                Create Group
              </a>

              <p class="text-muted">
                
              </p>

              <hr />
            </div>
            <!-- /.box-body -->
          </div>
          <!-- ABOUT ME /.box -->

          <?php 
            $this->load->view('elements/CreateGroup');
            $this->load->view('elements/myProfPic');
            $this->load->view('users/activityModal');
          ?>




        </div>
        <!-- /.col -->
        <div class="col-md-9">

            <!--MAP-->

              <div class="container-fluid">
              <!-- Page Heading -->
              <div class="row">
                  
              </div>

              <div class="row">
                  <div class="col-lg-12" style="height:450px;">
                      <div id="map" style="height:100%"></div>
                  </div>
              </div>

              <div class="clearfix">&nbsp;</div>
          </div>

          <script type="text/javascript">
            
            jQuery(function($) {
              // Asynchronously Load the map API
              var script = document.createElement('script');
          //    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
              script.src = "http://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_KEY; ?>&signed_in=true&callback=initialize";
              document.body.appendChild(script);
          });

          function initialize() {
              var map;
              var bounds = new google.maps.LatLngBounds();
              var mapOptions = {
                  mapTypeId: 'roadmap'
              };

              // Display a map on the page
              map = new google.maps.Map(document.getElementById("map"), mapOptions);
              map.setTilt(45);

              // Multiple Markers
              var markers = <?php echo json_encode($activities); ?>;

              // Info Window Content
          //    var infoWindowContent = [
          //        ['<div class="info_content">' +
          //        '<h3>London Eye</h3>' +
          //        '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +        '</div>'],
          //        ['<div class="info_content">' +
          //        '<h3>Palace of Westminster</h3>' +
          //        '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
          //        '</div>']
          //    ];

              // Display multiple markers on a map
          //    var infoWindow = new google.maps.InfoWindow(), marker, i;

              // Loop through our array of markers & place each one on the map
              for( i = 0; i < markers.length; i++ ) {
                  var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                  bounds.extend(position);
                  marker = new google.maps.Marker({
                      position: position,
                      map: map,
                      title: markers[i][0]
                  });

          //        // Allow each marker to have an info window
          //        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          //            return function() {
          //                infoWindow.setContent(infoWindowContent[i][0]);
          //                infoWindow.open(map, marker);
          //            }
          //        })(marker, i));

                  // Automatically center the map fitting all markers on the screen
                  map.fitBounds(bounds);
              }

              // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
              var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
          //        this.setZoom(15);
                  google.maps.event.removeListener(boundsListener);
              });

          }

          </script>


          <!--END MAP-->


          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activities</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <!-- <a href="#addSched" class="btn btn-default" style="margin-bottom:20px">Add Schedule</a> -->

              <button class="btn btn-default" data-toggle="modal" data-target="#Activity" style="margin-bottom:20px">
                Add Activity
              </button>



              

              <?php foreach($activity_post as $post): ?>

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description"><?php echo $post['modified']; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <h3><?php echo ucwords($post['title']); ?></h3>
                    <?php if(!empty($post['address'])): ?>
                    <strong>Location : <?php echo ucwords($post['address']); ?></strong><br />
                  <?php endif; ?>
                    <?php echo ucfirst($post['desc']); ?>
                  </p>
                  <ul class="list-inline">
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->   
              </div>

            <?php endforeach; ?>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                 
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i><h3 class="timeline-header no-border">
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="users/profile" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="first_name" id="inputName" placeholder="First Name" value="<?php echo ucwords($user['first_name']); ?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" id="inputEmail" placeholder="Last Name" value="<?php echo ucwords($user['last_name']); ?>" required="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">About Me</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" name="about_me" placeholder="Tell us about yourself" required=""><?php echo ucfirst($user['about_me']); ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Occupation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="occupation" id="inputSkills" placeholder="Occupation" value="<?php echo ucwords($user['occupation']); ?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->


<?php
$this->load->view('elements/footer');
?>