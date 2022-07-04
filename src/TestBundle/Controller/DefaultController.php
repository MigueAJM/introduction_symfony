<?php

namespace TestBundle\Controller;

use Utilerias\SQLBundle\Model\SQLModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new SQLModel();
    }

    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }

    public function selectAction()
    {
        $query = 'SELECT * FROM "AE"."Visitante" LIMIT 1';
        print_r($this->model->executeQuery($query));
        return new Response('ok');
    }
}
