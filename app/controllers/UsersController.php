<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 16:34
 */

namespace app\controllers;

use app\repositories\UserRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UsersController
{
    public function login(Request $request, Application $application)
    {
        $userRepository = new UserRepository();

        $email = $request->get('email');
        $password = $request->get('password');

        $dbUser = $userRepository->checkCredential($email, $password);

        return $application->json($dbUser, $dbUser != null ? 200 : 404);
    }
//    create
//    delete


}