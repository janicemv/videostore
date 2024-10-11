<?php
//Business/SessionService.php

namespace Business;

use Entities\User;

session_start();

class SessionService
{
    // User Object in de session bewaren
    public static function addUser(User $user)
    {
        $_SESSION['user'] = serialize($user);
    }

    //get User object back in overzicht
    public static function getUser(): ?User
    {
        return isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;
    }

    public static function logout(): void
    {
        session_destroy();
    }
}
