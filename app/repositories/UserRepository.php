<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 17:19
 */
namespace app\services;



use app\entities\User;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

/**
 * Class UserService
 *
 * Is a service object used to manipulate the User object
 * in order to split data modelling and logical implementation
 *
 * @package app\repositories
 */
class UserService {


    public function isValidUser(User $user)
    {

    }

    public function checkCredential(string $email, string $password)
    {
        $dbUser = $this->findUserByEmail($email);
        if ($dbUser != null)
        {
            $hashPassword = $this->encodePassword($password, $dbUser->getSalt());
            if (StringUtils::equals($hashPassword, $dbUser->getPassword()))
            {
                return $dbUser;
            }
        }
        return null;

    }

    public function encodePassword(string $password, string $salt)
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
        return new User();
    }


} 