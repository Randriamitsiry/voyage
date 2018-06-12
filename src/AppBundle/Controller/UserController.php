<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 12/06/18
 * Time: 11:05
 */

namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserController
 * @package AppBundle\Controller
 * @Route("/user")
 * Gestion des utilisateurs
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/create", name="user_create")
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setMotDePasse($password);
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new Response("User saved!");
        }

        return $this->render("user/register.html.twig", ['form'=>$form->createView()]);
    }

    public function loginAction() {

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render("security/login.html.twig", array(
            'last_username' => $lastUsername,
            'error'         => $error
            )
        );
    }

    public function loginCheckAction()
    {

    }

    public function logoutAction()
    {
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        return $this->redirect("/");
    }
}