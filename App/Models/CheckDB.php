<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class CheckDB extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, name FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function CheckUser($uname, $upsw)
    {
        $conn = static::getDB();

        $sqlMessage = "SELECT * FROM users WHERE user_name = '$uname' AND user_password = '$upsw'";

        if ($answer = $conn->query($sqlMessage))
        {
            while($result = $answer->fetch())
            {
                $name = $result['user_name'];
                $psw = $result['user_password'];
                if ($uname == $name && $upsw == $psw)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
    }
}
