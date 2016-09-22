<?php

$this->load->view('elements/header');
debug($results);
?>



<!-- =============================================== -->


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Searches
        <small>find people</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-search"></i> Search</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="panel panel-default">
        <!-- Default panel contents -->

        
        
        <div class="panel-heading">Results</div>


        <?php if($this->input->post()): ?>

        <!-- Table -->
        <table class="table">
          <thead style="font-weight:bold">
            <tr>
              <td>Image</td>
              <td>Name</td>
              <td>Action</td>
            </tr>
          </thead>

          <tfoot style="font-weight:bold">
            <tr>
              <td>Image</td>
              <td>Name</td>
              <td>Action</td>
            </tr>
          </tfoot>

          <tbody>
            <?php if(!empty($results)): ?>
            <?php foreach($results as $result): ?>
            <?php if($this->session->Auth['id'] != $result['id']): ?>          
            <tr>
              <?php
                if(empty($result['img_name'])){
                  $img = 'default.png';
                } else{
                  $img = $result['img_name'];
                }
              ?>
              <td style="width:20%"><img style="max-width:100px;" src="<?php echo './prof_imgs/'.$img; ?>"></td>
              
              <td><a href="<?php echo base_url(); ?>view/<?php echo $result['id']; ?>"><?php echo ucwords($result['first_name'] ." ". $result['last_name']); ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="view/<?php echo $result['id']; ?>">View Profile</a></li>
                    <li><a href="#">Add as Friend</a></li>
                  </ul>
                </div>
              

              </td>
            </tr>
           <?php endif; ?>   
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td>No results.</td>
          </tr>
        <?php endif; ?>
          </tbody>

        </table>
      <?php endif; ?>
      </div>

    </section>
    <!-- /.content -->

    <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
 



<?php
$this->load->view('elements/footer');
?>