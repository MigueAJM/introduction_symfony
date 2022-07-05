<?php

namespace TestBundle\Controller;

use Utilerias\SQLBundle\Model\SQLModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    protected $model, $defaultModel;
    public function __construct()
    {
        $this->model = new SQLModel();
        $this->defaultModel = new DefaultModel();
    }

    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }


    public function getProductsAction(Request $request, Int $id = 0)
    {
        $columns = ['id_product', 'name'];
        $condition = ['active' => 'true'];
        if ($id) $condition['id_product'] = $id;
        $response = $this->defaultModel->getProductsOrProduct('public', $columns, $condition);
        return new JsonResponse($response);
    }

    /*     public function selectAction()
    {
        $query = 'SELECT id_product, name FROM products WHERE active=true';
        print_r($this->model->executeQuery($query));
        return new Response('ok');
    } */
}
