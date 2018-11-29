<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Usuario;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $usuario = new Usuario();
        $usuario->setNombre("Juan");
        $usuario->setApellido("De Los Palotes");
        $usuario->setEmail("juanp@gmail.com");
        $usuario->setPassword("1234");
        @$usuario->setHabilitado(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);//para crear el usuario
        $em->flush();//comiit

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/{id}", name="homepage2")
     */
    public function index2Action(Request $request,Usuario $usuario){


        // replace this example code with whatever you need
        return $this->render('default/proyecto.html.twig',
            [

                "usuario" => $usuario

            ]);
    }
}
