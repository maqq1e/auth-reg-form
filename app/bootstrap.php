<?php
// Start session
session_start();

require_once 'core/config.php';

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/database.php';

Route::start();