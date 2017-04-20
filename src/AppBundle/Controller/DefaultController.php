<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * Template("AppBundle:Default:index2.html.twig")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        /*return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);*/
//       return $this->render('AppBundle:Default:index.html.twig');

        $a = 'Mr.Copying!';
        //dump($a);
        return [ 'name' => $a ];
    }

    /**
     * @Route("contact", name="contact-page")
     * @Template()
     * Method({"POST"}) // ограничить по методу вызов запроса
     * @param Request $request
     */
    public function contactAction(Request $request)
    {
        $b = $this->getParameter('my_param');
        dump($b);
        $name = $request->get('name');
        dump($name);

    }
}
