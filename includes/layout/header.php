<?php

$page_title = $page_title ?? 'Blank Title';
$sitename = $sitename ?? 'Website Name';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $page_title ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo mdb_url_for('/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo mdb_url_for('/css/mdb.min.css'); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo url_for('/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
  
  
  
<!--Navbar--> 
<nav class="navbar navbar-expand-lg navbar-dark primary-color mb-5">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>"><?= $sitename ?></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($page_title === 'Home' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?= url_for('/index.php'); ?>">Home</a>
      </li>
      <li class="nav-item <?php echo ($page_title === 'About' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?= url_for('/about.php'); ?>">About</a>
      </li>
      <li class="nav-item <?php echo ($page_title === 'Admin' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?= url_for('/admin/index.php'); ?>">Admin</a>
      </li>
      


    </ul>
    <!-- Links -->

    <form class="form-inline" method="get" action="<?php echo url_for('/search.php'); ?>" id="search_form">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" id="search">
        <button class="btn btn-rounded btn-sm btn-warning waves-effect" ><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
  
  
  

 
  
  
  
  
  
  
  
  
  
  