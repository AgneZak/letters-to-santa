<?php

use App\Controllers\AboutController;

require '../bootloader.php';

$controller = new AboutController();

print $controller->index();
