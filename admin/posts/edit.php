<?php require_once('../../includes/initialise.php'); ?>

<?php $page_title = 'Edit Post'; ?>
<?php require_once(LAYOUT_PATH.'/header.php'); ?>

<?php


if (!isset($_GET['postID']) || !$_GET['postID']) {
  $location = url_for('/admin/posts/posts.php');
  redirect_to($location);
}

$id = $_GET['postID'];  


if (isset($_POST['submit'])) {
  $post = [];
  $post['update_id'] = $id;
  $post['title'] = $_POST['title'] ?? '';
  $post['author']  = $_POST['author'] ?? '';
  $post['body']  = $_POST['body'] ?? '';
	$post['categoryID']  = $_POST['categoryID'] ?? '1';
  
  $post['thumb']  = isset($_POST['thumb']) ? ("" == trim($_POST['thumb']) ? 'desert.jpg' : $_POST['thumb']) : 'desert.jpg';
  
  if ($post['title'] && $post['author'] && $post['body']) {
    $result = update_post($post);
    if ($result === true) {
      $location = url_for('/admin/posts/posts.php');
      redirect_to($location);
    }
  } else {
    echo 'You must fill required fields';
  }
} 


$post = get_post_by_id($id);
$categories_set = get_all_categories();
$categories = mysqli_fetch_all($categories_set, MYSQLI_ASSOC); //if this is not commented out, while loop won't work.

?>

  <div class="container">
    
    <a href="<?php echo url_for('/admin/posts/posts.php'); ?>" class="btn btn-sm btn-outline-primary waves-effect mb-4">Back</a>
    
    <!-- root url vs php self = same -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?postID=<?php echo h(u($id)); ?>">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control mb-2" value="<?php echo h($post['title']); ?>">
      </div> 
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control mb-2" value="<?php echo h($post['author']); ?>">
      </div> 
      <div class="form-group">
        <label for="thumb">Thumb</label>
        <input type="text" name="thumb" id="thumb" class="form-control mb-2" value="<?php echo h($post['thumb']); ?>">
      </div> 
			<div class="form-group">
        <label for="category">Category</label>
        <select name="categoryID" id="categoryID" class="browser-default custom-select">
          <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>" <?php echo ($category['categoryID'] == h($post['categoryID'])) ? 'selected' : ''; ?>><?php echo $category['categoryName']; ?></option>
          <?php endforeach;  ?>
        </select>
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control rounded-0 mb-2" name="body" id="body" rows="50"><?php echo h($post['body']); ?></textarea>
      </div> 
      
      <input type="hidden" id="update_id" name="update_id" value="<?php echo h($post['postID']); ?>">
      
      <button class="btn btn-primary" type="submit" name="submit" value="submit">Edit Post</button>
    
    </form>
   
    
  </div>


<?php require_once(LAYOUT_PATH.'/footer.php'); ?>




	
	




	
	
