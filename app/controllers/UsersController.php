<?php
/**
 * Created by PhpStorm.
 * User: Tibox
 * Date: 22/11/2014
 * Time: 16:34
 */

namespace app\controllers;

use app\entities\User;
use app\repositories\UserRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UsersController
{
    /**
     * @param Request     $request
     * @param Application $application
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function login(Request $request, Application $application)
    {
        $userRepository = new UserRepository();

        $email = $request->get('email');
        $password = $request->get('password');

        $dbUser = $userRepository->checkCredential($email, $password);

        return $application->json($dbUser, $dbUser != null ? 200 : 404);
    }

    /**
     * @param Request     $request
     * @param Application $application
     */
    public function create(Request $request, Application $application)
    {
        $userRepository = new UserRepository();

        $email = $request->get('email');
        $passwordOrigin = $request->get('password_origin');
        $passwordConfirm = $request->get('password_confirm');

        // TODO check passwordOrigin and passwordConfirm
        // TODO check email

        $user = new User($email);
        $passwordCrypt = $userRepository->encodePassword($passwordOrigin, $user->getSalt());
        $user->setPassword($passwordCrypt);

        $userRepository->createUser($user);

    }
//    create
//    delete


}