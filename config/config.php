<?php

define('BASE_URL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" . "://" . $_SERVER['HTTP_HOST']);
// database credentials
define('DB_HOST', 'db_youdemy');
define('DB_USER', 'root');
define('DB_PASS', 'ahmed');
define('DB_NAME', 'youdemy');