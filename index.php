<?php
session_start();

// Autoload core classes
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';

// Initialize app
$app = new App();
