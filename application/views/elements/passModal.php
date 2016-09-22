<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
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
                    Change Password
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form action="<?php echo base_url(); ?>password" method="post" role="form">
                  
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
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"
                              data-dismiss="modal">
                                  Close
                      </button>
                      <button type="submit" class="btn btn-primary">
                          Save changes
                      </button>
                  </div>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            
        </div>
    </div>
</div>