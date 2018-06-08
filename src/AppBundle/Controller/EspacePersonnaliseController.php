<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EspacePersonnalise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Espacepersonnalise controller.
 *
 * @Route("espacepersonnalise")
 */
class EspacePersonnaliseController extends Controller
{
    /**
     * Lists all espacePersonnalise entities.
     *
     * @Route("/", name="espacepersonnalise_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $espacePersonnalises = $em->getRepository('AppBundle:EspacePersonnalise')->findAll();

        return $this->render('espacepersonnalise/index.html.twig', array(
            'espacePersonnalises' => $espacePersonnalises,
        ));
    }

    /**
     * Creates a new espacePersonnalise entity.
     *
     * @Route("/new", name="espacepersonnalise_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $espacePersonnalise = new Espacepersonnalise();
        $form = $this->createForm('AppBundle\Form\EspacePersonnaliseType', $espacePersonnalise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($espacePersonnalise);
            $em->flush();

            return $this->redirectToRoute('espacepersonnalise_show', array('id' => $espacePersonnalise->getId()));
        }

        return $this->render('espacepersonnalise/new.html.twig', array(
            'espacePersonnalise' => $espacePersonnalise,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a espacePersonnalise entity.
     *
     * @Route("/{id}", name="espacepersonnalise_show")
     * @Method("GET")
     */
    public function showAction(EspacePersonnalise $espacePersonnalise)
    {
        $deleteForm = $this->createDeleteForm($espacePersonnalise);

        return $this->render('espacepersonnalise/show.html.twig', array(
            'espacePersonnalise' => $espacePersonnalise,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing espacePersonnalise entity.
     *
     * @Route("/{id}/edit", name="espacepersonnalise_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EspacePersonnalise $espacePersonnalise)
    {
        $deleteForm = $this->createDeleteForm($espacePersonnalise);
        $editForm = $this->createForm('AppBundle\Form\EspacePersonnaliseType', $espacePersonnalise);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espacepersonnalise_edit', array('id' => $espacePersonnalise->getId()));
        }

        return $this->render('espacepersonnalise/edit.html.twig', array(
            'espacePersonnalise' => $espacePersonnalise,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a espacePersonnalise entity.
     *
     * @Route("/{id}", name="espacepersonnalise_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EspacePersonnalise $espacePersonnalise)
    {
        $form = $this->createDeleteForm($espacePersonnalise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($espacePersonnalise);
            $em->flush();
        }

        return $this->redirectToRoute('espacepersonnalise_index');
    }

    /**
     * Creates a form to delete a espacePersonnalise entity.
     *
     * @param EspacePersonnalise $espacePersonnalise The espacePersonnalise entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EspacePersonnalise $espacePersonnalise)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espacepersonnalise_delete', array('id' => $espacePersonnalise->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
