<?php

use Router\Router;
use controler\RoomController;
use AuthController\AuthController;

Router::get('/', [AuthController::class, 'index']);
Router::get('/register', [AuthController::class, 'registerPage']);  
Router::get('/room', [RoomController::class, 'index']); 
Router::post('/register', [AuthController::class, 'register']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/logout', [AuthController::class, 'logout']); 