<?php

use App\App;
use Core\FileDB;

require '../bootloader.php';

App::$db = new FileDB(DB_FILE);

App::$db->createTable('users');
App::$db->insertRow('users', ['email' => 'test@test.lt', 'password' => 'test']);
App::$db->insertRow('users', ['email' => 'santa@santa.lt', 'password' => 'santa']);

App::$db->createTable('wishes');
App::$db->createTable('track_users');

