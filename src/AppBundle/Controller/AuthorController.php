<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\FeedBack;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends Controller
{
    /**
     * @Route("/authors", name="Author_index")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        //$authors = $this->get('doctrine')->getRepository('AppBundle:Author')->findAll();
        $authors = $this->get('doctrine')->getRepository('AppBundle:Author')->findBy([],['lastName' => 'DESC'],15,5);
        return ['authors'=>$authors];
    }
}