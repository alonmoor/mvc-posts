<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <br>

    <?php foreach($data['posts'] as $post) : ?>

    <h1><?php echo $post->title; ?></h1>
    <div class="bg-secondary text-white p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo $post->created_at; ?>
    </div>
    <p><?php echo $post->body; ?></p>






    <hr>


    <form class="pull-left" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->postId; ?>" method="post">
        <input type="submit" value="Edit" class="btn btn-primary">
    </form>


    <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->postId; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>




<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>









