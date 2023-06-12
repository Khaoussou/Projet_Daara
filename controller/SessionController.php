<?php

namespace Controller;

class SessionController
{
    public static function startSession()
    {
        if (session_status() === PHP_SESSION_DISABLED) {
            session_start();
        }
    }
    public static function sessionUserExist()
    {
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            return true;
        }
        return false;
    }
    public static function destroySession()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}
