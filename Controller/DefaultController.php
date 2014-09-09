<?php

namespace BiberLtd\Bundle\PollManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BiberLtdPollManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
