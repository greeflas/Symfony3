<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Rest API controller.
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ApiController extends Controller
{
    /**
     * Returns "todo list".
     *
     * @return JsonResponse
     *
     * @Route("/api/todo-list")
     * @Method("GET")
     */
    public function getTodoListAction() : JsonResponse
    {
        $todoList = [
            '1. Learn Symfony 3',
            '2. Create some project on Symfony 3',
            '3. Create some extension for Symfony 3'
        ];

        return new JsonResponse($todoList);
    }

    /**
     * Returns "done list".
     *
     * @return JsonResponse
     *
     * @Route("/api/done-list")
     * @Method("GET")
     */
    public function getDoneList() : JsonResponse
    {
        return $this->json([
            '1. Learn Routing',
            '2. Learn Controllers',
        ]);
    }
}
