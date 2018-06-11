<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 11/06/18
 * Time: 15:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Agent;
use AppBundle\Entity\EspacePersonnalise;
use AppBundle\Form\EspacePersonnaliseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspacePersonnaliseController extends Controller
{
    /**
     * @Route("/espacePersonnalise/{id}", name="espace_personnalise")
     * @param Request $request
     * @param EspacePersonnalise $espacePersonnalise
     * @return Response
     */
    public function defaultAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $agent = $em->getRepository(Agent::class)->find($id);
        $espacePersonnalise = $em->getRepository(EspacePersonnalise::class)->findOneBy(['agentid'=>$agent]);
        $form = $this->createForm(EspacePersonnaliseType::class, $espacePersonnalise, ['action'=>$this->generateUrl("espace_personnalise", ['id'=>$id])]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $espacePersonnalise->setAgentid($agent);
            $em->flush();

            return $this->redirectToRoute("agent_index");
        }

        return $this->render("espace/index.html.twig", [
            'form'=>$form->createView(),
            'espace'=>$espacePersonnalise
        ]);
    }
}