<?php

   require APPROOT . '/views/inc/header.php';

?>






<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Input User id and Post id to retrive a json</h2>
    <form action="<?php echo URLROOT; ?>/pages/get_json" method="post">

        <div class="form-group">

            <label for="name">User Id: <sup>*</sup></label>
            <input type="text" name="user_id" class="form-control form-control-lg <?php echo (!empty($data['user_id'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_id']; ?>">

        </div>

        <div class="form-group">
            <label for="title">Post Id: <sup>*</sup></label>
            <input type="text" name="post_id" class="form-control form-control-lg <?php echo (!empty($data['post_id'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post_id']; ?>">

        </div>



        <div class="row">
        <input type="submit" class="btn btn-success" value="Submit">
        </div>




    </form>





  </div>
<?php

 require APPROOT . '/views/inc/footer.php';


?>
