<?php 

require_once __DIR__ . '/vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once 'database/DBConnect.php';
require_once 'database/builder/SchemaBuilder.php';  
foreach(glob('./database/tables/*.php') as $table) { require_once $table; } 

$users = new CreateUsersTable();
$users->down(); 
$message = new CreateMessageTable();
$message->down();