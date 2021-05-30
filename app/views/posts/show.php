<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<?php $i = 0; ?>
<?php foreach($data['post'] as $post) : ?>

<h1><?php echo $post->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
  Written by <?php echo $post->name; ?> on <?php echo $post->created_at; ?>
</div>
<p><?php echo $post->body; ?></p>




<?php
    if($post->user_id == $_SESSION['user_id']) :
 ?>


  <hr>
  <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->postId; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->postId; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>



<?php endif; ?>
<?php $i++ ?>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
