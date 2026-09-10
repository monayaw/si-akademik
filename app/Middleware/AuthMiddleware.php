<?php

class AuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            header('Location: /si-akademik/public/login');
            exit;
        }
    }
}