<?php require_once('../../includes/initialise.php'); ?>

<?php $page_title = 'Add Post'; ?>
<?php require_once(LAYOUT_PATH.'/header.php'); ?>

<?php

if (isset($_POST['submit'])) {
  $post = [];
  $post['title'] = $_POST['title'] ?? '';
  $post['author']  = $_POST['author'] ?? '';
  $post['body']  = $_POST['body'] ?? '';
	$post['categoryID']  = $_POST['categoryID'] ?? '1';
  
  //if $_POST['thumb'] not set or empty then set default to desert.jpg. 
  $post['thumb']  = isset($_POST['thumb']) ? ("" == trim($_POST['thumb']) ? 'desert.jpg' : $_POST['thumb']) : 'desert.jpg';
  
  
  if ($post['title'] && $post['author'] && $post['body']) {
    $result = insert_post($post);
    if ($result === true) {
      $location = url_for('/admin/posts/posts.php');
      redirect_to($location);
    }
  } else {
    echo '<h4 class="red-text text-center">You must fill required fields</h4>';
  }
}


$categories_set = get_all_categories();
$categories = mysqli_fetch_all($categories_set, MYSQLI_ASSOC); 


?>

  <div class="container">
    
    <a href="<?php echo url_for('/admin/posts/posts.php'); ?>" class="btn btn-sm btn-outline-primary waves-effect mb-4">Back</a>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control mb-2">
      </div> 
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control mb-2">
      </div> 
      <div class="form-group">
        <label for="thumb">Thumb</label>
        <input type="text" name="thumb" id="thumb" class="form-control mb-2">
      </div> 
      <div class="form-group">
        <label for="category">Category</label>
        <select name="categoryID" id="categoryID" class="browser-default custom-select">
          <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
          <?php endforeach;  ?>
        </select>
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control rounded-0 mb-2" name="body" id="body" rows="50"></textarea>
      </div> 
      
      <button class="btn btn-primary" type="submit" name="submit" value="submit">Add Post</button>
    
    </form>
   
  <?php mysqli_free_result($categories_set); ?>
    
    
  </div>


<?php require_once(LAYOUT_PATH.'/footer.php'); ?>




	
	
