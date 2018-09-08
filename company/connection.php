<?php
define('hostname', 'localhost');
define('user', 'apkausta_fazal');
define('password', 'fazal@5857');
define('databaseName', 'apkausta_Company');

$connect = mysqli_connect(hostname, user, password, databaseName) or die("Error in Db connection");

?>