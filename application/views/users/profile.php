<?php
    $this->load->view('elements/header');
    // debug($user);
?>
<!-- Content Header (Page header) -->
<section class="content-header">

    <h1>
        Profile
        <small>set your profile information here</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-user"></i> Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Account details</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <form role="form" action="profile" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" disabled="" value="<?php echo $this->session->Auth['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo ucwords($user['last_name']); ?>">
                </div>

                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname"  value="<?php echo ucwords($user['first_name']); ?>">
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div><!-- /.box -->
</section><!-- /.content -->


<?php
    $this->load->view('elements/footer');
?>