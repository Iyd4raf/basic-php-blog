<?php

$sitename = 'Blog';

//project_name must match name of the root folder of this project on your machine
$project_name = 'basic-php-blog';
$project_name_length = strlen($project_name);

$site_root_end = strpos($_SERVER['SCRIPT_NAME'], $project_name) + $project_name_length;
$site_root = substr($_SERVER['SCRIPT_NAME'], 0, $site_root_end);

$project_path_end = strpos($_SERVER['SCRIPT_FILENAME'], $project_name) + $project_name_length;
$project_path = substr($_SERVER['SCRIPT_FILENAME'], 0, $project_path_end);


define("PROJECT_PATH", $project_path);
define("INCLUDES_PATH", $project_path.'/includes');
define("LAYOUT_PATH", $project_path.'/includes/layout');

define("ROOT_URL", $site_root);
define("MDB_URL", $site_root.'/includes/mdb');
define("THUMBS_URL", $site_root.'/images/thumbs');


require_once('database.php');
require_once('functions.php');
require_once('query-functions.php');

$db = db_connect();


?>
