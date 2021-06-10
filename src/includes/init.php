
<?php

//in this file we define the paths
//in this file we require once the classes and methods and

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'Cake');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'src' . DS .  'includes');

defined('PIC_PATH') ? null : define('PIC_PATH', "http://localhost/Cake/");

//require_once ensures a file is included once
require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("gallery.php");
require_once("db.php");
require_once("user.php");
// require_once("comment.php");
// require_once("photo.php");
require_once("session.php");
// require_once("paginate.php");

// require_once(INCLUDES_PATH . DS . "functions.php");
// require_once(INCLUDES_PATH . DS . "new_config.php");
// require_once(INCLUDES_PATH . DS . "database.php");
// require_once(INCLUDES_PATH . DS . "db_object.php");
// require_once(INCLUDES_PATH . DS . "user.php");
// require_once(INCLUDES_PATH . DS . "comment.php");
// require_once(INCLUDES_PATH . DS . "photo.php");
// require_once(INCLUDES_PATH . DS . "session.php");
// require_once(INCLUDES_PATH . DS . "paginate.php");
