<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Site controller.
 *
 * @see https://symfony.com/doc/3.4/routing.html
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class HelloController
{
    /**
     * Say's hello to anyone.
     *
     * @return Response
     *
     * @Route("/hello")
     */
    public function helloAction() : Response
    {
        return new Response('Hello, World!');
    }

    /**
     * Say's hello to the concrete user.
     *
     * @param string $username
     * @return Response
     *
     * @Route("/hello/{username}")
     */
    public function helloUserAction(string $username = 'Guest') : Response
    {
        return new Response('Hello, ' . $username . '!');
    }
}
