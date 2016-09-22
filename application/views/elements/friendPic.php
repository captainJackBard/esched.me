<!-- Modal -->
<?php
    if(empty($user['img_name'])){
      $img = 'default.png';
    } else{
      $img = $user['img_name'];
    }
?>
<div class="modal fade" id="friendPic" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Displayed Picture
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body" style="text-align:center;">
                <img style="width:50%; margin: 0 auto; display:block;" src="<?php echo './../prof_imgs/'.$img; ?>"">
                <div class="clear-fix" ></div>
            </div>
            
            <!-- Modal Footer -->
            
        </div>
    </div>
</div>
