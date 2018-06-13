<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Agent;
use AppBundle\Entity\AgentTranslation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Agent controller.
 *
 * @Route("agent")
 */
class AgentController extends Controller
{
    /**
     * Lists all agent entities.
     *
     * @Route("/{agence}", name="agent_index")
     * @Method("GET")
     */
    public function indexAction($agence = null)
    {
        $em = $this->getDoctrine()->getManager();
        if (null == $agence) {
            $agents = $em->getRepository(Agent::class)->findAll();
        } else {
            $agents = $em->getRepository(Agent::class)->findBy(['agenceid' => $agence]);
        }

        return $this->render('agent/index.html.twig', array(
            'agents' => $agents,
        ));
    }

    /**
     * Creates a new agent entity.
     *
     * @Route("/new", name="agent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agent = new Agent();
        $form = $this->createForm('AppBundle\Form\AgentType', $agent, ['action' => $this->generateUrl('agent_new')]);
        $form->add('Enregistrer', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $esp = new AgentTranslation();
            $esp->setAgentid($agent);
            $em->persist($esp);
            $em->persist($agent);
            $em->flush();

            return $this->redirectToRoute('agent_index');
        }

        return $this->render('agent/new.html.twig', array(
            'agent' => $agent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agent entity.
     *
     * @Route("/{id}", name="agent_show")
     * @Method("GET")
     */
    public function showAction(Agent $agent)
    {
        $deleteForm = $this->createDeleteForm($agent);

        return $this->render('agent/show.html.twig', array(
            'agent' => $agent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agent entity.
     *
     * @Route("/{id}/edit", name="agent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Agent $agent)
    {
        $deleteForm = $this->createDeleteForm($agent);
        $editForm = $this->createForm('AppBundle\Form\AgentType', $agent, ['action' => $this->generateUrl('agent_edit', ['id' => $agent->getId()])]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agent_index');
        }

        return $this->render('agent/edit.html.twig', array(
            'agent' => $agent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agent entity.
     *
     * @Route("/delete/{id}", name="agent_delete")
     */
    public function deleteAction(Request $request, Agent $agent)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agent);
            $em->flush();

            return $this->redirectToRoute('agent_index');
        } catch (\Exception $exception) {
            return new Response("Impossible de supprimer l'enregistrement : ".$exception->getMessage());
        }
    }

    /**
     * Creates a form to delete a agent entity.
     *
     * @param Agent $agent The agent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agent $agent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agent_delete', array('id' => $agent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
