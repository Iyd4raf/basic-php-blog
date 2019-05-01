<?php


function url_for($script_page) {
  //add the leading / if not present
  if ($script_page[0] != '/') {
    $script_page = "/" . $script_page;
  }
  return ROOT_URL . $script_page;
}

function mdb_url_for($script_page) {
  //add the leading / if not present
  if ($script_page[0] != '/') {
    $script_page = "/" . $script_page;
  }
  return MDB_URL . $script_page;
}

function thumbs_url_for($script_page) {
  //add the leading / if not present
  if ($script_page[0] != '/') {
    $script_page = "/" . $script_page;
  }
  return THUMBS_URL . $script_page;
}

function redirect_to($location) {
  header("location: " . $location);
  exit;
}

function h($string="") {
  return htmlspecialchars($string);
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}


function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}





?>