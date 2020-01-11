<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
/**
 * @Route("/api/users/")
 */
class AjoutuserController extends AbstractController
{
    /**
     * @Route("/ajoutuser", name="ajoutuser")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();

        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $nomcomplet = $request->request->get('nomcomplet');
        $roles = $request->request->get('roles');
        $isactif = $request->request->get('isactif');
        $role = $request->request->get('role');

        if (!$roles) {
            $roles = json_encode([]);
        }

        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setNomcomplet(($nomcomplet));
        $user->setRoles(($roles));
        $user->setIsactif(($isactif));
        $user->setRole(($role));
        $em->persist($user);
        $em->flush();

        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }
}
