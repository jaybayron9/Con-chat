<?php

use Router\Router;
use controler\RoomController;
use AuthController\AuthController;

Router::get('/', fn() => view('auth/login'));
Router::get('/register', fn() => view('auth/register'));  
Router::get('/room', [RoomController::class, 'index']);

Router::post('/register', [AuthController::class, 'register']);