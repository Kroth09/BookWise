<?php
require 'models/Usuario.php';
require 'models/Livro.php';

session_start();

require 'Flash.php';
require 'functions.php';
$config = require 'config.php';
require 'Database.php';
require 'routes.php';