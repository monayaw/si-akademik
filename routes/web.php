<?php

require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';
require_once __DIR__ . '/../app/Controllers/DosenController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';


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

    $controller = new MahasiswaController();
    $controller->index();

}


// =========================
// DETAIL MAHASISWA
// =========================

else if ($uri === '/mahasiswa/detail') {

    $middleware = new AuthMiddleware();
    $middleware->handle();

    $controller = new MahasiswaController();
    $controller->detail();

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


// =========================
// 404
// =========================

else {

    echo "404 - Halaman tidak ditemukan";

}
