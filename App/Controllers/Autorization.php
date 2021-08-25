<?php

namespace App\Controllers;

use \Core\View;

class Autorization extends \Core\Controller
{
    public function enterAction()
    {
        if (isset($_POST['username']) && isset($_POST['psw']))
        {
            $username = $_POST['username'];
            $psw = $_POST['psw'];

            View::renderTemplate('Home/enter.html', [ "username" => $username, "psw" => $psw ]);
        }
        else
        {
            View::renderTemplate('Home/index.html');
        }
    }
}
