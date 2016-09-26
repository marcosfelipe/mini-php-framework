<?php

session_start();

define('DIR_BASE', dirname(__FILE__));

require 'core/file.php';
require find_file('routes');
require 'core/router.php';
require 'core/dispatcher.php';

$router = new Router();

require 'core/helpers/router_helper.php';

routes($router);

require 'core/database/record.php';

// TODO: load model dynamically
require 'models/user.php';
require 'models/contact.php';
require 'models/category.php';
require 'models/content.php';
require 'core/helpers/application_helper.php';

$dispatcher = new Dispatcher($router);
$dispatcher->boot();

require 'pages/layouts/application.html.php';
