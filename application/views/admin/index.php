<?php

$this->load->view('elements/header');

?>



<section class="content-header">
      <h1>
        User Profile
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a href="#profpic"><img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"></a>

              <h3 class="profile-username text-center"><?php echo ucwords($user['first_name']." ".$user['last_name']); ?></h3>

              <p class="text-muted text-center"><?php echo ucwords($user['occupation']); ?></p>

              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
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

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Occupation</strong>

              <p class="text-muted"><?php echo ucfirst($user['occupation']); ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- ABOUT ME /.box -->

          <?php if(!empty($this->friends)):?>
          <button type="button" class="btn btn-primary col-md-12" data-toggle="modal" data-target="#myModal">
                Friend Requests
          </button> 
        <?php endif; ?>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <!-- <a href="#addSched" class="btn btn-default" style="margin-bottom:20px">Add Schedule</a> -->

              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="margin-bottom:20px">
                Add Schedule
              </button>

              <!-- Modal for add schedule -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Schedule</h4>
                  </div>
                  <div class="modal-body">
                    

                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Title">
                    </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

              <!--end MODAL for add schedule-->


                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <!-- <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li> -->
                  </ul>

                  <!-- <input class="form-control input-sm" type="text" placeholder="Type a comment"> -->
                </div>
                <!-- /.post -->   
              </div>
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