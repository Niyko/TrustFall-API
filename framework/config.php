<?php
//Load all essential framework compoents
require_once("../env.php");
require_once("db.php");
require_once("json.php");

//Connect to database
$db = new MysqliDb ($db_host, $db_username, $db_password, $db_database);