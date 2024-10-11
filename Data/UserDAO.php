<?php

//Data/UserDAO.php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\User;

class UserDAO
{
    public function getUserByEmail(string $email): ?User
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $sql = "SELECT id, email, password FROM users WHERE email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':email' => $email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;

        if ($result) {
            return new User((int) $result['id'], $result['email'], $result['password']);
        } else {
            return null;
        }
    }
}
