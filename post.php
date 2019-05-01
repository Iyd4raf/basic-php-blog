
<?php require_once('includes/initialise.php'); ?>

<?php


if (!isset($_GET['postID']) || !$_GET['postID']) {
  $location = url_for('/index.php');
  redirect_to($location);
}

$id = (int) $_GET['postID'];   

$post = get_post_by_id($id);

?>


<?php $page_title = 'Post'; ?>
<?php require_once(LAYOUT_PATH.'/header.php'); ?>



  <div class="container">
    <div class="row">
			<div class="col-2"></div>
      <div class="col-8">
          <div class="row">
            <div class="col">
              <hr>
              <h3><strong><?= h($post['title']); ?></strong></h3>
              <span>Posted by <?= h($post['author']); ?> on <?= h($post['createdAt']); ?></span><br>
              <hr>
              <?php if ($post['thumb']) : ?>
                <img src="<?php echo thumbs_url_for(h($post['thumb'])); ?>" class="thumb img-thumbnail">
              <?php endif; ?>
              <p class="mt-3"><?= $post['body']; ?></p>
            </div>
          </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>


<?php require_once(LAYOUT_PATH.'/footer.php'); ?>




	
	
