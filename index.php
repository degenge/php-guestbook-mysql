<?php

declare(strict_types=1);

//namespace Php_guestbook_mysql;

spl_autoload_register(static function ($class_name) {
    include 'Models/' . $class_name . '.php';
});

require 'Controllers/guestbookController.php';

require 'Views/page.php';
