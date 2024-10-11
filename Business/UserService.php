<?php

//Business/UserService.php

declare(strict_types=1);

namespace Business;

use Data\UserDAO;
use Entities\User;


class UserService
{
    public function checkLogin($email, $password): bool
    {
        $userDAO = new UserDAO;
        $user = $userDAO->getUserByEmail($email);

        if ($user instanceof User) return $user && $user->getPassword() === $password;

        return false;
    }

    public function findUserbyEmail($email)
    {
        $userDAO = new UserDAO();
        $user = $userDAO->getUserByEmail($email);

        return $user;
    }
}
