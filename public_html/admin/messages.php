<?php

use App\Controllers\Admin\MessagesController;

require '../../bootloader.php';

$controller = new MessagesController();

print $controller->messages();

