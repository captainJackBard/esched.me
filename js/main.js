
$(function(){
  //window ready or constructor
$('#modal-form-close').on('submit', function(e){
  e.preventDefault();
  $.ajax({
          url: '/events/edit/{{event.event_id}}/script',
          data: $('#modal-form-close').serialize(),
          // data is parameter ->> array if many
          type: 'POST',
          success: function(data){
              console.log(data.length);
              // $(data).each(function()){
              //   $("#friendRequestList").html("");
              // };
              alert('successfully submitted')},
          error: function(data){
              alert('something went wrong')
          }


     });
});

    // $.ajax({
    //   url: '',
    // });
ajaxFriendRequest();
});


$('#group').searchableOptionList();
$('#activity').searchableOptionList();
$('#crmsg').searchableOptionList();

function ajaxFriendRequest(){
  window.setInterval(function(){
    var elem = "";
    
   /// call your function here
   $.ajax({
      // pag call sa PHP na method
      url: $base_url+'users/ajaxFriendRequest',
      data: '',
      type: 'GET',
      dataType: 'json',
      // yung data yung return
      success: function(data){
        // if(data.length > 0){
        //   $('.fb-count').text(data.length);  
        // }
        // console.log(data);
        var ctr = 0;
        $(data).each(function(){

          elem += "<li>";
          elem += "<a>";
          elem += "<div class='pull-left'>";
          elem +=  "test";
          elem += "</div>"
          elem += "<h4>"+this.first_name+" "+this.last_name+"</h4>";
          elem += "<form action='#' method='post'>";
          elem += "<button name='type' value='accept' class='btn btn-primary'>Accept</button>";
          elem += "<button class='btn btn-danger' name='type' value='delete'>Delete</button>";
          elem += "</form>";
          elem += "</a>";
          elem += "</li>";

          if(this.r_status == 'pending'){
            ctr++;
          }
          
        });

        if(ctr > 0){
          $('.fb-count').text(ctr);  
        } else{
          $('.fb-count').text('');
        }

        $(".fb-friend-request").children("li").remove();
        $(".fb-friend-request").append(elem);

      }
   });
   
  }, 3000);
}

function ajaxFriendRequestSeenUpdate(){
  $.ajax({
    url: $base_url+'users/ajaxFriendRequestSeenUpdate',
    data: '',
    type: 'POST',

    success: function(data){
      // di ko alam
    }
  });
}
/*
<?php foreach($this->friends as $req): ?>
                  <li><!-- start message -->
                    <a href="<?php echo base_url(); ?>view/<?php echo $req['id']; ?>">
                      <div class="pull-left">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo ucwords($req['first_name']." ".$req['last_name']); ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $req['r_mod']; ?></small>
                      </h4>
                      <form action="<?php echo base_url(); ?>users/friendRQ/<?php echo $req['id']; ?>" method="post">
                        <button name="type" value="accept" class="btn btn-primary">Accept</button>
                        <button class="btn btn-danger" name="type" value="delete">Delete</button>
                      </form>
                    </a>
                  </li>
                  <!-- end req -->
                <?php endforeach; ?>
*/