<!-- Modal for add schedule -->
            <div class="modal fade" id="Activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                  </div>
                  <div class="modal-body">
                    
                  <form action="#" method="post">
                    
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                      <label>With :</label>
                      <select id="activity" name="tagged[]" multiple="multiple">
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

                    <div class="form-group">
                      <label>Location</label>
                      <input type="text" name="title" class="form-control" placeholder="Blk, St. Subd. State">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="desc"></textarea>
                    </div>

                  </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Activity</button>
                  </div>
                </div>
              </div>
            </div>

              <!--end MODAL for add schedule-->