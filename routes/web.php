<?php

require_once __DIR__ . '/../config/database.php';

require_once __DIR__ . '/../app/Models/Mahasiswa.php';
require_once __DIR__ . '/../app/Repositories/MahasiswaRepository.php';

require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';
require_once __DIR__ . '/../app/Controllers/DosenController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';


// =========================
// OBJECT COMPOSITION
// =========================

$database = new Database();

$mahasiswaRepository = new MahasiswaRepository($database);

$mahasiswaController = new MahasiswaController($mahasiswaRepository);


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/si-akademik/public';

$uri = str_replace($basePath, '', $uri);

if ($uri === '') {
    $uri = '/';
}

$method = $_SERVER['REQUEST_METHOD'];


// =========================
// LOGIN
// =========================

if ($uri === '/login' && $method === 'GET') {

    $controller = new AuthController();
    $controller->loginForm();

}


// =========================
// PROSES LOGIN
// =========================

else if ($uri === '/login/process' && $method === 'POST') {

    $controller = new AuthController();
    $controller->login();

}


// =========================
// LOGOUT
// =========================

else if ($uri === '/logout') {

    $controller = new AuthController();
    $controller->logout();

}


// =========================
// DASHBOARD
// =========================

else if ($uri === '/dashboard') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new AuthController();
    $controller->dashboard();

}


// =========================
// MAHASISWA
// =========================

else if ($uri === '/mahasiswa') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $mahasiswaController->index();

}


// =========================
// DETAIL MAHASISWA
// =========================

else if ($uri === '/mahasiswa/detail') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $mahasiswaController->detail();

}


// =========================
// DOSEN
// =========================

else if ($uri === '/dosen') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->index();

}

else if ($uri === '/dosen/create') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->create();

}

else if ($uri === '/dosen/store' && $method === 'POST') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->store();

}

else if ($uri === '/dosen/edit' && isset($_GET['id'])) {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->edit($_GET['id']);

}

else if ($uri === '/dosen/update' && $method === 'POST' && isset($_GET['id'])) {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->update($_GET['id']);

}

else if ($uri === '/dosen/delete' && isset($_GET['id'])) {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new DosenController();
    $controller->delete($_GET['id']);

}


// =========================
// 404
// =========================

else {

    echo "404 - Halaman tidak ditemukan";

}