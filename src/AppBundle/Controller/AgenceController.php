<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Agence;
use AppBundle\Entity\Locale;
use AppBundle\Entity\Translation\AgenceTranslation;
use AppBundle\Form\AgenceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Agence controller.
 *
 * @Route("agence")
 */
class AgenceController extends Controller
{
    /**
     * Lists all agence entities.
     *
     * @Route("/", name="agence_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agences = $em->getRepository(Agence::class)->findAll();
        $agence = new Agence();
        $form = $this->createForm(AgenceType::class, $agence, ['action' => $this->generateUrl('agence_new')]);

        return $this->render('agence/index.html.twig', array(
            'agences' => $agences,
            'form_new' => $form->createView(),
        ));
    }

    /**
     * Creates a new agence entity.
     *
     * @Route("/new", name="agence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = new Agence();
        $form = $this->createForm(AgenceType::class, $agence, ['action' => $this->generateUrl('agence_new')]);
        $form->add('Enregistrer', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->flush();

            return $this->redirectToRoute('agence_index');
        }

        return $this->render('agence/new.html.twig', ['form' => $form->createView()]);
    }

    /**
     * Finds and displays a agence entity.
     *
     * @Route("/{id}", name="agence_show")
     * @Method("GET")
     */
    public function showAction(Agence $agence)
    {
        $deleteForm = $this->createDeleteForm($agence);

        return $this->render('agence/show.html.twig', array(
            'agence' => $agence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agence entity.
     *
     * @Route("/{id}/edit", name="agence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = $em->getRepository(Agence::class)->find($id);
        $deleteForm = $this->createDeleteForm($agence);
        $editForm = $this->createForm(AgenceType::class, $agence, ['action' => $this->generateUrl('agence_edit', ['id' => $agence->getId()])]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->flush();

            return $this->redirectToRoute('agence_index');
        }

        return $this->render('agence/edit.html.twig', array(
            'agence' => $agence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agence entity.
     *
     * @Route("/delete/{id}", name="agence_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $agence = $em->getRepository(Agence::class)->find($id);
        $em->remove($agence);
        $em->flush();

        return $this->redirectToRoute('agence_index');
    }

    /**
     * Creates a form to delete a agence entity.
     *
     * @param Agence $agence The agence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Agence $agence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agence_delete', array('id' => $agence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
