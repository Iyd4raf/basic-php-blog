<?php require_once('../../includes/initialise.php'); ?>

<?php $page_title = 'Admin Posts'; ?>
<?php require_once(LAYOUT_PATH.'/header.php'); ?>

<?php

if (isset($_POST['delete']) || isset($_GET['delete'])) {
  $delete_id = $_POST['delete_id'] ?? $_GET['delete'] ?? '';
  
  delete_post($delete_id);
    
  $location = url_for('/admin/posts/posts.php');
  redirect_to($location);
}


$query = 'SELECT postID, title FROM posts';
$result = mysqli_query($db, $query);
$num_rows = mysqli_num_rows($result);


?>

  <div class="container">
    
    <p><a href="<?php echo url_for('/admin/index.php') ?>">Back</a></p>
    
    <p><a href="<?php echo url_for('/admin/posts/add.php') ?>" class="btn btn-sm btn-outline-default waves-effect mb-4">Add Post</a></p>
    
    <?php 
      for ($i = 1; $i <= $num_rows; $i++) :
      $row = mysqli_fetch_assoc($result);
    ?>
    <div class="row">
      <div class="col-1">
        <p><?= $i; ?></p>
      </div>
      <div class="col">
        <a href="<?php echo url_for('/admin/posts/edit.php?postID=' . h(u($row['postID']))); ?>"><?= h($row['title']); ?></a>
      </div>
      <div class="col">
        <a href="<?php echo url_for('/admin/posts/edit.php?postID=' . h(u($row['postID']))); ?>" class="btn btn-sm btn-outline-primary waves-effect">Edit</a>
      </div>
      <div class="col">
        <a href="<?php echo url_for('/post.php?postID=' . h(u($row['postID']))); ?>" class="btn btn-sm btn-outline-info waves-effect">View</a>
      </div>
      
      <div class="col">
        <!-- $_GET Method -->
          <a href="<?php echo url_for('/admin/posts/posts.php?delete=' . h(u($row['postID']))); ?>" class="btn btn-sm btn-outline-danger waves-effect">Delete $_GET</a>
      </div>
      
      <div class="col">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <!-- $_POST Method -->
          <input type="hidden" value="<?php echo h($row['postID']); ?>" name="delete_id">
          <button type="submit" class="btn btn-sm btn-outline-danger waves-effect" name="delete" value="delete">Delete $_POST</button>
        </form>
      </div>
    </div>
    <?php endfor; ?>
    
  </div>
  
  
  
 

<?php require_once(LAYOUT_PATH.'/footer.php'); ?>







