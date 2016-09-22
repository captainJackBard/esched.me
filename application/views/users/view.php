<?php

$this->load->view('elements/header');

$class = "col-md-12";
if($status['status'] == 'friend'){
	$class = "col-md-3";
}
debug($user);

?>



    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-user"></i>  <a href="#"><?php echo ucwords($user['first_name'] .' '. $user['last_name']); ?>'s' Profile</a>
            </li>
        </ol>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="<?php echo $class; ?>">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php
                if(empty($user['img_name'])){
                  $img = 'default.png';
                } else{
                  $img = $user['img_name'];
                }
            ?>
              <a href="#" data-toggle="modal" data-target="#friendPic"><img class="profile-user-img img-responsive img-circle" src="<?php echo './../prof_imgs/'.$img; ?>" alt="User profile picture"></a>

              <?php $this->load->view('elements/friendPic'); ?>

              <h3 class="profile-username text-center"><?php echo ucwords($user['first_name']." ".$user['last_name']); ?></h3>

              <p class="text-muted text-center"><?php echo ucwords($user['occupation']); ?></p>

              <?php if($this->session->Auth['id'] != $user['id']):?>
              	<form action="#" method="post">
              		

                  <?php if($status['status'] == 'pending' && $status['friend_id'] == $this->session->Auth['id']): ?>
                    <button name="type" value="accept" class="btn btn-primary btn-block"><b>Accept Friend Request</b></button>
                    <button name="type" value="cancel" class="btn btn-danger btn-block"><b>Ignore Request</b></button>


                  <?php elseif($status['status'] == 'pending'): ?>
              			<button name="type" value="cancel" class="btn btn-danger btn-block"><b>Cancel Request</b></button>
              		
                  <?php elseif($status['status'] == 'friend'): ?>
              			
                    <button name="type" value="message" class="btn btn-primary btn-block"><b>Send a Message</b></button>
                    <button name="type" value="cancel" class="btn btn-default btn-block"><b>Unfriend</b></button>

              		<?php else: ?>
                	<button name="type" value="add" class="btn btn-primary btn-block"><b>Add as Friend</b></button>
                <?php endif; ?>
                </form>
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
                <?php if(empty($user['about_me'])): ?>
              	<p class="text-muted">n/a</p>
              <?php endif; ?>
                <?php echo ucfirst($user['about_me']); ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Occupation</strong>
              <?php if(empty($user['occupation'])): ?>
              	<p class="text-muted">n/a</p>
              <?php endif; ?>
              <p class="text-muted"><?php echo ucfirst($user['occupation']); ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- ABOUT ME /.box -->

        </div>
        <!-- /.col -->
        <?php if($status['status'] == "friend"): ?>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->

	                <div class="post">
	                  <div class="user-block">
	                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
	                        <span class="username">
	                          <a href="#">Jonathan Burke Jr.</a>
	                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	                        </span>
	                    <span class="description">Shared publicly - 7:30 PM today</span>

	                  <p>
	                    Lorem ipsum represents a long-held tradition for designers,
	                    typographers and the like. Some people hate it and argue for
	                    its demise, but others ignore the hate as they create awesome
	                    tools to help create filler text for everyone from bacon lovers
	                    to Charlie Sheen fans.
	                  </p>
	                  

	                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
	                </div>
	              </div>
              
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            <!-- </div> -->
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      <?php endif; ?>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->


<?php
$this->load->view('elements/footer');
?>