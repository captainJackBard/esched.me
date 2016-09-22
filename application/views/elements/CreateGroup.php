<!-- Modal -->
<div class="modal fade" id="CreateGroup" tabindex="-1" role="dialog" 
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
                    Create Group
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
               <form action="<?php echo base_url(); ?>users/CreateGroup" method="post">
                    <div class="form-group">
                      <label>With :</label>
                      <select id="group" name="tagged[]" multiple="multiple">
                        <optiongroup label="Group 1" title="Opiton Group 1">
                          <?php foreach($friends as $friend): ?>
                        
                          <option value="<?php echo $friend['id']; ?>">
                          <img src="<?php echo $friend['img_name']; ?>">
                          <?php echo ucwords("  ".$friend['first_name']." ".$friend['last_name']); ?>
                          </option>
                        
                        <?php endforeach ?>
                        </optiongroup>
                      </select>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default"
                              data-dismiss="modal">
                                  Close
                      </button>
                      <button type="submit" class="btn btn-primary">
                          Save Group
                      </button>
                  </div>



                  </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            
        </div>
    </div>
</div>