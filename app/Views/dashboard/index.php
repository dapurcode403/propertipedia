ini adalah isi

<?php
$path = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$segment = $path[1];
echo 'testing dashboard' . $segment
?>