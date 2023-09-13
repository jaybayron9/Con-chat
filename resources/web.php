<?php

use utils\Router;
use controler\RoomController;
use AuthController\AuthController; 

Router::get('/', [AuthController::class, 'index']);
Router::get('/register', [AuthController::class, 'registerPage']);   
Router::get('/chat', [RoomController::class, 'index']);
Router::get('/logout', [AuthController::class, 'logout']);   
Router::post('/register', [AuthController::class, 'register']);
Router::post('/login', [AuthController::class, 'login']);
Router::post('/send', [RoomController::class, 'sendMessage']); 
Router::post('/checkFrom', [RoomController::class, 'checkFrom']);  
Router::post('/profile/head', [RoomController::class, 'profileHead']);
Router::post('/lastMessage', [RoomController::class, 'lastMessage']);
Router::get('/config', fn() => phpinfo() );