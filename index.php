<?php
session_start();

define('BASE_PATH', realpath(dirname(__FILE__)) . "/");

require_once (BASE_PATH."vendor/autoload.php"); 
require_once('app/routes/web.php');