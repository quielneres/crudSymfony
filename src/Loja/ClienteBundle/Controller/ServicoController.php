<?php

namespace Loja\ClienteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Loja\ClienteBundle\Entity\Servico;
use Loja\ClienteBundle\Form\ServicoType;

/**
 * Servico controller
 *
 * @Route("/servico")
 */
class ServicoController extends Controller
{

    /**
     * Lists all Servico entities.
     *
     * @Route("/", name="servico")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LojaClienteBundle:Servico')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Servico entity.
     *
     * @Route("/", name="servico_create")
     * @Method("POST")
     * @Template("LojaClienteBundle:Servico:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Servico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('servico_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Servico entity.
     *
     * @param Servico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Servico $entity)
    {
        $form = $this->createForm(new ServicoType(), $entity, array(
            'action' => $this->generateUrl('servico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Servico entity.
     *
     * @Route("/new", name="servico_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Servico();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Servico entity.
     *
     * @Route("/{id}", name="servico_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LojaClienteBundle:Servico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Servico entity.
     *
     * @Route("/{id}/edit", name="servico_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LojaClienteBundle:Servico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Servico entity.
    *
    * @param Servico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Servico $entity)
    {
        $form = $this->createForm(new ServicoType(), $entity, array(
            'action' => $this->generateUrl('servico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Servico entity.
     *
     * @Route("/{id}", name="servico_update")
     * @Method("PUT")
     * @Template("LojaClienteBundle:Servico:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LojaClienteBundle:Servico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Servico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('servico_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Servico entity.
     *
     * @Route("/{id}", name="servico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LojaClienteBundle:Servico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Servico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('servico'));
    }

    /**
     * Creates a form to delete a Servico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
