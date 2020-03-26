<?php

namespace App\Controller;


use App\Entity\Homework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Form;
    /**
     * Creates an Blog resource
     * @Route("/api", name="api")
     * @param Request $request
     * @return View
     */
class ApiController extends FOSRestController
{
     /**
      * @Rest\Get("/getPage/{page}")
      *
      */
    public function getPage(int $page)
    {
      $data = $this->getDoctrine()->getRepository('App:Homework')->getData($page);
      return $data;
    }
}
