<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 22/03/19
 * Time: 13.40
 */

namespace App\Auth;

use App\Models\User;

class Auth
{
    public $user;

    public function id()
    {
        return $this->user->getKey();
    }

    /**
     * @return User
     */
    public function user() : User
    {
        return $this->user;
    }

    public function attempt(string $pernr, string $password) : bool
    {
        $user = User::find($pernr);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $this->user = $user;

            return true;
        }

        return false;
    }

    public function check() : bool
    {
        return isset($this->user) || isset($_SESSION['user']);
    }
}