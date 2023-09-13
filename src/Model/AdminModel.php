<?php

namespace App\Model;

class AdminModel
{

    public function getAllUsers(): false|array
    {
        $sqlQuery = ('SELECT * FROM user');
        $statement = DbConnection::getDb()->prepare($sqlQuery);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }
}
