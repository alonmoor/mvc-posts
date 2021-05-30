<?php
require APPROOT . '/views/inc/header.php';
    $today = date("m/d/Y");
    $date_value = $date_value ? $date_value : $today;
?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Post</h2>

    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>


      <div class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
      </div>

        <div class="form-group">
            <label for="body">Date: <sup>*</sup></label>
            <input id="datepicker" width="276" height="40" style="height: 2em; border:1px solid gray;  width: 90%;"  type='text' class="form-control placementT"  name="form[created_at]"  value="<?php echo $date_value; ?>"    />
        </div>


        <script>
            $('#datepicker').datepicker();
        </script>

        <br><br>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
