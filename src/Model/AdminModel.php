<?php

namespace App\Model;

class AdminModel
{
    /**
     * Check if user is admin to instantiate AdminController
     */
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            if ($user->getLogin() === 'admiN1337$') {
                return $this;
            }
        }
    }

    /**
     * Get all users from database
     *
     * @return false|array
     */
    public function getAllUsers(): false|array
    {
        $sqlQuery = ('SELECT * FROM user');
        $statement = DbConnection::getDb()->prepare($sqlQuery);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }

    /**
     * Delete user from database
     *
     * @param integer $id
     * @return void
     */
    public function deleteUser(int $id): void
    {
        $sqlQuery = ('DELETE FROM user 
            WHERE id = :id
        ');
        $statement = DbConnection::getDb()->prepare($sqlQuery);
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            // header("HTTP/1.1 200 OK");
            echo "OK";
        } else {
            // header("HTTP/1.1 500 Internal Server Error");
            echo "Error";
        }
    }
}
