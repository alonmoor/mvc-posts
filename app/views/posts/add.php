<?php
   require APPROOT . '/views/inc/header.php';

        global $db;
        $selected = array_item($ata, "id");
        $users = "SELECT name,id FROM users ORDER BY name ASC";

        $rows = $db->queryArray($users);

        $today = date("m/d/Y");
        $date_value = $date_value ? $date_value : $today;

 ?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="post">


        <div class="form-group">
            <label for="brand_pdf">בחר יוזר:</label>
            <select class="form-control" id="user_post" name="form[user_post]" style="width: 160px;"
            <option value="none">(choose)</option>
            <?PHP
            foreach($rows as $row) {
                echo '<option ', html_attribute("value", $row[1]);
                if($selected==$row[1]){
                    echo 'selected="selected" ';
                }
                $listentry = str_replace(" ", "&nbsp;", htmlspecial_utf8($row[0]));
                echo ">$listentry</option>\n";
            }
            echo '</select>', "\n";
            ?>
        </div>



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





<?php
require APPROOT . '/views/inc/footer.php';


?>

