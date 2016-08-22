<?php
    $this->load->view('elements/header');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Change Password
        <small>set your new password here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/teacher/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Change Password</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <form role="form" action="password" method="post">
            <div class="box-body">

                <div class="form-group">
                    <label for="old">Old Password</label>
                    <input required type="password" name="old_password" class="form-control" id="old_password" placeholder="Old Password">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input required type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                </div>

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input required type="password" name="conf_password" class="form-control" id="conf_password" placeholder="Confirm Password">
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div><!-- /.box -->
</section><!-- /.content -->

<?php
    $this->load->view('elements/footer');
?>