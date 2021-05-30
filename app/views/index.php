<?php require VIEW_WWW_DIR . '/inc/header.php';

//
// //This is how you echo out database information on the screen
//foreach ($data['users'] as $user) {
//    echo "Information: " . $user->name . $user->email;
//    echo "<br>";
//}









   flash('post_message');
   ?>
<div class="row mb-3">
  <div class="row mb-3">
 

    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add User
      </a>
    </div>



    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-center">
        <i class="fa fa-pencil"></i> Add Posts
      </a>
    </div>




      <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/pages/get_average" class="btn btn-primary pull-left">
              <i class="fa fa-pencil"></i> Get Average
          </a>
      </div>



      <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/pages/get_json" class="btn btn-primary pull-right">
              <i class="fa fa-pencil"></i> Get Jason
          </a>
      </div>





      <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/pages/get_curl" class="btn btn-primary pull-right">
              <i class="fa fa-pencil"></i> Fetch CURL
          </a>
      </div>



      <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/users_posts/create" class="btn btn-primary pull-left">
              <i class="fa fa-pencil"></i> Create Post-User
          </a>
      </div>



      <div class="col-md-6">
          <a href="<?php echo URLROOT; ?>/users/add" class="btn btn-primary pull-left">
              <i class="fa fa-pencil"></i> Create User
          </a>
      </div>

  </div>

<div class="col-md-6">
    <h1>Users</h1>
</div>


  </div>
  <?php foreach($data['users'] as $user) : ?>
    <div class="card card-body mb-3">

      <h4 class="card-title"><?php echo $user->name; ?></h4>

      <div class="bg-light p-2 mb-3">
         <?php echo $user->email; ?>
      </div>

      <p class="card-text"><?php echo $post->body; ?></p>
      <a href="<?php echo URLROOT; ?>/users/show/<?php echo $user->id; ?>" class="btn btn-dark">More</a>
    </div>
  <?php endforeach; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>
