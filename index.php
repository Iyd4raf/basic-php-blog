<?php require_once('includes/initialise.php'); ?>

<?php $page_title = 'Home'; ?>
<?php require_once(LAYOUT_PATH.'/header.php'); ?>

<?php

$posts_set = get_all_posts();
$posts = mysqli_fetch_all($posts_set, MYSQLI_ASSOC); 


?>

<div class="container">
  <div class="row">
    <div class="col-12">



        <?php 
          $array_chunks = array_chunk($posts, 3);
          foreach ($array_chunks as $posts) : 
        ?>
          
          <div class="row">
            
            <?php foreach($posts as $post): ?>

              <div class="col col-md-4">
                <!-- Card -->
                <div class="card mb-4">

                    <!--Card image-->
                    <div class="view overlay">
                      <?php if ($post['thumb']) : ?>
                        <img src="<?php echo thumbs_url_for(h($post['thumb'])); ?>" class="card-img-top" alt="Card image cap">
                      <?php endif; ?>
                      <a href="<?php echo url_for('/post.php?postID=' . h(u($post['postID']))); ?>">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">


                      <h4 class="card-title"><?= h($post['title']); ?></h4>
                      <span>Posted by <?= h($post['author']); ?> on <?= h($post['createdAt']); ?></span><br>

                      <p class="card-text mb-2"><?= substr(h($post['body']), 0, 100); ?></p>
                      <a class="btn btn-primary" href="<?php echo url_for('/post.php?postID=' . h(u($post['postID']))); ?>">Read More</a>

                    </div>

                </div>
                <!-- Card -->
              </div>
            
            <?php 
              endforeach; 
            ?>
      
          </div>
      
          
        <?php 
        //endwhile;
        endforeach; 
        ?>
      
        <?php mysqli_free_result($posts_set); ?>
      
    </div>
  


    


  </div>
</div>


<?php require_once(LAYOUT_PATH.'/footer.php'); ?>




	
	
