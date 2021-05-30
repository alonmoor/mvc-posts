<?php

   require APPROOT . '/views/inc/header.php';

?>






<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Input User id and Post id to retrive a json</h2>


        <div class="form-group">
            <h2>All Post:</h2>
            <label for="name"> All Post : <sup>*</sup></label>
           <?PHP
              var_dump($data['posts']);
           ?>
        </div>

        <div class="form-group">
            <h2>Specific Post: </h2>
            <label for="title"> Specific Post: <sup>*</sup></label>
            <?PHP
            var_dump($data['post']);
            ?>
        </div>




      <div class="form-group">
          <h2>All Users:</h2>
          <label for="name">ALL Users: <sup>*</sup></label>
          <?PHP
          var_dump($data['users']);
          ?>
      </div>

      <div class="form-group">
          <h2>Specific User: </h2>
          <label for="title">Posts for User: <sup>*</sup></label>
          <?PHP
          var_dump($data['user']);
          ?>
      </div>






  </div>
<?php

 require APPROOT . '/views/inc/footer.php';


?>
