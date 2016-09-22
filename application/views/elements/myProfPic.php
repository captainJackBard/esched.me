<!-- Modal -->
<div class="modal fade" id="myProfPic" tabindex="-1" role="dialog" 
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
                <img style="width:50%; margin: 0 auto; display:block;" src="<?php echo $this->img; ?>">
                <div class="clear-fix" ></div>
                <a href="#" data-toggle="modal" data-target="#changeDP">Change Displayed Picture</a>
            </div>
            
            <!-- Modal Footer -->
            
        </div>
    </div>
</div>

<?php $this->load->view('elements/changeDP'); ?>