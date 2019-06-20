# basic-php-blog


<h3>Description</h3>

A simple blog site with basic CRUD and search feature.

<ul>
  <li>Add, update and delete posts</li>
  <li>View posts</li>
  <li>Search posts</li>
</ul>


<h3>Technologies</h3>

<ul>
<li>HTML</li>
<li>Material Design Bootstrap 4</li> 
<li>PHP7</li>
<li>MySQL</li>
</ul>


<h3>Setup</h3>

<p>Run sql to create the database</p>
<p>Alter database connection information if needed in config file</p>
<p>The root folder name must match project_name in config file</p>


<h3>Programming Features</h3>

<ul>
  <li>Escaping dynamic data coming from database with htmlspecialchars and URLs with url_encode</li>
  <li>Using MySQLi to interact with database</li>
  <li>Prevent SQL injection by putting single quotes around values and escaping with mysqli_real_escape_string</li>
</ul>

<h3>To Do</h3>

As posts are formatted with HTML, they are subject to XSS attacks. I must find a solution for this.
