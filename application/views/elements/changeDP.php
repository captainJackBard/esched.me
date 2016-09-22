<!-- Modal -->
<div class="modal fade" id="changeDP" tabindex="-1" role="dialog" 
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
                    Upload New Picture
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo base_url();?>users/changeDp" method="post" enctype="multipart/form-data">
                    <input type="file" name="img" /><br />
                    <button class="btn btn-success">Upload</button>
                </form>
            </div>
            
            <!-- Modal Footer -->
            
        </div>
    </div>
</div>