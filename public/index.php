<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

use app\controllers\ContactController;
use app\controllers\PageController;
use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\controllers\PostController;
use app\controllers\ProfileController;
use samojanezic\phpmvc\Application;

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
  'userClass' => \app\models\User::class,
  'db' => [
    'dsn' => $_ENV['DB_DSN'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
  ]
];



$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [PageController::class, 'home']);
$app->router->get('/contact', [ContactController::class, 'contact']);
$app->router->post('/contact', [ContactController::class, 'contact']);
$app->router->get('/postPage', [PageController::class, 'postPage']);


$app->router->get('/login', [LoginController::class, 'login']);
$app->router->post('/login', [LoginController::class, 'login']);
$app->router->get('/register', [RegisterController::class, 'register']);
$app->router->post('/register', [RegisterController::class, 'register']);
$app->router->get('/logout', [LoginController::class, 'logout']);
$app->router->get('/profile', [ProfileController::class, 'profile']);
$app->router->get('/create', [PostController::class, 'create']);
$app->router->post('/create', [PostController::class, 'create']);
$app->router->post('/delete', [PostController::class, 'delete']);
$app->router->get('/own-posts', [PostController::class, 'ownPosts']);
$app->router->get('/edit-post', [PostController::class, 'editPost']);
$app->router->post('/edit-post', [PostController::class, 'editPost']);



$app->run();