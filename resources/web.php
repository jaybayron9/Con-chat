<?php

use Router\Router;
use controler\RoomController;
use AuthController\AuthController;

Router::get('/', [AuthController::class, 'index']);
Router::get('/register', [AuthController::class, 'registerPage']);  
Router::get('/room', [RoomController::class, 'index']); 
Router::get('/logout', [AuthController::class, 'logout']); 


Router::post('/register', [AuthController::class, 'register']);
Router::post('/login', [AuthController::class, 'login']);
Router::post('/send', [RoomController::class, 'sendMessage']);