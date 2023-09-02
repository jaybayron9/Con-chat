<?php

use controler\RoomController;
use Router\Router;

Router::get('/', fn() => view('auth/login'));
Router::get('/register', fn() => view('auth/register'));  
Router::get('/room', [RoomController::class, 'index']);