<?php

namespace App\Models;

class CheckDB extends \Core\Model
{

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
