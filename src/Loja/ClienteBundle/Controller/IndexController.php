<?php

namespace Loja\ClienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicos = $em->getRepository('LojaClienteBundle:Servico')->findAllInOrder();

        return [
            'servicos' => $servicos,
        ];

    }

    /**
     * @Route("/show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('LojaClienteBundle:Servico')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('O post não existe! Volte para home!');
        }

        return [
            'post' => $post,
        ];
    }

}
