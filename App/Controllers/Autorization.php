<?php

namespace App\Controllers;

use App\Models\CheckDB;
use \Core\View;

class Autorization extends \Core\Controller
{
    public function enterAction()
    {
        if (isset($_POST['username']) && isset($_POST['psw']))
        {
            $DBcheck = new CheckDB();
            $username = $_POST['username'];
            $psw = $_POST['psw'];

            $checker = $DBcheck->CheckUser($username,$psw);

            if ($checker == true)
            {
                View::renderTemplate('Home/enter.html', [ "username" => $username, "psw" => $psw ]);
            }
            else
            {
                View::renderTemplate('Home/error.html');
            }
        }
    }
}
