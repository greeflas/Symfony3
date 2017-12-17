<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Rest API controller.
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ApiController
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
}
