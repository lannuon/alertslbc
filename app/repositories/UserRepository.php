<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 17:19
 */

namespace repositories;

use app\entities\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\Util\StringUtils;

/**
 * Class UserRepository
 *
 * Is a service object used to manipulate the User object
 * in order to split data modelling and logical implementation
 *
 * @package app\repositories
 */
class UserRepository {

    public function isValidUser(User $user)
    {

    }

    public function checkCredential($email, $password)
    {
        $dbUser = $this->findUserByEmail($email);
        if ($dbUser != null)
        {
            var_dump($dbUser->getSalt());
            $hashPassword = $this->encodePassword($password, $dbUser->getSalt());
            if (StringUtils::equals($hashPassword, $dbUser->getPassword()))
            {
                return $dbUser;
            }
        }
        return null;

    }

    public function encodePassword($password, $salt)
    {
        $encoder =  new MessageDigestPasswordEncoder();
        return $encoder->encodePassword($password, $salt);
    }

    public function createUser(User $user)
    {
        //return $user. ...
    }

    /**
     * @param $email
     * @return User
     */
    public function findUserByEmail($email)
    {
        return new User($email);
    }


}
