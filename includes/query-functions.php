<?php

/**********************************
POSTS
**********************************/

function get_all_posts() {
  global $db;
  
  $sql = 'SELECT * FROM posts';
  $result = mysqli_query($db, $sql);
  
  confirm_result_set($result);
  
  return $result;
}


function get_post_by_id($id) {
  global $db;
  
  $sql = "SELECT * FROM posts ";
  $sql .= "WHERE postID = '" . db_escape($db, $id) . "'";
  $result = mysqli_query($db, $sql);

  confirm_result_set($result);
  
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $post;
}


function delete_post($id) {
  global $db;
  
  $sql = "DELETE FROM posts ";
  $sql .= "WHERE postID = '" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  
  if (!$result) {
    //DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


function update_post($post) {
  global $db;
  
  $sql = "UPDATE posts SET ";     
  $sql .= "title = '" . db_escape($db, $post['title']) . "', ";
  $sql .= "author = '" . db_escape($db, $post['author']) . "', ";
  $sql .= "body = '" . db_escape($db, $post['body']) . "', ";
	$sql .= "categoryID = '" . db_escape($db, $post['categoryID']) . "', ";
  $sql .= "thumb = '" . db_escape($db, $post['thumb']) . "' ";
  $sql .= "WHERE postID = '" . db_escape($db, $post['update_id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo 'database update error: ' . mysqli_error($db);
    db_disconnect($db);
    exit;
  } else {
    return true;
  }
}


function insert_post($post) {
  global $db;
  
  $sql = "INSERT INTO posts ";
  $sql .= "(title, author, body, categoryID, thumb) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $post['title']) . "', ";
  $sql .= "'" . db_escape($db, $post['author']) . "', ";
  $sql .= "'" . db_escape($db, $post['body']) . "', ";
	$sql .= "'" . db_escape($db, $post['categoryID']) . "', ";
  $sql .= "'" . db_escape($db, $post['thumb']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  
  if (!$result) {
    echo 'database insert error: ' . mysqli_error($db);
    db_disconnect($db);
    exit;
  } else {
    return true;
  }
}


/**********************************
SEARCH POSTS
**********************************/



function get_search_results_posts($search_query) {
  global $db;
  
  $sql = "SELECT * FROM posts WHERE ";
  $sql .= "title LIKE '%" . db_escape($db, $search_query) . "%' OR ";
  $sql .= "author LIKE '%" . db_escape($db, $search_query) . "%' OR ";
  $sql .= "body LIKE '%" . db_escape($db, $search_query) . "%'";
  $result = mysqli_query($db, $sql);
  
  confirm_result_set($result);
  
  $search_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  
  return $search_results;
}






/**********************************
CATEGORIES
**********************************/


function get_all_categories() {
  global $db;
  
  $sql = 'SELECT * FROM categories';
  $result = mysqli_query($db, $sql);
  
  confirm_result_set($result);
  
  return $result;
}


function get_category_by_id($id) {
  global $db;
  
  $sql = "SELECT * FROM categories ";
  $sql .= "WHERE categoryID = '" . db_escape($db, $id) . "'";
  $result = mysqli_query($db, $sql);

  confirm_result_set($result);
  
  $category = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $category;
}


function delete_category($id) {
  global $db;
  
  $sql = "DELETE FROM categories ";
  $sql .= "WHERE categoryID = '" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  
  if (!$result) {
    //DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}


function update_category($category) {
  global $db;
  
  $sql = "UPDATE categories SET ";     
  $sql .= "categoryName = '" . db_escape($db, $category['categoryName']) . "', ";
  $sql .= "WHERE categoryID = '" . db_escape($db, $post['update_id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo 'database update error: ' . mysqli_error($db);
    db_disconnect($db);
    exit;
  } else {
    return true;
  }
}


function insert_category($category) {
  global $db;
  
  $sql = "INSERT INTO categories ";
  $sql .= "(categoryName) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $category['categoryName']) . "', ";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  
  if (!$result) {
    echo 'database insert error: ' . mysqli_error($db);
    db_disconnect($db);
    exit;
  } else {
    return true;
  }
}


?>















