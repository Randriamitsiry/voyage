<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 11/06/18
 * Time: 15:47.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Agent;
use AppBundle\Entity\AgentTranslation;
use AppBundle\Form\AgentTranslationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgentTranslationController extends Controller
{
    private static $idAgent;
    /**
     * @Route("/espace-personnalise/agent-{id}", name="espace_personnalise")
     *
     * @param Request            $request
     * @param AgentTranslation $espacePersonnalise
     *
     * @return Response
     */
    public function indexAction(Request $request, $id)
    {
        $this::$idAgent = $id;
        $em = $this->getDoctrine()->getManager();
        $agent = $em->getRepository(Agent::class)->find($id);
        $espacePersonnalise = $em->getRepository(AgentTranslation::class)->findBy(['agentid' => $agent]);

        return $this->render('espace/index.html.twig', [
            'espaces' => $espacePersonnalise,
            'agent'=>$agent
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/translation/add-{id}", name = "translation_add")
     */
    public function newAction(Request $request, $id)
    {
        $translation = new AgentTranslation();
        $form = $this->createForm(AgentTranslationType::class, $translation, ['action'=>$this->generateUrl("translation_add", ['id'=>$id])]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $agent = $em->getRepository(Agent::class)->find($id);
            $translation->setAgentid($agent);
            $em->persist($translation);
            $em->flush();

            return $this->redirectToRoute("espace_personnalise", ['id'=>$id]);
        }

        return $this->render("espace/new.html.twig", [
            'form'=>$form->createView(),
            'espace'=>$translation
        ]);
    }

    /**
     * @param  AgentTranslation $agentTranslation
     * @return Response
     * @Route("/delete/{id}", name="espace_delete")
     */
    public function deleteAction(AgentTranslation $agentTranslation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($agentTranslation);
        $em->flush();

        return $this->redirectToRoute('espace_personnalise', ['id'=>$this::$idAgent]);
    }
}
