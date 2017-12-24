<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Task controller.
 * @see https://symfony.com/doc/3.4/forms.html
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class TaskController extends Controller
{
    /**
     * Action for creating of new task.
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/task/new")
     */
    public function newAction(Request $request) : Response
    {
        $task = new Task();
        $task->setTask('Learn forms in Symfony 3');
        $task->setDueDate(new \DateTime());

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            die(var_dump($task));
        }

        return $this->render('task/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
