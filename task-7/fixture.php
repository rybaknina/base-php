<?php
include "model/User.php";
include "model/UserProvider.php";

$pdo = require 'db.php';

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  description VARCHAR NOT NULL,
  isDone INTEGER NOT NULL DEFAULT 0
)');

$user = new User(null, 'admin');
$user->setName('Admin');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, 'qwerty321');