<div class="clearfix" style="padding-top: 20px;"></div>
<?php if($this->session->flashdata()): $msg = $this->session->flashdata('data'); ?>
<div class="alert alert-<?php echo $msg['type']; ?> alert-dismissible" role="alert" style="margin-left:auto; margin-right:auto; width:90%">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $msg['notif']; ?>!</strong>  <?php echo $msg['msg']; ?>
</div>
<?php endif; ?>