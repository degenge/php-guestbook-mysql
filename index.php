<?php

declare(strict_types=1);

spl_autoload_register(static function ($class_name) {
    include 'Models/' . $class_name . '.php';
});

require 'Controllers/guestbookController.php';

require 'Views/page.php';
